<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function SignUp(Request $request)
    {

        $user_email = $request->email;

        // SEARCH FOR THE EMAIL ENTERED IN TABLE USER
        $user = User::where([
            'email' => $user_email
        ])->get();

        // IF THE USER DOES NOT EXIST
        if ($user->isEmpty()) {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required'
            ]);
            User::create($validatedData);
        } else {
            // USER ALREADY EXISTS
        }

    }

    public function SignIn(Request $request)
    {
        $this->validate($request, array([
            'email' => 'required|email',
            'password' => 'required'
        ]));

        $user = User::where([
            'email' => $request->email
        ])->first();

        if (!$user->isEmpty()) {
            if ($user->password == $request->password) {
                //SUCESSFUL PASSWORD AND EMAIL
                //  REDIRECT THE USER TO HOME PAGE
            } else {
                // FAILED PASSWORD , SHOW ERROR MESSEGE
            }
        }else{
            // USER DOES NOT EXIST MESSEGE
        }
    }
}

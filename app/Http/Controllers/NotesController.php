<?php

namespace App\Http\Controllers;

use App\Category;
use App\note;
use http\Client\Curl\User;
use http\Env\Response;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use function Sodium\add;

class NotesController extends Controller
{

    public function newNote(Request $request)
    {
        $id = $request->id;
        $categories = Category::all();
        return view('pages.newNote', compact('id','categories'));
    }

    public function createANote(Request $request)
    {
        // A USER CREATES A NOTE : USER ID , NOTE TITLE ,Category id's, NOTE DESCRIPTION
        $user_id = $this->fetchAuthUserId();
        if (!empty($user_id)) {

            $NoteData = $this->validate($request, [
                'title' => 'required|unique:notes,title',
                'description' => 'required',
                'categories' => ''
            ]);

            // CREATE A NOTE
            $newNote = new Note();
            $newNote->title = $request->title;
            $newNote->description = $request->description;
            $newNote->user_id = $user_id;
            $newNote->save();

            $categoryIds = $request->categories;
            $categories = Category::find($categoryIds);

            $newNote->categories()->attach($categoryIds);

            return redirect()->route('Home');
        }
    }

    public function updateNote(Request $request)
    {
        // A USER CREATES A NOTE : USER ID , NOTE TITLE , NOTE DESCRIPTION

        $user_id = $this->fetchAuthUserId();
        $note_id = $request->note_id;

        $note = Note::find($note_id);

        if (!empty($note)) {
            // ******* MAKE SURE THE UPDATE DOES NOT CHANGE THE OLD NOTE IF NOT EDITED ***
            $updatedNote = $this->validate($request, [
                'title' => "required|unique:notes,title,$note_id",
                'description' => 'required',
                'categories' => ''
            ]);
            $updatedNote = Arr::except($updatedNote,'categories');
            $note->update($updatedNote);

            $categoryIds = $request->categories;
            $categories = Category::find($categoryIds);
            $note->categories()->detach();
            $note->categories()->attach($categoryIds);

            return redirect()->back()->withSuccess('Updated Successfully');
        }
    }

    public function openNote($id)
    {
        // USER CLICKS ON A NOTE WHICH WILL OPEN

        $note = Note::find($id);
        $checkedCategories = Note::find($id)->categories()->get();
        $categories = Category::all();

        return view('pages.openNote', compact('note','checkedCategories','categories'));
    }

    public function deleteNote($id)
    {
//         A USER DELETES A NOTE Needs NOTE ID

        $note = Note::find($id);
        if (Auth::user()->id == $note->user_id) {
            if (!empty($note)) {
                $note->delete();
                return redirect()->route('Home');
            } else {
                return 'Note was not found';
            }
        }
    }

    private function fetchNotes()
    {
        $user_id = $this->fetchAuthUserId();
        $notes = Note::where([
            'user_id' => $user_id
        ])->orderBy('updated_at', 'desc')->paginate(3);

        return $notes;
    }

    private function fetchAuthUserId()
    {
        if (Auth::check()) {
            return Auth::user()->id;
        } else {
            return 2;
        }

    }

    public function allNotes()
    {
        $user_id = $this->fetchAuthUserId();
        $notes = $this->fetchNotes();

        return view('pages.home', compact('notes', 'user_id'));
    }

    public function searchNote(Request $request)
    {


        if (Auth::check()) {
            $user_id = $this->fetchAuthUserId();

            // VALIDATE THAT THERE IS SOMETHING TO SEARCH FOR

            $this->validate($request, [
                'search' => 'required'
            ]);

            // SEARCH ALL THE NOTES OF THE USER WITH THE SEARCHED TITLE
            $search = $request->search;

            $notes = Note::where('user_id',$user_id)
                ->where('title','LIKE','%'.$search.'%')
                ->orderBy('updated_at', 'desc')->paginate(3);

            // IF USER HAS NOTES WITH THAT TITLE
            if (!empty($notes)) {

                return view('pages.home', compact('notes', 'user_id'));

            }

        }
    }
}

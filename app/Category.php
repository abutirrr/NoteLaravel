<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [

    ];

    public function notes()
    {
        return $this->belongsToMany(Note::class,'Note_Category');
    }
}

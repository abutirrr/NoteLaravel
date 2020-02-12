<?php

use App\Category;
use Illuminate\Database\Seeder;

class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $numberOfCategories = sizeof(Category::all());

        for ($i = 0 ; $i<10 ; $i++){
            $note = factory(\App\Note::class)->create();
            $randomIds = null;
            for($j = 0 ; $j<=3 ; $j++){
                $randomIds[] =rand(1,$numberOfCategories);
            }
            $randomIds = array_unique($randomIds);
            $note->categories()->attach($randomIds);
        }


    }
}

<?php

use Illuminate\Database\Seeder;

class NoteCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            factory(\App\NoteCategory::class, 20)->create();
    }
}

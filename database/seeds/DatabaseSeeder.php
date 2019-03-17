<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create the user seed data first
        factory(App\User::class, 3)->create();

        // For each row in user table, seed the question table using the user id
        App\User::all()->each(function ($user) {
            $user->questions()->saveMany(
                 factory(App\Question::class, rand(1, 5))->make()
             );
        });

        // For each row in question table, seed the answer table using the question id
        App\Question::all()->each(function($question) {
            $question->answers()->saveMany(
                factory(App\Answer::class, rand(1, 5))->make()
            );
        });

        // For each row in question table, choose
        App\Question::all()->each(function($question) {
            $answers = $question->answers->all();
            $random_index = rand(0, count($answers) - 1);
            $question->best_answer_id = $answers[$random_index]->id;
            $question->save();
        });
    }
}

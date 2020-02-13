<?php

use App\User;
use App\Answer;
use App\Question;
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
        factory(User::class, 5)->create()->each(function($user) {
			// questions é o nome do relacionamento configurado
            $user->questions()->saveMany(
                factory(Question::class, rand(1, 5))->make()
            )->each(function($question) {
                $question->answers()->saveMany(factory(Answer::class, rand(1, 5))->make());
            });
        });
    }
}

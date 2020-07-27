<?php

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;
use Faker\Generator as Faker;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        factory(Question::class, 10)->create()->each(function ($question) use ($faker){

            $answers = [];
            $corrects = [1,2,3,4];
            for($i=1; $i<=4; $i++){
                $answers[] = [
                    'question_id'=> $question->id,
                    'content' => $faker->text(250),
                    'correct'=> $i=== array_rand($corrects),
                    'created_at' => now(),
                    'updated_at'=> now()
                ];
            }
            $question->answers()->insert($answers);
        });
    }
}

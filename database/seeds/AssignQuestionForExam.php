<?php

use Illuminate\Database\Seeder;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class AssignQuestionForExam extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        $questionMaxId = 0;
        Exam::chunk(10, function ($exams) use (&$questionMaxId){

           foreach ($exams as $exam){
               $questions = Question::where('id', '>', $questionMaxId)->take(25)->get();
               $examQuestion = [];

               if($questions->count() > 0){
                   $questionMaxId = $questions->last()->id;
                   foreach ($questions as $question){
                       $examQuestion[] = [
                           'exam_id'=>$exam->id,
                           'question_id'=> $question->id,
                           'created_at' => now(),
                           'updated_at'=> now()
                       ];
                   }
                   DB::table('exam_question')->insert($examQuestion);
               }
           }
        });
    }
}

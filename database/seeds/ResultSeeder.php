<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\Result;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // lay 50 user
        $users = User::take(10)->get();
        foreach ($users as $user){
            // lay 1 de thi ngau nhien
            //$exam =Exam::inRandomOrder()->first();
            $exam = Exam::find(1)->first();
            //dd($exam->questions->count());

            // check trong de co cau hoi
            if($exam->questions->count() > 0){
                foreach ($exam->questions as $question){

//                    dd($question->answers);
                    if($question->answers->count() >0){
                        $answer = $question->answers()->inRandomOrder()->first();
                        $result[] = [
                            'exam_id'=> $exam->id,
                            'question_id'=> $question->id,
                            'answer_id'=>$answer->id,
                            'user_id' => $user->id,
                            'created_at' => now(),
                            'updated_at'=> now()
                        ];
                        Result::insert($result);
                    }
                }
            }
        }

    }
}

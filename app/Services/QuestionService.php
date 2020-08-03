<?php
namespace App\Services;

use App\Models\Exam;
use App\Models\Question;

class QuestionService
{
    public function getAll($orderBys = [], $limit = 10){
        $query = Question::query();
        //dd($query);
        if(!empty($orderBys) && $orderBys['column'] != null && $orderBys['sort'] != null){
            $query->orderby($orderBys['column'], $orderBys['sort']);
        }
        $question = $query->paginate($limit);
        return $question;
    }

    // Register and update data
    public function save($data, $id = 0){
        //dd($data);
        if($id == 0){
            $exam = new Exam();
        }else{
            $exam = Exam::query()->findOrFail($id);
        }

        $exam['name'] = $data['name'];
        $exam->save();

        return $exam;
    }

    public function findById($id){
        // c1:
        // $exam = Exam::query()->where('id', '=', $id)->get();

        // c2:
        $exam = Exam::find($id);
        return $exam;
    }

    public function deleteExam($id){
        // c1:
        // $exam = Exam::query()->where('id', '=', $id)->get();

        // c2:
        $exam = Exam::destroy($id);
        return $exam;
    }


}

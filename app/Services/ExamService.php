<?php
namespace App\Services;

use App\Models\Exam;

class ExamService
{
    public function getAll($orderBys = [], $limit = 10){
        $query = Exam::query();
        //dd($query);
        if($orderBys){
            $query->orderby($orderBys['column'], $orderBys['sort']);
        }
        $exams = $query->paginate($limit);
        return $exams;
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

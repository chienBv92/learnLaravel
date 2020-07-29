<?php
namespace App\Services;

use App\Models\Exam;

class ExamService
{
    public function getAll($limit){
        $exams = Exam::paginate($limit);
        return $exams;
    }

}

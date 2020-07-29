<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ExamService;

class ExamController extends Controller
{
    //
    private $examService;

    private function __construct(ExamService $examService)
    {
        $this->examService = $examService;
    }

    public function index(){
        try{
            $exams = $this->examService->getAll(10);

            return response()->json([
               'status' => true,
               'exams' => $exams
            ]);

        }catch (\Exception $ex){
            return response()->json([
                'status' => true,
                'exams' => $exams
            ]);

        }
    }


}

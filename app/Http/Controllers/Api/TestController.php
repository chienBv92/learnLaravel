<?php

namespace App\Http\Controllers\Api;

use App\Services\ExamService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //
    private $examService;

//    private function __construct(ExamService $examService)
//    {
//        $this->examService = $examService;
//    }

    public function index(){
        try{
            //$exams = $this->examService->getAll(10);

            return response()->json([
                'status' => true,
                'exams' => 'hi'
            ]);

        }catch (\Exception $ex){
            return response()->json([
                'status' => true,
                'exams' => 'hi'
            ]);

        }
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ExamService;
use Symfony\Component\HttpFoundation\Response;

class ExamController extends Controller
{
    //
    private $examService;

    public function __construct(ExamService $examService)
    {
        $this->examService = $examService;
    }

    // list exam with paginate
    public function index(Request $request){
        try{
            $limit = $request->get('limit') ? $request->get('limit') : 10;
            $orderBys = [];
            if($request->get('column') && $request->get('sort'));
            {
                $orderBys['column'] = $request->get('column');
                $orderBys['sort'] = $request->get('sort');
            }
            //dd($orderBys);
            $examsList = $this->examService->getAll($orderBys, $limit);

            return response()->json([
               'status' => true,
               'code' => Response::HTTP_OK,
               'meta' => [
                   'total' => $examsList->total(),
                   'perPage' => $examsList->perPage(),
                   'currentPage' => $examsList->currentPage(),
               ],
               'exams' => $examsList
            ]);

        }catch (\Exception $ex){
            return response()->json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'exams' => $examsList,
                'message'=> $ex->getMessage()
            ]);

        }
    }

    // register data
    public function store(Request $request, $id = 0){
        try{
            $data = [];
            $data['name'] = $request->get('name');
            $exam = $this->examService->save($data, $id);

            return response()->json([
                'status' => true,
                'code' => Response::HTTP_OK,
                'exam' => $exam
            ]);
        }catch (\Exception $ex){
            return response()->json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message'=> $ex->getMessage()
            ]);
        }
    }

    // update
    public function update(Request $request, $id = 0){
        try{
            //dd($id);
            $data = [];
            $data['name'] = $request->get('name');
            $exam = $this->examService->save($data, $id);

            return response()->json([
                'status' => true,
                'code' => Response::HTTP_OK,
                'exam' => $exam
            ]);
        }catch (\Exception $ex){
            return response()->json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message'=> $ex->getMessage()
            ]);
        }
    }

    // show exam detail
    public function show($id = 0){
        try{
            //dd($id);
            $exam = $this->examService->findById($id);

            return response()->json([
                'status' => true,
                'code' => Response::HTTP_OK,
                'exam' => $exam
            ]);
        }catch (\Exception $ex){
            return response()->json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message'=> $ex->getMessage()
            ]);
        }
    }

    // delete exam
    public function destroy($id = 0){
        try{
            //dd($id);
            $exam = $this->examService->deleteExam($id);

            return response()->json([
                'status' => true,
                'code' => Response::HTTP_OK,
                'exam' => $exam
            ]);
        }catch (\Exception $ex){
            return response()->json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message'=> $ex->getMessage()
            ]);
        }
    }
}

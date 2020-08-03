<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\QuestionService;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    //
    private $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    // list exam with paginate
    public function index(Request $request){
        try{
            $limit = $request->get('limit') ? $request->get('limit') : 10;
            $orderBys = [];
            if($request->get('column') != null && $request->get('sort') != null);
            {
                $orderBys['column'] = $request->get('column');
                $orderBys['sort'] = $request->get('sort');
            }
            //dd($orderBys);
            $questionList = $this->questionService->getAll($orderBys, $limit);

            return response()->json([
                'status' => true,
                'code' => Response::HTTP_OK,
                'meta' => [
                    'total' => $questionList->total(),
                    'perPage' => $questionList->perPage(),
                    'currentPage' => $questionList->currentPage(),
                ],
                'questionList' => $questionList
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

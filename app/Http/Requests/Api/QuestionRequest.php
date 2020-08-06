<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class QuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'content' => 'required|min:10',
            'cauhoi' => 'required'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => [
                'status' => false,
                'code' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY
        ]));
    }

    public function messages()
    {
        return [
            'content.required' => 'Nội dung không được để trống!',
            'content.min' => 'Nội dung tối thiểu dài 10 kí tự!',
            'cauhoi.required' => 'cau hoi ko duoc qua dai'
        ];
    }
}

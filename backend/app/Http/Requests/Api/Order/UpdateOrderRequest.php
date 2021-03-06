<?php

namespace App\Http\Requests\Api\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class UpdateOrderRequest extends FormRequest
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
            //'user_id' => 'required|exists:users,id',
            'total_price' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [//'user_id.exists' => 'Not an existing ID',
            'total_price.required' => 'Este valor es requerido',
            'total_price.numeric' => 'Ha de ser un número',
            'total_price.min' => 'Debe ser mayor o igual a 1',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json(['errors' => $errors, 'status'=>422], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }

}
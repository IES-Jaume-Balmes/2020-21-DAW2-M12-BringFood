<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use App\Enums\Via;

class UpdateAddressRequest extends FormRequest
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
            'via'=> 'required|enum_value:' . Via::class,
            'name' => 'required|min:1|max:40',
            'number' => 'digits_between:1,4',
            'floor' => 'digits_between:1,2',
            'door' => 'digits_between:1,2',
            //'stair' => 'required|min:3|max:3',
            'zip_code'=>'digits_between:5,5',
        ];
    }

    public function messages()
    {
        return ['via.required' => 'Este campo es obligatorio',
                'name.required' => 'Este campo es obligatorio',
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

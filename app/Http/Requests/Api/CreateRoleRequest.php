<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use App\Enums\RoleType;

class CreateRoleRequest extends FormRequest
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
            'type'=> 'required|enum_value:' . RoleType::class,
            //'type' => 'required|enum_key:' . RoleType::class,
            //'type' => 'required|enum:' . RoleType::class,
            'description'=>['required','max:400'],
        ];
    }

    public function messages()
    {
        return ['type.required' => 'Este campo es obligatorio',
                //'type.enum_value:' => 'Tipo de rol entre estas opciones: ',
                //'type.enum_key:' => 'Tipo de rol entre estas opciones: ',
                //'type.enum:' => 'Tipo de rol entre estas opciones: ',
                'description.required' => 'Este campo es obligatorio',
                'description.max' => 'La descripcion no puede superar los 400 caracteres'];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json(['errors' => $errors, 'status'=>422], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}

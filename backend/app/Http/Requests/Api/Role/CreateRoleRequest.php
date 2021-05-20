<?php

namespace App\Http\Requests\Api\Role;

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
        //return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        //name: admin, restaurant, client
        return [
            'type'=> 'required|enum_value:' . RoleType::class,
            //'type' => 'required|enum_key:' . RoleType::class,
            //s'type' => 'required|enum:' . RoleType::class,
            'description'=>['required','max:400'],
        ];
    }

    public function messages()
    {
        return [
                'description.required' => 'Este campo es obligatorio',
                'description.max' => 'La descripcion no puede superar los 400 caracteres'];
    }

}

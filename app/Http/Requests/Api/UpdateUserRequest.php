<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use App\Enums\DocumentType;
//use App\Models\Role;

class UpdateUserRequest extends FormRequest
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
        /*
        $roles=Role::all();
        $role_id_values='';
        foreach ($roles as $key => $value) {
            $role_id_values.=$value->id;
        }*/
        return [
            //'role_id' => 'required|regex:/['.$role_id_values.']/',
            //'id' => 'regex:/^('.$this->id.')/',
            'name' => 'required|max:50',
            'email' => 'required|unique:users,email,'.$this->id.'|email:rfc,dns',
            'type_document'=> 'required|enum_value:' . DocumentType::class,
            'document' => 'required_if:type_document,'.DocumentType::CIF,
            'prefix' => 'required|min:3|max:3',
            'mobile'=>['required','min:9','max:9','regex:/^(\d{9})/'],
            'phone'=> 'nullable|regex:/^(\d{9})?$/',
        ];
    }

    public function messages()
    {
        /*
        $roles=Role::all();
        $role_id_values='';
        foreach ($roles as $key => $value) {
            $role_id_values.=$value->id.', ';
        }*/
        return [//'id.regex' => 'El id no es el mismo que la url',
                'name.required' => 'Este campo es obligatorio',
                'name.max' => 'El nombre no debe pasar de 50 caracteres',
                'email.required' => 'Este campo es obligatorio',
                'document.required' => 'Este campo es obligatorio si el tipo de documento es CIF',
                'prefix.required' => 'Este campo es obligatorio',
                'prefix.min' => 'El prefijo son 3 caracteres',
                'prefix.max' => 'El prefijo son 3 caracteres',
                'mobile' => 'Este campo es obligatorio',
                'mobile.min' => 'El movil tiene 9 caracteres',
                'mobile.max' => 'El movil tiene 9 caracteres',
                'phone.min' => 'El movil tiene 9 caracteres',
                'phone.max' => 'El movil tiene 9 caracteres',
                //'role_id.regex' => 'Debe ser entre estas opciones: '.substr($role_id_values,0,-2),
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

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateUserRequest extends FormRequest
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
        $roles=Role::findAll();
        return [
            'name'=>['required','max:100'],
            'email'=>['required','unique','email'],
            'password'=>['required'],
            'role_id'=>['required'],
            'type_document'=>['required'],
            'mobile'=>['required','regex:\d{9}|^$'],
            'phone'=> 'nullable|regex:/^(\d{9})?$/',
        ];
    }

    public function validator(Factory $factory)
    {
        $validator = $factory->make($this->input(), $this->rules(), $this->messages(), $this->attributes());

        $validator->sometimes('document', 'required', function($input) {
            return $input->role_id === 1;//1 is vendedor
        });

        return $validator;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class RegisterUserRequest extends FormRequest
{

    public $validator = null;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->check()){
            return false;
        }
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
            'login' => 'required|string|unique:account|max:16',
            'password' => 'required|string|confirmed|max:16|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
            'email' => 'required|string|email|unique:account',
            'social_id' => 'required|string|max:7'
        ];
    }

    public function messages() {
        return [
            'password.regex' => 'The password must contains minimum eight characters, at least one uppercase letter, one lowercase letter and one number',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        foreach($validator->errors()->messages() as $message){
            toastr()->error($message[0]);
        }
        return redirect()->back();
    }
}

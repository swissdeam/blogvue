<?php

namespace App\Http\Requests\api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterReq extends FormRequest
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
     *
     *
     *
     *
     * @return array<string, mixed>
     *
     */


//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//        ]);
//    }


    public function rules()
    {


//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//        ]);

        return [
            'name'=>'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:6',
                'confirmed'
            ],
            'password_confirmation' => 'required_with:password|same:password',
            'is_admin'=>'required'
        ];
    }
}

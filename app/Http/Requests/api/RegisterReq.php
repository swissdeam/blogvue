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

    public function rules()
    {

        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:6',
                'confirmed'
            ],
            'password_confirmation' => 'required_with:password|same:password',
            'is_admin' => 'required'
        ];
    }
}

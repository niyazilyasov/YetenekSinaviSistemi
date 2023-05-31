<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->is_super_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ad' => 'required|min:2',
            'soyad' => 'required|min:2',
            'telefon' => ["required","digits:10","numeric",Rule::unique('users')],
            'email' => ["required","email",Rule::unique('users')],
            'name' => ["required","min:2",Rule::unique('users')],
            'password' => 'required',
            'is_super_admin' => 'required|boolean',
            'tc_numarasi' => ["required","numeric","digits:11",Rule::unique('users')],

            'file_name' => 'image|required|mimes:jpeg,png,jpg',
        ];
    }
}

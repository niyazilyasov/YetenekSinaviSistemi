<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserEditRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $user=User::find(Request()->input('id'));
        return [
            'ad' => 'required|min:2',
            'soyad' => 'required|min:2',
            'telefon' => ["required","digits:10","numeric",Rule::unique('users')->where(fn ($query) => $query->where('id','!=', $user->id))],
            'email' => ["required","email",Rule::unique('users')->where(fn ($query) => $query->where('id','!=', $user->id))],
            'name' => ["required","min:2",Rule::unique('users')->where(fn ($query) => $query->where('id','!=', $user->id))],
            'password' => 'sometimes',
            'is_super_admin' => 'required|boolean',
            'tc_numarasi' => ["required","numeric","digits:11",Rule::unique('users')->where(fn ($query) => $query->where('id','!=', $user->id))],

            'file_name' => 'image|nullable|mimes:jpeg,png,jpg',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserEditProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check()&&auth()->user()->id == Request()->input('id');
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
            'telefon' => ["required","digits:10","numeric",Rule::unique('users')->where(fn ($query) => $query->where('id','!=', $user->id))],
            'email' => ["required","email",Rule::unique('users')->where(fn ($query) => $query->where('id','!=', $user->id))],
            'password' => [
                'nullable',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
                'confirmed'
            ],
            'file_name' => 'image|nullable|mimes:jpeg,png,jpg',
        ];
    }
}

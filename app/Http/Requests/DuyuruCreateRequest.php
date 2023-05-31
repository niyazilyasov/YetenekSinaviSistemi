<?php

namespace App\Http\Requests;

use App\Models\Duyuru;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DuyuruCreateRequest extends FormRequest
{
    /**
     * Determine if the duyuru is authorized to make this request.
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
            'baslik' => 'required|min:2',
            'icerik' => 'required|min:2',
        ];
    }
}

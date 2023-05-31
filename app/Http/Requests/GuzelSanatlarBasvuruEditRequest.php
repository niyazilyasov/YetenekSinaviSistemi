<?php

namespace App\Http\Requests;

use App\Models\GuzelSanatlarBasvuru;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GuzelSanatlarBasvuruEditRequest extends FormRequest
{
    /**
     * Determine if the guzelSanatlarBasvuru is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'durum' => ['string','required','in:'.GuzelSanatlarBasvuru::ONAYLANDI.','.GuzelSanatlarBasvuru::REDDEDILDI],
            'durum_notu' => 'required|min:5',
        ];
    }
}

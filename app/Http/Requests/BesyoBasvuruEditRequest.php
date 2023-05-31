<?php

namespace App\Http\Requests;
use App\Models\BesyoBasvuru;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class BesyoBasvuruEditRequest extends FormRequest
{
    /**
     * Determine if the BesyoBasvuru is authorized to make this request.
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

            'durum' => ['string','required','in:'.BesyoBasvuru::ONAYLANDI.','.BesyoBasvuru::REDDEDILDI],
            'durum_notu' => 'required|min:5',
        ];
    }
}

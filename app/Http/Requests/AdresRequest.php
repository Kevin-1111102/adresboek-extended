<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdresRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        $adres = $this->route('adres');

        return [
            'naam' => [
                'required',
                'string',
                'max:255',
                Rule::unique('adressen', 'naam')
                    ->ignore(optional($adres)->id)
                    ->where('user_id', auth()->id()),
            ],
            'straat' => 'required|string|max:255',
            'huisnummer' => 'required|string|max:10',
            'postcode' => ['required', 'string', 'regex:/^\d{4}\s?[A-Za-z]{2}$/'],
            'stad' => 'required|string|max:255',
        ];
    }
}

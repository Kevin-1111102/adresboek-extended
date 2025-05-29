<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdresRequest extends FormRequest
{
    public function authorize()
    {
        // Authorization will be handled in the controller via policy
        return true;
    }

    public function rules()
    {
        $adres = $this->route('adres') ? $this->route('adres')->id : null;

        return [
            'naam' => 'required|string|max:255|unique:adressen,naam,' . $adres . ',id,user_id,' . auth()->id(),
            'straat' => 'required|string|max:255',
            'huisnummer' => 'required|string|max:10',
            'postcode' => ['required', 'string', 'regex:/^\d{4}\s?[A-Za-z]{2}$/'],
            'stad' => 'required|string|max:255',
        ];
    }
}

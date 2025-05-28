<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreAdresRequest extends FormRequest
{
    public function authorize()
    {
        // Allow only authenticated users to create addresses
        return Auth::check();
    }

    public function rules()
    {
        return [
            'naam' => 'required|string|max:255|unique:adressen,naam,NULL,id,user_id,' . Auth::id(),
            'straat' => 'required|string|max:255',
            'huisnummer' => 'required|string|max:10',
            'postcode' => ['required', 'string', 'regex:/^\d{4}\s?[A-Za-z]{2}$/'],
            'stad' => 'required|string|max:255',
        ];
    }
}

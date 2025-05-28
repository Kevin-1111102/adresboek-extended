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
        return [
            'naam' => 'required|string|max:255',
            'straat' => 'required|string|max:255',
            'huisnummer' => 'required|string|max:10',
            'postcode' => 'required|string|max:10',
            'stad' => 'required|string|max:255',
        ];
    }
}

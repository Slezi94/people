<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeopleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'dept' => 'required|string',
            'rank' => 'required|string',
            'phone' => ['required','regex:/^\+36 \(1\) 666-[0-9]{4}$/'],
            'room' => 'string'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo' => 'nullable|image',
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'age' => 'required|integer|min:18|max:99',
        'date_naissance' => 'required|date',
        'about_me' => 'nullable|string|max:1000',
        'adresse' => 'required|string|max:255',
        'city_state' => 'required|string|max:255',
        'pin_code' => 'required|string|max:10',
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        ];
    }
}

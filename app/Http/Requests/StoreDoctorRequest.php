<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreDoctorRequest extends FormRequest
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
            'username' => ['required', 'string', 'max:255'],
            'specialite' => ['required', 'string', 'max:255'],
            'membre_since' => ['required', 'date'],
            'status' => ['required', 'string', 'in:active,inactive'],
            'sex' => ['required', 'string', 'in:male,female'],
            'date' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:doctors'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required', 'string', 'max:20'],
            'clinicname' => ['required', 'string', 'max:255'],
            'clinicadresse' => ['required', 'string', 'max:255'],
            'clinicimage' => ['nullable', 'max:2048'],
            'adresse_one' => ['required', 'string', 'max:255'],
            'adresse_two' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'code_postal' => ['required', 'string', 'max:20'],
            'pricing' => ['required', 'string'],
            'photo' => ['nullable', 'max:2048'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'The given data was invalid.',
            'errors' => $validator->errors(),
        ], 422));
    }
}

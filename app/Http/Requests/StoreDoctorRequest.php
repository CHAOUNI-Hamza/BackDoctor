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
            /*'username' => ['required', 'string', 'max:255'], 
            'specialite' => ['nullable','string', 'max:255'],
            'membre_since' => ['nullable','date'],
            'status' => ['nullable','string', 'in:active,inactive'],
            'sex' => ['nullable','string', 'in:male,female'],
            'date' => ['nullable','date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:doctors'],
            'firstname' => [, 'string', 'max:255'],
            'lastname' => [, 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => [, 'string', 'max:20'],
            'clinicname' => [, 'string', 'max:255'],
            'clinicadresse' => [, 'string', 'max:255'],
            'clinicimage' => ['nullable', 'max:2048'],
            'adresse_one' => ['required', 'string', 'max:255'],
            'adresse_two' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'code_postal' => ['nullable', 'string', 'max:20'],
            'pricing' => ['nullable', 'string'],
            'photo' => ['nullable', 'max:2048'],
            'service' => 'nullable',
        'specialization' => 'nullable',
        'education' => 'nullable',
        'experience' => 'nullable',
        'awords' => 'nullable',
        'memberships' => 'nullable',
        'registrations' => 'nullable',*/
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

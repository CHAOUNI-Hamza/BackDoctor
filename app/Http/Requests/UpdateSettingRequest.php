<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateSettingRequest extends FormRequest
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
            /*'email' => 'nullable|email',
            'logo' => 'nullable|image',
            'favicon' => 'nullable|image',
            'address_one' => 'nullable|string',
            'address_two' => 'nullable|string',
            'city' => 'nullable|string',
            'province' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'country' => 'nullable|string',
            'time_zone' => 'nullable|string',
            'date_format' => 'nullable|string',
            'time_format' => 'nullable|string',
            'currency' => 'nullable|string',
            'paypal_tokenization_key' => 'nullable|string',
            'paypal_merchant_id' => 'nullable|string',
            'paypal_public_key' => 'nullable|string',
            'paypal_private_key' => 'nullable|string',
            'paypal_app_id' => 'nullable|string',
            'paypal_secret_key' => 'nullable|string',
            'stripe_option' => 'nullable|string',
            'stripe_name' => 'nullable|string',
            'stripe_merchant_id' => 'nullable|string',
            'stripe_rest_id' => 'nullable|string',
            'php_mail_email' => 'nullable|email',
            'php_mail_password' => 'nullable|string',
            'php_mail_email_from_name' => 'nullable|string',
            'smtp_email' => 'nullable|email',
            'smtp_password' => 'nullable|string',
            'smtp_email_host' => 'nullable|string',
            'smtp_email_port' => 'nullable|integer',
            'google_client_id' => 'nullable|string',
            'google_client_secret' => 'nullable|string',
            'facebook_app_id' => 'nullable|string',
            'facebook_app_secret' => 'nullable|string',
            'twitter_client_id' => 'nullable|string',
            'twitter_client_secret' => 'nullable|string',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'seo_title' => 'nullable|string',
            'seo_description' => 'nullable|string',
            'google_analytics' => 'nullable|string',
            'google_adcence_code' => 'nullable|string',
            'facebook_messanger' => 'nullable|string',
            'display_facebook_pixel' => 'nullable|boolean',
            'google_rechaptcha_key' => 'nullable|string',
            'google_rechaptcha_secret' => 'nullable|string',
            'cookies_agreement' => 'nullable|boolean'*/
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

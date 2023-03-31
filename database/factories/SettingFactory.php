<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->safeEmail(),
            'logo' => 'example_logo.png',
            'favicon' => 'example_favicon.ico',
            'address_one' => $this->faker->streetAddress(),
            'address_two' => $this->faker->secondaryAddress(),
            'city' => $this->faker->city(),
            'province' => $this->faker->state(),
            'postal_code' => $this->faker->postcode(),
            'country' => $this->faker->country(),
            'time_zone' => $this->faker->timezone(),
            'date_format' => 'Y-m-d',
            'time_format' => 'H:i:s',
            'currency' => 'USD',
            'paypal_tokenization_key' => 'PAYPAL_TOKENIZATION_KEY',
            'paypal_merchant_id' => 'PAYPAL_MERCHANT_ID',
            'paypal_public_key' => 'PAYPAL_PUBLIC_KEY',
            'paypal_private_key' => 'PAYPAL_PRIVATE_KEY',
            'paypal_app_id' => 'PAYPAL_APP_ID',
            'paypal_secret_key' => 'PAYPAL_SECRET_KEY',
            'stripe_option' => 'stripe',
            'stripe_name' => 'My Business',
            'stripe_merchant_id' => 'STRIPE_MERCHANT_ID',
            'stripe_rest_id' => 'STRIPE_REST_ID',
            'php_mail_email' => $this->faker->safeEmail(),
            'php_mail_password' => 'PHP_MAIL_PASSWORD',
            'php_mail_email_from_name' => 'PHP_MAIL_EMAIL_FROM_NAME',
            'smtp_email' => $this->faker->safeEmail(),
            'smtp_password' => 'SMTP_PASSWORD',
            'smtp_email_host' => 'SMTP_EMAIL_HOST',
            'smtp_email_port' => 'SMTP_EMAIL_PORT',
            'google_client_id' => 'GOOGLE_CLIENT_ID',
            'google_client_secret' => 'GOOGLE_CLIENT_SECRET',
            'facebook_app_id' => 'FACEBOOK_APP_ID',
            'facebook_app_secret' => 'FACEBOOK_APP_SECRET',
            'twitter_client_id' => 'TWITTER_CLIENT_ID',
            'twitter_client_secret' => 'TWITTER_CLIENT_SECRET',
            'facebook' => 'https://facebook.com/',
            'twitter' => 'https://twitter.com/',
            'linkedin' => 'https://linkedin.com/',
            'seo_title' => $this->faker->sentence(6),
            'seo_description' => $this->faker->paragraph(2),
            'google_analytics' => 'GOOGLE_ANALYTICS_CODE',
            'google_adcence_code' => 'GOOGLE_ADCENCE_CODE',
            'facebook_messanger' => 'FACEBOOK_MESSENGER_URL',
            'display_facebook_pixel' => 1,
            'google_rechaptcha_key' => 'GOOGLE_RECAPTCHA_KEY',
            'google_rechaptcha_secret' => 'GOOGLE_RECAPTCHA_SECRET',
        ];
    }
}

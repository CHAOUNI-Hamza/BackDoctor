<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'email', 
        'logo', 
        'favicon', 
        'address_one', 
        'address_two', 
        'city', 
        'province', 
        'postal_code', 
        'country', 
        'time_zone', 
        'date_format', 
        'time_format', 
        'currency', 
        'paypal_tokenization_key', 
        'paypal_merchant_id', 
        'paypal_public_key', 
        'paypal_private_key', 
        'paypal_app_id', 
        'paypal_secret_key', 
        'stripe_option', 
        'stripe_name', 
        'stripe_merchant_id', 
        'stripe_rest_id', 
        'php_mail_email', 
        'php_mail_password', 
        'php_mail_email_from_name', 
        'smtp_email', 
        'smtp_password', 
        'smtp_email_host', 
        'smtp_email_port', 
        'google_client_id', 
        'google_client_secret', 
        'facebook_app_id', 
        'facebook_app_secret', 
        'twitter_client_id', 
        'twitter_client_secret', 
        'facebook', 
        'twitter', 
        'linkedin', 
        'seo_title', 
        'seo_description', 
        'google_analytics', 
        'google_adcence_code', 
        'facebook_messanger', 
        'display_facebook_pixel', 
        'google_rechaptcha_key', 
        'google_rechaptcha_secret', 
        'cookies_agreement'
    ];
}

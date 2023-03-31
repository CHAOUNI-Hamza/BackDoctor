<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
    $table->string('logo')->nullable();
    $table->string('favicon')->nullable();
    $table->string('address_one')->nullable();
    $table->string('address_two')->nullable();
    $table->string('city')->nullable();
    $table->string('province')->nullable();
    $table->string('postal_code')->nullable();
    $table->string('country')->nullable();
    $table->string('time_zone')->nullable();
    $table->string('date_format')->nullable();
    $table->string('time_format')->nullable();
    $table->string('currency')->nullable();
    $table->string('paypal_tokenization_key')->nullable();
    $table->string('paypal_merchant_id')->nullable();
    $table->string('paypal_public_key')->nullable();
    $table->string('paypal_private_key')->nullable();
    $table->string('paypal_app_id')->nullable();
    $table->string('paypal_secret_key')->nullable();
    $table->string('stripe_option')->nullable();
    $table->string('stripe_name')->nullable();
    $table->string('stripe_merchant_id')->nullable();
    $table->string('stripe_rest_id')->nullable();
    $table->string('php_mail_email')->nullable();
    $table->string('php_mail_password')->nullable();
    $table->string('php_mail_email_from_name')->nullable();
    $table->string('smtp_email')->nullable();
    $table->string('smtp_password')->nullable();
    $table->string('smtp_email_host')->nullable();
    $table->string('smtp_email_port')->nullable();
    $table->string('google_client_id')->nullable();
    $table->string('google_client_secret')->nullable();
    $table->string('facebook_app_id')->nullable();
    $table->string('facebook_app_secret')->nullable();
    $table->string('twitter_client_id')->nullable();
    $table->string('twitter_client_secret')->nullable();
    $table->string('facebook')->nullable();
    $table->string('twitter')->nullable();
    $table->string('linkedin')->nullable();
    $table->string('seo_title')->nullable();
    $table->string('seo_description')->nullable();
    $table->string('google_analytics')->nullable();
    $table->string('google_adcence_code')->nullable();
    $table->string('facebook_messanger')->nullable();
    $table->string('display_facebook_pixel')->nullable();
    $table->string('google_rechaptcha_key')->nullable();
    $table->string('google_rechaptcha_secret')->nullable();
    $table->boolean('cookies_agreement')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}

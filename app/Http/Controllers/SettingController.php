<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Requests\StoreSettingRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateSettingRequest;
use App\Http\Resources\SettingResource;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $setting = Setting::find($id);

        return new SettingResource($setting);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingRequest  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, $id)
    {
        $setting = Setting::find($id); 

        $setting->email = $request->input('email'); 

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('public/clients');  
            $setting->logo = Storage::url($path);
        }

        if ($request->hasFile('favicon')) {
            $path = $request->file('favicon')->store('public/clients');  
            $setting->favicon = Storage::url($path);
        }

        $setting->address_one = $request->input('address_one');
        $setting->address_two = $request->input('address_two');
        $setting->city = $request->input('city');
        $setting->province = $request->input('province');
        $setting->postal_code = $request->input('postal_code');
        $setting->country = $request->input('country');
        $setting->time_zone = $request->input('time_zone');
        $setting->date_format = $request->input('date_format');
        $setting->time_format = $request->input('time_format');
        $setting->currency = $request->input('currency');
        $setting->paypal_tokenization_key = $request->input('paypal_tokenization_key');
        $setting->paypal_merchant_id = $request->input('paypal_merchant_id');
        $setting->paypal_public_key = $request->input('paypal_public_key');
        $setting->paypal_private_key = $request->input('paypal_private_key');
        $setting->paypal_app_id = $request->input('paypal_app_id');
        $setting->paypal_secret_key = $request->input('paypal_secret_key');
        $setting->stripe_option = $request->input('stripe_option');
        $setting->stripe_name = $request->input('stripe_name');
        $setting->stripe_merchant_id = $request->input('stripe_merchant_id');
        $setting->stripe_rest_id = $request->input('stripe_rest_id');
        $setting->php_mail_email = $request->input('php_mail_email');
        $setting->php_mail_password = $request->input('php_mail_password');
        $setting->php_mail_email_from_name = $request->input('php_mail_email_from_name');
        $setting->smtp_email = $request->input('smtp_email');
        $setting->smtp_password = $request->input('smtp_password');
        $setting->smtp_email_host = $request->input('smtp_email_host');
        $setting->smtp_email_port = $request->input('smtp_email_port');
        $setting->google_client_id = $request->input('google_client_id');
        $setting->google_client_secret = $request->input('google_client_secret');
        $setting->facebook_app_id = $request->input('facebook_app_id');
        $setting->facebook_app_secret = $request->input('facebook_app_secret');
        $setting->twitter_client_id = $request->input('twitter_client_id');
        $setting->twitter_client_secret = $request->input('twitter_client_secret');
        $setting->facebook = $request->input('facebook');
        $setting->twitter = $request->input('twitter');
        $setting->linkedin = $request->input('linkedin');
        $setting->seo_title = $request->input('seo_title');
        $setting->seo_description = $request->input('seo_description');
        $setting->google_analytics = $request->input('google_analytics');
        $setting->google_adcence_code = $request->input('google_adcence_code');
        $setting->facebook_messanger = $request->input('facebook_messanger');
        $setting->display_facebook_pixel = $request->input('display_facebook_pixel');
        $setting->cookies_agreement = $request->input('cookies_agreement');

        $setting->save();
        return new SettingResource($setting);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'username' => $this->username,
            'specialite' => $this->specialite,
            'membre_since' => $this->membre_since,
            'status' => $this->status,
            'photo' => $this->photo,
            'sex' => $this->sex,
            'date' => $this->date,
            'email' => $this->email,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'password' => $this->password,
            'phone' => $this->phone,
            'clinicname' => $this->clinicname,
            'clinicadresse' => $this->clinicadresse,
            'clinicimage' => $this->clinicimage,
            'adresse_one' => $this->adresse_one,
            'adresse_two' => $this->adresse_two,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'code_postal' => $this->code_postal,
            'pricing' => $this->pricing,
        ]
    }
}

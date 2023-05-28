<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Patient;
use App\Models\Appointement;
use App\Models\specialty;   

class Doctor extends Authenticatable implements JWTSubject
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $guard = "doctor";

    protected $fillable = [
        'username',
        'specialite',
        'membre_since',
        'status',
        'photo',
        'sex',
        'date',
        'email',
        'firstname',
        'lastname',
        'password',
        'phone',
        'clinicname',
        'clinicadresse',
        'clinicimage',
        'adresse_one',
        'adresse_two',
        'city',
        'state',
        'country',
        'code_postal',
        'pricing',
        'service',
            'specialization',
            'education',
            'experience',
            'awords',
            'memberships',
            'registrations',
            'email_verified_at',
            'google_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointement::class);
    }

    public function patients()
    {
        return $this->belongsToMany(Patient::class);
    }

    public function specialty()
    {
        return $this->belongsTo(specialty::class);
    }

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}

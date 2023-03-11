<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

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
    ];
}

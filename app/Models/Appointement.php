<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Patient;
use App\Models\Doctor;

class Appointement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id','disease', 'consultation_type', 'date_time', 'amount', 'status', 'patient_id', 'doctor_id'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Doctor;  

class specialty extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'photo'];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}

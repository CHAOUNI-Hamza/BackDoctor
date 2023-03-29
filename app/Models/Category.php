<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Pharmacy;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'photo', 'icone'];

    public function pharmacies()
    {
        return $this->hasMany(Pharmacy::class);
    }
}

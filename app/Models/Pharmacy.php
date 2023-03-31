<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

class Pharmacy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'category_id', 'address', 'administrator', 'phone', 'photo', 'about', 'location'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

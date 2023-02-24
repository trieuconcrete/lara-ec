<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $fillable = [
        'name',
        'slug',
        'status',
        'description',
        'address',
        'website',
        'phone',
        'image'
    ];

    public function products()
    {
        return $this->hasOne(Product::class, 'brand_id', 'id');
    }
}

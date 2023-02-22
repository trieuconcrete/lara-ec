<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $talbe = 'product_images';
    protected $fillable = [
        'product_id',
        'image'
    ];
}

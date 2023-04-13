<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariant extends Model
{
    use HasFactory;

    protected $table = 'product_variants';

    protected $fillable = [
        'product_id',
        'color_id',
        'quantity',
        'size',
        'price',
        'image',
        'image_thumb',
        'notes',
        'options',
        'options'
    ];

    protected $casts = [
        'options' => 'array'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function getPathImageAttribute()
    {
        $url = $this->image ? Storage::disk('local')->url($this->image) : 'no_img.png';
        return asset($url);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        'image',
        'image_thumb'
    ];

    public function products()
    {
        return $this->hasOne(Product::class, 'brand_id', 'id');
    }

    public function getImage()
    {
        $url = $this->image ? Storage::disk('local')->url($this->image) : 'default_brand.png';
        return asset($url);
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
}

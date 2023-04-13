<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'description',
        'image',
        'image_thumb',
        'meta_title',
        'meta_keywork',
        'meta_description',
        'status'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function relatedProducts()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->latest()->take(4);
    }

    public function getImage()
    {
        $url = $this->image ? Storage::disk('local')->url($this->image) : 'default_category.png';
        return asset($url);
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
}

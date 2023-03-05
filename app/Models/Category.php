<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'meta_title',
        'meta_keywork',
        'meta_description',
        'status'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function getImage()
    {
        $url = $this->image ? Storage::disk('local')->url($this->image) : null;
        return $url ? asset($url) : null;
    }
}

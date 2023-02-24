<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function getImagePath()
    {
        $url = $this->image ? Storage::disk('local')->url($this->image) : null;
        return $url ? asset($url) : null;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{
    use HasFactory;

    protected $talbe = 'product_images';
    protected $fillable = [
        'product_id',
        'image'
    ];

    public function getImagePath()
    {
        $url = $this->image ? Storage::disk('local')->url($this->image) : null;
        return $url ? asset($url) : null;
    }
}

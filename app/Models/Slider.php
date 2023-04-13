<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';
    protected $fillable = [
        'title',
        'image',
        'image_thumb',
        'description',
        'title_md',
        'title_sm',
        'link',
        'text_link',
        'status',
        'contents'
    ];

    protected $casts = [
        'contents' => 'array'
    ];

    public function getImage()
    {
        $url = $this->image ? Storage::disk('local')->url($this->image) : 'default_slider.png';;
        return asset($url);
    }
}

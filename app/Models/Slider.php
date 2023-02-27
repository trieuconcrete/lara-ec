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

    public function getImagePath()
    {
        $url = $this->image ? Storage::disk('local')->url($this->image) : null;
        return $url ? asset($url) : null;
    }
}

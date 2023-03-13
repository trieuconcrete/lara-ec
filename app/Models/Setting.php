<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;
    
    protected $talbe = 'settings';

    protected $fillable = [
        'key',
        'value',
        'comment'
    ];

    public function getImage()
    {
        $url = $this->value ? Storage::disk('local')->url($this->value) : null;
        return $url ? asset($url) : null;
    }

    public function getImagePathAttribute()
    {
        $url = $this->value ? Storage::disk('local')->url($this->value) : null;
        return $url ? asset($url) : null;
    }
}

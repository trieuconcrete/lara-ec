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
        $url = ($this->key == 'logo_header' && $this->value) ? Storage::disk('local')->url($this->value) : 'no_img.png';
        return asset($url);
    }

    public function getLogoHeader()
    {
        $url = ($this->key == 'logo_header' && $this->value) ? Storage::disk('local')->url($this->value) : 'logo.png';
        return asset($url);
    }

    public function getLogoFooter()
    {
        $url = ($this->key == 'logo_footer' && $this->value) ? Storage::disk('local')->url($this->value) : 'logo.png';
        return asset($url);
    }

    public function getImagePathAttribute()
    {
        $url = $this->value ? Storage::disk('local')->url($this->value) : 'no_img.png';
        return asset($url);
    }
}

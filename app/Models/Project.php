<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'project_code',
        'name_en',
        'name_jp_1',
        'name_jp_2',
        'start_date',
        'end_date',
        'status',
        'type',
        'notes',
        'image',
        'manager_id',
        'sub_manager_id',
        'client_id'
    ];

    public function getProjectImageAttribute()
    {
        $url = $this->image ? Storage::disk('local')->url($this->image) : 'no_img.png';
        return asset($url);
    }
}

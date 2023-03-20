<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'user_details';
    
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'avatar',
        'phone',
        'address',
        'zipcode',
        'city',
        'state',
        'country',
        'birthday',
        'gender',
        'contract_type',
        'position_id',
        'branch_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAvatar()
    {
        $url = $this->avatar ? Storage::disk('local')->url($this->avatar) : null;
        return $url ? asset($url) : null;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    
    protected $fillable = [
        'user_id',
        'tracking_no',
        'first_name',
        'last_name',
        'email',
        'phone',
        'billing_address',
        'billing_address2',
        'zipcode',
        'city',
        'country',
        'state',
        'status',
        'notes',
        'payment_mode',
        'payment_id',
        'total_price',
        'order_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    /**
     * Get full name
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get full name
     */
    public function getTotalPriceAttribute()
    {
        return $this->orderItems->sum('sub_total_price');
    }
}

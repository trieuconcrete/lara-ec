<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'product_id',
        'product_option_value_id',
        'product_color_id',
        'quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productColor()
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id');
    }

    public function productOptionValue()
    {
        return $this->belongsTo(ProductOptionValue::class);
    }

    /**
     * Get subtotal price
     */
    protected function getSubTotalPriceAttribute()
    {
        return $this->quantity * $this->product->selling_price;
    }
}

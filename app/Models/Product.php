<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;

    protected $talbe = 'products';

    protected $fillable = [
        'product_code',
        'category_id',
        'brand_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'featured',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'main_image',
        'discount',
        'views',
        'likes',
        'sku',
        'number_month_brand_warranty',
        'number_day_return',
        'is_cash_on_delivery',
        'is_visibility',
        'published_at',
        'product_tag_id',
        'rating'
    ];

    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id');
    }

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }

    public function getColors()
    {
        return $this->productVariants->unique('color_id');
    }

    public function getSizes()
    {
        return $this->productVariants->unique('size')->pluck('size');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id', 'id');
    }

    public function getImage($index = 0)
    {
        $url = isset($this->productImages[$index]) ? Storage::disk('local')->url($this->productImages[$index]['image']) : 'no_img.png';
        return asset($url);
    }

    public function getMainImage()
    {
        $url = $this->main_image ? Storage::disk('local')->url($this->main_image) : 'no_img.png';
        return asset($url);
    }

    /**
     * Get the sale off price
     */
    protected function getSalePriceAttribute()
    {
        $salePrice = $this->selling_price;
        if ($this->selling_price) {
            $salePrice = ($this->selling_price * $this->discount)/100;
        }
        return $this->selling_price - $salePrice;
    }

    /**
     * Get the sale off
     */
    protected function getSalePercentAttribute()
    {
        return $this->discount ? '↓'.$this->discount.'%' : null;
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->product_code = Str::upper(Str::random(4)).Carbon::now()->format('Ymd');
            $model->slug = Str::slug($model->name);
        });

        static::created(function ($model) {
            ProductVariant::create(['product_id' => $model->id]);
            $model->slug = Str::slug($model->name);
        });
    }
}

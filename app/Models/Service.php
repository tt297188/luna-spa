<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'image',
        'price',
        'duration',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Lấy tất cả đánh giá thuộc dịch vụ này
    public function reviews()
    {
        return $this->hasManyThrough(
            Review::class,
            Booking::class,
            'service_id',
            'booking_id',
            'id',
            'id'
        );
    }
}
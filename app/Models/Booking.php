<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'customer_id',
        'service_id',
        'booking_date',
        'booking_time',
        'quantity',
        'total_price',
        'status',
        'note'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Một lịch hẹn có một đánh giá
    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
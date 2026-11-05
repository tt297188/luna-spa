<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Service;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required',
        ]);

        $customer = Customer::firstOrCreate(
            ['phone' => $request->phone],
            ['name' => $request->customer_name]
        );

        $service = Service::findOrFail($request->service_id);

         Booking::create([
           'customer_id' => $customer->id,
           'service_id' => $request->service_id,
           'booking_date' => $request->booking_date,
           'booking_time' => $request->booking_time,
           'quantity' => 1,
           'total_price' => $service->price,
           'status' => 'pending',
        ]);

        return redirect('/')
            ->with('success', 'Đặt lịch thành công! Luna Spa sẽ liên hệ với bạn.');
    }
}

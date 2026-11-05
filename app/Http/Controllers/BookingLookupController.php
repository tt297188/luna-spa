<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingLookupController extends Controller
{
    public function index()
    {
        return view('booking_lookup');
    }

    public function search(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:15',
        ]);

        $bookings = Booking::with(['customer', 'service'])
            ->whereHas('customer', function ($query) use ($request) {
                $query->where('phone', $request->phone);
            })
            ->orderBy('booking_date', 'desc')
            ->get();

        return view('booking_lookup', compact('bookings'));
    }
}

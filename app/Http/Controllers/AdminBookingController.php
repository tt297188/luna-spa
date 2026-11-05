<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
class AdminBookingController extends Controller
{
    public function index()
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }
        $bookings = Booking::with(['customer', 'service'])
            ->latest()
            ->get();
        return view('admin.bookings.index', compact('bookings'));
    }
    public function updateStatus(Request $request, $id)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);
        $booking = Booking::findOrFail($id);
        $booking->update([
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công!');
    }
}
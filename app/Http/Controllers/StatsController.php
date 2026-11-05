<?php
namespace App\Http\Controllers;
use App\Models\Booking;
class StatsController extends Controller
{
    public function index()
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $completedBookings = Booking::where('status', 'completed')->count();
        $totalRevenue = Booking::where('status', 'completed')
            ->sum('total_price');
        return view('admin.stats.index', compact(
            'totalBookings',
            'pendingBookings',
            'completedBookings',
            'totalRevenue'
        ));
    }
}
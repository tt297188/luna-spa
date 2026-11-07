<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Booking;

class ReviewController extends Controller
{
    // Khách hàng gửi đánh giá
    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        $booking = Booking::with('customer')->findOrFail($id);

        if (
            !session()->has('review_phone') ||
            session('review_phone') != $booking->customer->phone
        ) {
            abort(403, 'Bạn không có quyền đánh giá lịch hẹn này.');
        }

        if ($booking->status != 'completed') {
            return back()->with('error', 'Dịch vụ chưa hoàn thành, bạn chưa thể đánh giá!');
        }

        if ($booking->review()->exists()) {
            return back()->with('error', 'Lịch hẹn này đã được đánh giá!');
        }

        Review::create([
            'booking_id' => $booking->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'status' => 'approved',
        ]);

        return back()->with('success', 'Cảm ơn bạn đã đánh giá Luna Spa!');
    }

    // Danh sách đánh giá dành cho admin
    public function index()
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $reviews = Review::with(['booking.customer', 'booking.service'])
            ->latest()
            ->get();

        return view('admin.reviews.index', compact('reviews'));
    }

    // Ẩn hoặc hiển thị đánh giá
    public function updateStatus(Request $request, $id)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'status' => 'required|in:approved,hidden',
        ]);

        $review = Review::findOrFail($id);

        $review->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Cập nhật đánh giá thành công!');
    }

    // Xóa đánh giá
    public function destroy($id)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $review = Review::findOrFail($id);
        $review->delete();

        return back()->with('success', 'Xóa đánh giá thành công!');
    }
}
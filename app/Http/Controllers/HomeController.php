<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', 1)->get();

        $services = Service::where('is_active', 1)->get();

        // Lấy các đánh giá đã được duyệt
        $reviews = Review::with(['booking.customer', 'booking.service'])
            ->where('status', 'approved')
            ->latest()
            ->get();

        return view('home', compact('categories', 'services', 'reviews'));
    }
    public function services()
    {
        $categories = Category::where('is_active', 1)->get();

        $services = Service::with([
           'category',
           'reviews' => function ($query) {
            $query->where('reviews.status', 'approved')
                  ->with('booking.customer')
                  ->latest();
        }
    ])
    ->where('is_active', 1)
    ->latest()
    ->get();

    return view('dich-vu', compact('categories', 'services'));
    }
    public function booking()
    {
        $services = Service::where('is_active', 1)->get();

        return view('dat-lich', compact('services'));
    }
 }
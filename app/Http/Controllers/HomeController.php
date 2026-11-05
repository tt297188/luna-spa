<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', 1)->get();
        $services = Service::where('is_active', 1)->get();

        return view('home', compact('categories', 'services'));
    }

    public function services()
    {
        $categories = Category::where('is_active', 1)->get();

        $services = Service::with('category')
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
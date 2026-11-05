<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Hiển thị trang đăng nhập
    public function login()
    {
        return view('admin.login');
    }

    // Xử lý đăng nhập
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)
            ->where('is_active', 1)
            ->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->withErrors([
                'email' => 'Email hoặc mật khẩu không chính xác!'
            ])->withInput($request->only('email'));
        }

        $request->session()->regenerate();

        $request->session()->put('admin_id', $admin->id);

        return redirect()->route('admin.dashboard');
    }

    // Trang quản trị
    public function dashboard(Request $request)
    {
        if (!$request->session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $admin = Admin::find($request->session()->get('admin_id'));

        if (!$admin || !$admin->is_active) {
            $request->session()->forget('admin_id');
            return redirect()->route('admin.login');
        }

        return view('admin.dashboard', compact('admin'));
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        $request->session()->forget('admin_id');

        $request->session()->regenerate();

        return redirect()->route('admin.login');
    }
}
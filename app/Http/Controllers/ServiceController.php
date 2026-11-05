<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    // Kiểm tra đăng nhập Admin
    private function checkAdmin()
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }
        return null;
    }
    // Danh sách dịch vụ
    public function index()
    {
        if ($redirect = $this->checkAdmin()) return $redirect;
        $services = Service::with('category')->latest()->get();
        return view('admin.services.index', compact('services'));
    }
    // Form thêm dịch vụ
    public function create()
    {
        if ($redirect = $this->checkAdmin()) return $redirect;
        $categories = Category::where('is_active', 1)->get();
        return view('admin.services.create', compact('categories'));
    }
    // Lưu dịch vụ mới
    public function store(Request $request)
    {
        if ($redirect = $this->checkAdmin()) return $redirect;
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);
        Service::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . time(),
            'description' => $request->description,
            'image' => $request->image,
            'price' => $request->price,
            'duration' => $request->duration,
            'is_active' => $request->has('is_active'),
        ]);
        return redirect()->route('admin.services.index')
            ->with('success', 'Thêm dịch vụ thành công!');
    }
    // Form sửa dịch vụ
    public function edit($id)
    {
        if ($redirect = $this->checkAdmin()) return $redirect;
        $service = Service::findOrFail($id);
        $categories = Category::where('is_active', 1)->get();
        return view('admin.services.edit', compact('service', 'categories'));
    }
    // Cập nhật dịch vụ
    public function update(Request $request, $id)
    {
        if ($redirect = $this->checkAdmin()) return $redirect;
        $service = Service::findOrFail($id);
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);
        $service->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . $service->id,
            'description' => $request->description,
            'image' => $request->image,
            'price' => $request->price,
            'duration' => $request->duration,
            'is_active' => $request->has('is_active'),
        ]);
        return redirect()->route('admin.services.index')
            ->with('success', 'Cập nhật dịch vụ thành công!');
    }
    // Xóa dịch vụ
    public function destroy($id)
    {
        if ($redirect = $this->checkAdmin()) return $redirect;
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('admin.services.index')
            ->with('success', 'Xóa dịch vụ thành công!');
    }
}

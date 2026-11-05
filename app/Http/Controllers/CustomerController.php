<?php
namespace App\Http\Controllers;
use App\Models\Customer;
class CustomerController extends Controller
{
    public function index()
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }
        $customers = Customer::latest()->get();
        return view('admin.customers.index', compact('customers'));
    }
}
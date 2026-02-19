<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Inquiry;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products' => Product::count(),
            'categories' => Category::count(),
            'inquiries' => Inquiry::count(),
        ];
        $recentInquiries = Inquiry::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentInquiries'));
    }
}

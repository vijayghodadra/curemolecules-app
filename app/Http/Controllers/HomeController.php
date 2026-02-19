<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::take(4)->get();
        return view('home', compact('featuredProducts'));
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function quality()
    {
        return view('quality');
    }

    public function logistics()
    {
        return view('logistics');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();
        $brands = Brand::inRandomOrder()->take(config('products.brand_on_home'))->get();

        return view('index', ['products' => $products, 'brands' => $brands]);
    }

    public function contact() {
        return view('contact');
    }

    public function term() {
        return view('term');
    }
}

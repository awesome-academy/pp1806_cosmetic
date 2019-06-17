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
        $products = Product::paginate(config('products.paginate'));
        $brands = Brand::inRandomOrder()->take(config('products.brand_on_home'))->get();

        return view('index', ['products' => $products, 'brands' => $brands]);
    }

    public function contact() {
        return view('contact');
    }

    public function term() {
        return view('term');
    }

    public function search() {
        $name = $_GET['name'];
        $products = Product::where([
            ['name', 'LIKE', '%' . $name . '%'],
        ])->get();
        return view('category.index', ['name'=>$name, 'products'=> $products]);
    }
}

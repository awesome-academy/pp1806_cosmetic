<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;

class HomeController extends Controller
{
    public function index(Request $request) {
        $brands = Brand::inRandomOrder()->take(config('products.brand_on_home'))->get();
        $params = $request->all();
        $orderBy = isset($params['orderBy']) ? $params['orderBy'] : 'created_at';
        $type = isset($params['type']) ? $params['type'] : 'desc';
        $products = Product::orderBy($orderBy, $type)->paginate(config('products.paginate'));
        $selected = [
            1 => (($orderBy == 'created_at') && ($type == 'desc')),
            2 => (($orderBy == 'price') && ($type == 'asc')),
            3 => (($orderBy == 'price') && ($type == 'desc')),
        ];

        $data = [
            'products' => $products,
            'brands' => $brands,
            'selected' => $selected,
            'orderBy' => $orderBy,
            'type' => $type,
        ];

        return view('index', $data);
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

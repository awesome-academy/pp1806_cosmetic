<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;

class FrontendCategoryController extends Controller
{
    public function index() {
//        $products = Product::orderBy('created_at', 'DESC')->get();
        $category = Category::all();
        $products = Product::paginate(config('products.paginate'));
        return view('category.index', ['products'=> $products, 'category' => $category]);
    }

    public function getType($id) {
        $listId = [$id];
        $categories = Category::where('parent_id','=', $id)->get();
        foreach ($categories as $category){
            array_push($listId, $category->id);
        }
        $products = DB::table('products')->whereIn('category_id',  $listId)->get();

        return view('category.type', ['products' => $products]);
    }

}

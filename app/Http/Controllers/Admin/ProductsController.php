<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use App\Http\Requests\CreateProduct;

class ProductsController extends Controller
{
    public function index() {
    	$products = Product::all();

        return view('admin.products.list', ['products' => $products]);
    }

    public function create() {
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.products.create', ['categories' => $categories, 'brands' => $brands]);
    }

    public function store(CreateProduct $request) {
        $validated = $request->validated();
        $data = $request->only([
            'name',
            'category_id',
            'brand_id',
            'price',
            'image',
            'image_list',
        ]);
        $image = $this->upload($data['image']);

        if (!$image['status']) {
            return back()->with('status', $image['msg']);
        }

        $data['image'] = $image['file_name'];
        $imageList = $this->upload($data['image_list']);

        if (!$imageList['status']) {
            return back()->with('status', $imageList['msg']);
        }

        $data['image_list'] = $imageList['file_name'];
        $currentUserId = 1; // Update lated

        try {
            $data['user_id'] = $currentUserId;
            Product::create($data);
        } catch (\Exception $e) {
            return back()->with('status', $e->getMessage());
        }

        return redirect()->route('products.list')->with('status', __('products.status'));
    }

    private function upload($file) {
        $destinationFolder = public_path() . '/' . config('products.image_path');

        try {
            $fileName = $file->getClientOriginalName() . '_' . date('Ymd_His');
            $imageFileType = $file->getClientOriginalExtension();

            if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif' ) {
                $result = [
                    'status' => false,
                    'msg' => __('products.msg'),
                ];
            }

            $file->move($destinationFolder, $fileName);
            $result = [
                'status' => true,
                'file_name' => $fileName,
            ];
        } catch (Exception $e) {
            $msg = $e->getMessage();
            $result = [
                'status' => false,
                'msg' => $msg,
            ];
        }

        return $result;
    }
}

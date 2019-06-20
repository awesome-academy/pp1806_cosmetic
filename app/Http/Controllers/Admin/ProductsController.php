<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use App\Http\Requests\CreateProduct;
use App\Http\Requests\UpdateProduct;

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
        $imageList = [];

        foreach ($data['image_list'] as $item) {
            $image = $this->upload($item);

            if (!$image['status']) {
                return back()->with('status', $image['msg']);
            }

            $imageList[] = $image['file_name'];
        }

        $data['image_list'] = implode(",",array_values($imageList));
        try {
            $data['user_id'] = auth()->id();
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

    public function destroy($id) {
        $product = Product::find($id);

        if (!$product) {
            $result = [
                'status' => false,
                'message' => __('products.not_found'),
            ];
        } else {
            try {
                $product->delete();
                $result = [
                    'status' => true,
                    'message' => __('products.delete_success'),
                ];
            } catch (\Exception $e) {
                $result = [
                    'status' => true,
                    'message' => __('products.delete_fail'),
                    'error' => $e->getMessage()
                ];
            }
        }

        return response()->json($result);
    }

    public function edit($id) {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();

        if (!$product) {
            return redirect()->route('products.list')->with('status', __('products.not_found'));
        }

        return view('admin.products.edit', ['product' => $product, 'categories' => $categories, 'brands' => $brands]);
    }

    public function update(UpdateProduct $request, $id) {
        $data = $request->only([
            'name',
            'category_id',
            'brand_id',
            'price',
            'image',
            'image_list',
        ]);

        if (isset($data['image'])) {            
            $image = $this->upload($data['image']);

            if (!$image['status']) {
                return back()->with('status', $image['msg']);
            }

            $data['image'] = $image['file_name'];
        }

        if (isset($data['image_list'])) {
            $imageList = $this->upload($data['image_list']);

            if (!$imageList['status']) {
                return back()->with('status', $imageList['msg']);
            }

            $data['image_list'] = $imageList['file_name'];
        }

        try {
            $product = Product::find($id);
            $oldImage = $product->image;
            $oldImageList = $product->image_list;
            $product->update($data);
            
            if (isset($data['image'])) {
                $imagePath = public_path() . '/' . config('products.image_path') . $oldImage;

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            if (isset($data['image_list'])) {
                $imagePath = public_path() . '/' . config('products.image_path') . $oldImageList;

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            return redirect(route('products.list', $product->id))->with('status', __('products.updated'));
        } catch (\Exception $e) {
            return back()->with('status', __('products.update_fail'));
        }
    }
}

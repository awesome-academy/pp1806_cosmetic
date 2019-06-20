<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBrand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $brand = Brand::all();

        return view('admin.brand.index', ['brand' => $brand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBrand $request) {
        $data = $request->only([
            'name',
        ]);

        try {
            $brand = Brand::create($data);
        } catch (\Exception $e) {
            return back()->with('status', $e->getMessage());
        }

        return redirect()->route('admin.brand.index')->with('status', __('brand.status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $brand = Brand::find($id);

        if (!$brand) {
            return redirect()->route('admin.brand.index')->with('status', __('brand.not_found'));
        }

        return view('admin.brand.edit', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateBrand $request, $id) {
        $data = $request->only([
            'name',
        ]);

        try {
            $brand = Brand::find($id);
            $brand->update($data);

            return redirect()->route('admin.brand.index')->with('status', __('brand.updated'));
        } catch (\Exception $e) {
            return back()->with('status', __('brand.update_fail'));
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $brand = Brand::find($id);
            $brand->delete();
            $result = [
                'status' => true,
                'msg' => __('brand.delete_success'),
            ];
        } catch (Exception $e) {
            $result = [
                'status' => false,
                'msg' => __('brand.delete_fail'),
            ];
        }

        return redirect()->route('admin.brand.index')->with('status', __('Successfully'));
    }
}

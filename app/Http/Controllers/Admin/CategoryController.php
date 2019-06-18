<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $category = Category::all();

        return view('admin.category.index', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request) {
        $data = $request->only([
            'name',
        ]);

        try {
            $category = Category::create($data);
        } catch (Exception $e) {
            return back()->with('status', $e->getMessage());
        }

        return redirect('admin/category')->with('status', __('category.status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $category = Category::find($id);

        if (!$category) {
            return back()->with('status', __('category.fail'));
        }

        return view('admin/category/edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id) {
        $data = $request->only([
            'name',
        ]);

        try {
            $category = Category::find($id);
            $category->update($data);
        } catch (Exception $e) {
            return back()->with('status', $e->getMessage());
        }

        return redirect('admin/category/' . $id)->with('status', __('category.status'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $category = Category::find($id);
            $category->delete();
            $result = [
                'status' => true,
                'msg' => __('category.delete_success'),
            ];
        } catch (Exception $e) {
            $result = [
                'status' => false,
                'msg' => __('category.delete_fail'),
            ];
        }

        return redirect()->route('admin.category.index')->with('status', __('Successfully'));
    }
}


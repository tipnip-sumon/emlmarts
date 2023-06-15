<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $result['data'] = Category::all();
        return view('admin/category',$result);
    }
    public function product_list()
    {
        //
        return view('admin/products-list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function manage_category($id)
    {
    
        $result['data'] = Category::find($id);
        return view('admin/manage_category',$result['data']);
        
    }
    public function manage_category_update(Request $request)
    {
        $model = Category::find($request->id);
        $model->category_name = $request->category_name;
        $model->category_description = $request->category_description;
        $model->category_slug = $request->category_slug;
        $model->category_order = $request->category_order;
        $model->status=0;
        $model->save();
        $msg = "Category Updated";
        $request->session()->flash('message',$msg);
        return redirect('admin/category');
    }


    public function insert(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories',
        ]);
       
        $model = new Category();
        
        $model->category_name = $request->post('category_name');
        $model->category_description = $request->post('category_description');
        $model->category_slug = $request->post('category_slug');
        $model->category_order = $request->post('category_order');
        $model->status = 1;
        $model->save();
        $msg = "Category Inserted";
        $request->session()->flash('message',$msg);
        return redirect('admin/category');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function delete(Request $request,$id)
    {
        $model = Category::find($id);
        $model->delete();
        $request->session()->flash('message','Category Deleted');
        return redirect('admin/category');
    }
    public function status(Request $request,$status,$id)
    {
        $model = Category::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message','Status Changed');
        return redirect('admin/category');
    }
    public function edit(Category $category,$id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}

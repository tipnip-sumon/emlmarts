<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $result['category'] = DB::table('categories')->where(['status'=>1])->get();
        $result['size'] = DB::table('sizes')->get();
        return view('admin/manage_products',$result);
    }
    public function product_list()
    {
        //
        $result['data'] = Product::all();
        return view('admin/product',$result);
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
    public function manage_products($id)
    {
    
        $result1['data'] = Product::find($id);
        $result['category'] = DB::table('categories')->get();
        return view('admin/edit_products',['data'=>$result1['data'],$result]);
        
    }
    public function manage_product_update(Request $request)
    {
        $model = Product::find($request->id);
        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs('/public/media',$image_name);
            $model->image = $image_name;

        }
        $model->category_id = $request->category_id;
        $model->name = $request->name;
        $model->slug = $request->slug;
        $model->brand = $request->brand;
        $model->model = $request->model;
        $model->short_desc = $request->short_desc;
        $model->desc = $request->full_desc;
        $model->keywords = $request->keywords;
        $model->technical_spceification = $request->technical_spceification;
        $model->uses = $request->uses;
        $model->warranty = $request->warranty;
        $model->status = 1;
        $model->id = $request->post('id');
        $model->save();
        $msg = "Product Updated";
        $request->session()->flash('message',$msg);
        return redirect('admin/manage_products');
    }


    public function insert(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'name'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png',
            'slug'=>'required|unique:products'
        ]);
       
        $model = new Product();

        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs('/public/media',$image_name);
            $model->image = $image_name;

        }
        
        $model->category_id = $request->post('category_id');
        $model->name = $request->post('name');
        $model->slug = $request->post('slug');
        $model->brand = $request->post('brand');
        $model->model = $request->post('model');
        $model->short_desc = $request->post('short_desc');
        $model->desc = $request->post('full_desc');
        $model->keywords = $request->post('keywords');
        $model->technical_spceification = $request->post('technical_spceification');
        $model->uses = $request->post('uses');
        $model->warranty = $request->post('warranty');
        $model->status = 1;
        $model->save();
        $msg = "Product Inserted";
        $request->session()->flash('message',$msg);
        //$result['category'] = DB::table('categories')->where(['status'=>1])->get();
        return redirect('admin/product');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function delete(Request $request,$id)
    {
        $model = Product::find($id);
        $model->delete();
        $request->session()->flash('message','Product Deleted');
        return redirect('admin/product');
    }
    public function status(Request $request,$status,$id)
    {
        $model = Product::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message','Status Changed');
        return redirect('admin/Product');
    }
    public function edit(Product $Product,$id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $Product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $Product)
    {
        //
    }
}

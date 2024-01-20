<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $result['data'] = Brand::all();
        return view('admin/Brand',$result);
    }
    public function product_list()
    {
        return view('admin/products-list');
    }
    public function manage_brand($id)
    {
    
        $result['data'] = Brand::find($id);
        return view('admin/manage_brand',$result);
        
    }
    public function manage_brand_update(Request $request)
    {
        $request->validate([
            'brand_name'=>'required|unique:brands',
            'image'=>'required|mimes:jpg,jpeg,png',
        ]);
       
        // $model = new Brand();
        $model = Brand::find($request->id);

        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs('/public/media/brand',$image_name);
            $model->brand_image = $image_name;
        }

        // $model = Brand::find($request->id);
        $model->brand_name = $request->brand_name;
        $model->is_home = 1;
        // $model->is_home = $request->is_home;
        $model->status = 1;
        // $model->status = $request->status;
        $model->save();
        $msg = "Brand Updated";
        $request->session()->flash('message',$msg);
        return redirect('admin/brand');
    }


    public function insert(Request $request)
    {
        $request->validate([
            'brand_name'=>'required|unique:brands',
            'image'=>'required|mimes:jpg,jpeg,png',
        ]);
       
        $model = new Brand();
        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs('/public/media/brand',$image_name);
            $model->brand_image = $image_name;
        }
        
        $model->brand_name = $request->post('brand_name');
        $model->is_home = $request->post('is_home');
        $model->status = 1;
        // $model->status = $request->post('status');

        $model->save();
        $msg = "Brand Successfully Inserted";
        $request->session()->flash('message',$msg);
        return redirect('admin/brand');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function delete(Request $request,$id)
    {
        $model = Brand::find($id);
        $model->delete();
        $request->session()->flash('message','Brand Deleted');
        return redirect('admin/brand');
    }
    public function status(Request $request,$status,$id)
    {
        $model = Brand::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message','Status Changed');
        return redirect('admin/brand');
    }
    public function edit(Brand $Brand,$id)
    {
        return $id;
    }
}

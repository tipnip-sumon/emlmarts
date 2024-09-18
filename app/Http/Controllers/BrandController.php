<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ??'';
        if(isset($search)) {
            $brand = Brand::status()->where('brand_name','LIKE', "%$search%")->get(); //use local scope status()
        } else {
            //$brand = Brand::status()->get();
        }
        $data = compact('brand','search');
        return view('admin/brand')->with($data);
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
    public function manage_brand_update(BrandRequest $request)
    {
        $model = Brand::find($request->id);

        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs('/public/media/brand',$image_name);
            $model->brand_image = $image_name;
        }

        $model->brand_name = $request->brand_name;
        $model->is_home = 1;
        $model->status = 1;
        $model->save();
        $msg = "Brand Updated";
        session()->flash('message',$msg);
        return redirect('admin/brand');
    }


    public function insert(BrandRequest $request)
    {
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

        $model->save();
        $msg = "Brand Successfully Inserted";
        session()->flash('message',$msg);
        return redirect('admin/brand');
    }
    public function delete(Request $request,$id)
    {
        $model = Brand::find($id);
        $model->delete();
        session()->flash('message','Brand Deleted');
        return redirect('admin/brand');
    }
    public function status(Request $request,$status,$id)
    {
        $model = Brand::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message','Status Changed');
        return redirect('admin/brand');
    }
    public function edit(Brand $Brand,$id)
    {
        return $id;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;

class ProductController extends Controller
{
    
    public function index()
    {
        $result['category'] = DB::table('categories')->where(['status'=>1])->get();
        $result['size'] = DB::table('sizes')->where(['status'=>1])->get();
        $result['color'] = DB::table('colors')->where(['status'=>1])->get();
        $result['brand'] = DB::table('brands')->where(['is_home'=>1])->where(['status'=>1])->get();
        return view('admin/manage_products',$result);
    }
    public function product_list()
    {
        $result['data'] = Product::all();
        return view('admin/product',$result);
    }
    public function manage_products($id)
    {
        $result1['data'] = Product::find($id);
        $result = DB::table('categories')->get();
        $result2 = DB::table('products_attr')->where('products_id','=',$id)->get();
        $result3 = DB::table('sizes')->where(['status'=>1])->get();
        $result4 = DB::table('colors')->where(['status'=>1])->get();
        $result5 = DB::table('product_images')->where(['products_id'=>$id])->get();
        return view('admin/edit_products',['data'=>$result1['data'],'category'=>$result,'productsAttr'=>$result2,'sizes'=>$result3,'colors'=>$result4,'productImagesArr'=>$result5]);
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
        $pid = $model->id;
        $paidArr=$request->post('paid');
        // dd($paidArr);
        $skuArr = $request->sku;
        // $attr_imageArr = $request->attr_image;
        $mrpArr = $request->mrp;
        $priceArr = $request->price;
        $qtyArr = $request->qty;
        $size_idArr = $request->size_id;
        $color_idArr = $request->color_id;
        foreach($skuArr as $key => $val){
            $productAttrArr['products_id']=$pid;
            $productAttrArr['sku']=$skuArr[$key];
            $productAttrArr['mrp']=$mrpArr[$key];
            $productAttrArr['price']=$priceArr[$key];
            $productAttrArr['qty']=$qtyArr[$key];
            $productAttrArr['size_id']=$size_idArr[$key];
            $productAttrArr['color_id']=$color_idArr[$key];
            $productAttrArr['created_at']=now();
            $productAttrArr['updated_at']=now();

            if($request->hasFile("attr_image.$key")){
                $rand = rand('111111111','999999999');
                $attr_image = $request->file("attr_image.$key");
                $ext=$attr_image->extension();
                $image_name = $rand.'.'.$ext;
                // $image_name = time().'.'.$ext;
                $attr_image->storeAs('/public/media',$image_name);
                $productAttrArr['attr_image'] = $image_name;
            }
            $res = DB::table('products_attr')->where(['id'=>$paidArr[$key]])->exists();
            if($res){
                DB::table('products_attr')->where(['id'=>$paidArr[$key]])->update($productAttrArr);
            }else{
                DB::table('products_attr')->insert($productAttrArr);
            }
            
        }
        $piidArr=$request->post('piid');
        // dd($piidArr);
        foreach($piidArr  as $key => $val){
            $productImageArr['products_id'] = $pid;
            if($request->hasfile("images.$key")){
                $rand = rand('111111111','999999999');
                $attr_image = $request->file("images.$key");
                $ext=$attr_image->extension();
                $image_name = $rand.'.'.$ext;
                $attr_image->storeAs('/public/media',$image_name);
                $productImageArr['images'] = $image_name;
            }
            
            $res = DB::table('product_images')->where(['id'=>$piidArr[$key]])->exists();
            if($res){
                DB::table('product_images')->where(['id'=>$piidArr[$key]])->update($productImageArr);
            }else{
                DB::table('product_images')->insert($productImageArr);
            }
        }

        $msg = "Product Attributes Updated";
        session()->flash('message',$msg);
        return redirect('admin/manage_products');
    }
    public function insert(Request $request)
    
    {
        // dd($request);
        $request->validate([
            'category_id'=>'required',
            'name'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png',
            'slug'=>'required|unique:products',
            'attr_image.*' => 'required|mimes:jpg,jpeg,png',
            'images.*' => 'required|mimes:jpg,jpeg,png'

        ]);
        $model = new Product();
        if($request->hasfile('image')){
            $rand = rand('111111111','999999999');
            $image=$request->file('image');
            $ext = $image->extension();
            $image_name = $rand.'.'.$ext;
            // $image_name = time().'.'.$ext;
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
        $pid = $model->id;

        $skuArr = $request->post('sku');
        $paidArr=$request->post('paid');
        $attr_imageArr = $request->post('attr_image');
        $mrpArr = $request->post('mrp');
        $priceArr = $request->post('price');
        $qtyArr = $request->post('qty');
        $size_idArr = $request->post('size_id');
        $color_idArr = $request->post('color_id');

        foreach($skuArr as $key => $val){
            $productAttrArr['products_id']=$pid;
            $productAttrArr['sku']=$skuArr[$key];
            $productAttrArr['mrp']=$mrpArr[$key];
            $productAttrArr['price']=$priceArr[$key];
            $productAttrArr['qty']=$qtyArr[$key];
            $productAttrArr['size_id']=$size_idArr[$key];
            $productAttrArr['color_id']=$color_idArr[$key];
            $productAttrArr['created_at']=now();
            $productAttrArr['updated_at']=now();

            if($request->hasFile("attr_image.$key")){
                $rand = rand('111111111','999999999');
                $attr_image = $request->file("attr_image.$key");
                $ext=$attr_image->extension();
                $image_name = $rand.'.'.$ext;
                // $image_name = time().'.'.$ext;
                $attr_image->storeAs('/public/media',$image_name);
                $productAttrArr['attr_image'] = $image_name;
            }else{
                $productAttrArr['attr_image'] = "";
            }
            $check=DB::table('products_attr')->where('sku','=',$skuArr[$key])->where('id','!=',$paidArr[$key])->get();          
            if(isset($check[0])){
                session()->flash('sku_error',$skuArr[$key].' Sku Already Used!');
                return redirect(request()->headers->get('referer'));
            }
            DB::table('products_attr')->insert($productAttrArr);
        }
        
        $piidArr=$request->post('piid');
        foreach($piidArr  as $key => $val){
            $productImageArr['products_id'] = $pid;
            $productImageArr['created_at'] = now();
            $productImageArr['updated_at'] = now();
            if($request->hasFile("images.$key")){
                $rand = rand('111111111','999999999');
                $attr_image = $request->file("images.$key");
                $ext=$attr_image->extension();
                $image_name = $rand.'.'.$ext;
                $attr_image->storeAs('/public/media',$image_name);
                $productImageArr['images'] = $image_name;
            }
            DB::table('product_images')->insert($productImageArr);
        }
        
        
        
        $msg = "Product Information Inserted";
        session()->flash('message',$msg);
        return redirect('admin/product');
    }
    public function delete($id)
    {
        $model = Product::find($id);
        $model->delete();
        session()->flash('message','Product Deleted');
        return redirect('admin/product');
    }
    
    public function attr_delete($id,$pid)
    {
        DB::table('products_attr')->where(['id'=>$pid])->delete();
        session()->flash('message','Product Attr Deleted');
        return redirect('admin/edit_products/'.$id);
    }
    public function image_delete($id,$pid)
    {
        DB::table('product_images')->where(['id'=>$pid])->delete();
        session()->flash('message','Product Image Deleted');
        return redirect('admin/edit_products/'.$id);
    }
    public function status($status,$id)
    {
        $model = Product::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message','Status Changed');
        return redirect('admin/Product');
    }
}

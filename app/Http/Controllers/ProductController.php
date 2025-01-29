<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    public function index()
    {
        $result['category'] = DB::table('categories')->where(['status'=>1])->get();
        $result['size'] = DB::table('sizes')->where(['status'=>1])->get();
        $result['color'] = DB::table('colors')->where(['status'=>1])->get();
        $result['brand'] = DB::table('brands')->where(['is_home'=>1])->where(['status'=>1])->get();
        $result['taxes'] = DB::table('taxes')->where(['status'=>1])->get();
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
        $result6 = DB::table('taxes')->get();
        $result7 = DB::table('brands')->get();
        return view('admin/edit_products',['data'=>$result1['data'],'category'=>$result,'productsAttr'=>$result2,'sizes'=>$result3,'colors'=>$result4,'productImagesArr'=>$result5,'taxes'=>$result6,'brands'=>$result7]);
    }
    public function manage_product_update(Request $request)
    {
        $model = Product::find($request->id);
        if($request->hasfile('image')){
            // $proImg = DB::table('products')->where(['id'=>$request->id])->get();
            // if(Storage::exists('/public/media/'.$proImg[0]->image)){
            //     Storage::delete('/public/media/'.$proImg[0]->image);
            // };
            //
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
        $model->lead_time = $request->lead_time;
        $model->tax_id = $request->tax_id;
        $model->is_promo = $request->is_promo;
        $model->is_featured = $request->is_featured;
        $model->is_discounted = $request->is_discounted;
        $model->is_tranding = $request->is_tranding;
        $model->status = 1;
        $model->id = $request->post('id');
        $model->save();
        $pid = $model->id;
        $paidArr=$request->post('paid');
        $skuArr = $request->sku;
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
                // dd($paidArr[$key]);
                // $proImg = DB::table('products_attr')->where(['id'=>$paidArr[$key]])->get();
                // if($paidArr[$key]!=''){ 
                //     if(Storage::exists('/public/media/'.$proImg[0]->attr_image)){
                //         Storage::delete('/public/media/'.$proImg[0]->attr_image);
                //     };
                // }
                $rand = rand('111111111','999999999');
                $attr_image = $request->file("attr_image.$key");
                $ext=$attr_image->extension();
                $image_name = $rand.'.'.$ext;
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
        foreach($piidArr  as $key => $val){
            $productImageArr['products_id'] = $pid;
            if($request->hasfile("images.$key")){
                // dd($piidArr[$key]);
                // if($piidArr[$key]!=''){
                //     $proImg = DB::table('product_images')->where(['id'=>$piidArr[$key]])->get();
                //     if(Storage::exists('/public/media/'.$proImg[0]->images)){
                //         Storage::delete('/public/media/'.$proImg[0]->images);
                //     };
                
                    
                // }
                
                // $res = DB::table('product_images')->where(['id'=>$piidArr[$key]])->exists();
                
                
                $rand = rand('111111111','999999999');
                $attr_image = $request->file("images.$key");
                $ext=$attr_image->extension();
                $image_name = $rand.'.'.$ext;
                $request->file("images.$key")->storeAs('/public/media',$image_name);
                $productImageArr['images'] = $image_name;
                // dd($image_name);
            }
            
            // $res = DB::table('product_images')->where(['id'=>$piidArr[$key]])->exists();
            if($piidArr[$key]!=''){
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
        $model->lead_time = $request->post('lead_time');
        $model->tax_id = $request->post('tax_id');
        $model->is_promo = $request->post('is_promo');
        $model->is_featured = $request->post('is_featured');
        $model->is_discounted = $request->post('is_discounted');
        $model->is_tranding = $request->post('is_tranding');
        $model->status = 1;
        $model->save();
        $pid = $model->id;

        $skuArr = $request->post('sku');
        $paidArr=$request->post('paid');
        $mrpArr = $request->post('mrp');
        $priceArr = $request->post('price');
        $qtyArr = $request->post('qty');
        $size_idArr = $request->post('size_id');
        $color_idArr = $request->post('color_id');

        foreach($skuArr as $key => $val){
            $productAttrArr['products_id']=$pid;
            $productAttrArr['sku']=$skuArr[$key];
            $productAttrArr['mrp']= (int) $mrpArr[$key];
            $productAttrArr['price']= (int) $priceArr[$key];
            $productAttrArr['qty']= (int) $qtyArr[$key];
            $productAttrArr['size_id']=$size_idArr[$key];
            $productAttrArr['color_id']=$color_idArr[$key];
            $productAttrArr['created_at']=now();
            $productAttrArr['updated_at']=now();

            if($request->hasFile("attr_image.$key")){
                $rand = rand('111111111','999999999');
                $attr_image = $request->file("attr_image.$key");
                $ext=$attr_image->extension();
                $image_name = $rand.'.'.$ext;
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
        // $proImg = DB::table('products_attr')->where(['id'=>$pid])->get();
        // if(Storage::exists('/public/media/'.$proImg[0]->attr_image)){
        //     Storage::delete('/public/media/'.$proImg[0]->attr_image);
        // };
        DB::table('products_attr')->where(['id'=>$pid])->delete();
        session()->flash('message','Product Attr Deleted');
        return redirect('admin/edit_products/'.$id);
    }
    public function image_delete($id,$pid)
    {
        // $proImg = DB::table('product_images')->where(['id'=>$pid])->get();

        // if(Storage::exists('/public/media/'.$proImg[0]->images)){
        //     Storage::delete('/public/media/'.$proImg[0]->images);
        // };
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

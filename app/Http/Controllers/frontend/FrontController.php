<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $result['home_categories'] = 
                DB::table('categories')
                ->where(['status'=>1])
                ->where(['is_home'=>1])
                ->get();
            foreach($result['home_categories'] as $list){
                $result['home_categories_products'][$list->id]=
                        DB::table('products')
                        ->where(['status'=>1])
                        ->where(['category_id'=>$list->id])
                        ->get();
                
                foreach($result['home_categories_products'][$list->id] as $list2){
                    // $result['home_products'][$list2->id]=$list2;
                    $result['home_product_attr'][$list2->id]=
                    DB::table('products_attr')
                    ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                    ->leftJoin('colors','colors.id','=','products_attr.color_id')
                    ->where(['products_attr.products_id'=>[$list2->id]])
                    ->get();
                }
            }
            $result['home_brand'] = DB::table('brands')
                        ->where(['status'=>1])
                        ->where(['is_home'=>1])
                        ->get();
                        $result['home_featured_product'][$list->id]=
                        DB::table('products')
                        ->where(['status'=>1])
                        ->where(['is_featured'=>1])
                        ->get();
        
                foreach($result['home_featured_product'][$list->id] as $list1){
                    $result['home_featured_product_attr'][$list1->id]=
                        DB::table('products_attr')
                        ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                        ->leftJoin('colors','colors.id','=','products_attr.color_id')
                        ->where(['products_attr.products_id'=>$list1->id])
                        ->get();
                    
                }
        
                $result['home_tranding_product'][$list->id]=
                    DB::table('products')
                    ->where(['status'=>1])
                    ->where(['is_tranding'=>1])
                    ->get();
        
                foreach($result['home_tranding_product'][$list->id] as $list1){
                    $result['home_tranding_product_attr'][$list1->id]=
                        DB::table('products_attr')
                        ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                        ->leftJoin('colors','colors.id','=','products_attr.color_id')
                        ->where(['products_attr.products_id'=>$list1->id])
                        ->get();
                    
                }
        
                $result['home_discounted_product'][$list->id]=
                    DB::table('products')
                    ->where(['status'=>1])
                    ->where(['is_discounted'=>1])
                    ->get();
        
                foreach($result['home_discounted_product'][$list->id] as $list1){
                    $result['home_discounted_product_attr'][$list1->id]=
                        DB::table('products_attr')
                        ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                        ->leftJoin('colors','colors.id','=','products_attr.color_id')
                        ->where(['products_attr.products_id'=>$list1->id])
                        ->get();
                    
                }
            $result['home_banner'] = DB::table('home_banners')
                        ->where(['status'=>1])
                        ->where(['is_home'=>1])
                        ->get();
                        
        return view('frontend.index',$result);
    }
    public function product(Request $request,$slug){
        $result['product']=
            DB::table('products')
            ->where(['status'=>1])
            ->where(['slug'=>$slug])
            ->get();

        foreach($result['product'] as $list1){
            $result['product_attr'][$list1->id]=
                DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->leftJoin('colors','colors.id','=','products_attr.color_id')
                ->where(['products_attr.products_id'=>$list1->id])
                ->get();
        }

        foreach($result['product'] as $list1){
            $result['product_images'][$list1->id]=
                DB::table('product_images')
                ->where(['product_images.products_id'=>$list1->id])
                ->get();
        }
        $result['related_product']=
            DB::table('products')
            ->where(['status'=>1])
            ->where('slug','!=',$slug)
            ->where(['category_id'=>$result['product'][0]->category_id])
            ->get();
        foreach($result['related_product'] as $list1){
            $result['related_product_attr'][$list1->id]=
                DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->leftJoin('colors','colors.id','=','products_attr.color_id')
                ->where(['products_attr.products_id'=>$list1->id])
                ->get();
        }
        $result['cat_nav']=DB::table('categories')
            ->where(['status'=>1])
            ->where(['is_home'=>1])
            ->get();
       
        // prx($result);
        return view('frontend.product',$result);
    }
    public function add_to_cart(Request $request)
    {
        if($request->session()->has('FRONT_USER_LOGIN')){
            $uid = $request->session()->get('FRONT_USER_LOGIN');
            $user_type = "Reg";
        }else{
            $uid = getUserTempId();
            $user_type = "Not-Reg";
        }
        $color_id = $request->post('color_id');
        $size_id = $request->post('size_id');
        $qty = $request->post('pqty');
        $product_id = $request->post('product_id');

        $result=DB::table('products_attr')
            ->select('products_attr.id')
            ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
            ->leftJoin('colors','colors.id','=','products_attr.color_id')
            ->where(['products_id'=>$product_id])
            ->where(['sizes.size'=>$size_id])
            ->where(['colors.color'=>$color_id])
            ->get();
            $product_attr_id = $result[0]->id;

            $check = DB::table('carts')
                    ->where(['user_id'=>$uid])
                    ->where(['user_type'=>$user_type])
                    ->where(['product_id'=>$product_id])
                    ->where(['product_attr_id'=>$product_attr_id])
                    ->get();
                    // prx($check);
            if(isset($check[0]->id)){
                $update_id = $check[0]->id;
                if($qty==0){
                    DB::table('carts')
                    ->where(['id'=>$update_id])
                    ->delete();
                    $msg = "Deleted";
                }else{
                    DB::table('carts')
                    ->where(['id'=>$update_id])
                    ->update(['qty'=>$qty]);
                    $msg = "Updated";
                }
            }else{
                $id = DB::table('carts')->insertGetId([
                    'user_id'=>$uid,
                    'user_type'=>$user_type,
                    'qty'=>$qty,
                    'product_id'=>$product_id,
                    'product_attr_id'=>$product_attr_id,
                    'added_on'=>date('Y-m-d h:i:s'),
                    'created_at'=>now(),
                    'updated_at'=>Carbon::now()
                ]);
                $msg = "Added";
            }
            $result = DB::table('carts')
                    ->select('products_attr.id as attr_id','products_attr.*','products.*','carts.*','sizes.*','colors.*')
                    ->leftJoin('products_attr','products_attr.id','=','carts.product_attr_id')
                    ->leftJoin('products','products.id','=','carts.product_id')
                    ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                    ->leftJoin('colors','colors.id','=','products_attr.color_id')
                    ->where(['user_id'=>$uid])
                    ->where(['user_type'=>$user_type])
                    ->get();
            return response()->json(['msg'=>$msg,'data'=>$result,'totalItem'=>count($result)]);

        
    }
    public function cart(Request $request)
    {
        if($request->session()->has('FRONT_USER_LOGIN')){
            $uid = $request->session()->get('FRONT_USER_LOGIN');
            $user_type = "Reg";
        }else{
            $uid = getUserTempId();
            $user_type = "Not-Reg";
        }
        $result['cart'] = DB::table('carts')
                    ->select('products_attr.id as attr_id','products_attr.*','products.*','carts.*','sizes.*','colors.*')
                    ->leftJoin('products_attr','products_attr.id','=','carts.product_attr_id')
                    ->leftJoin('products','products.id','=','carts.product_id')
                    ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                    ->leftJoin('colors','colors.id','=','products_attr.color_id')
                    ->where(['user_id'=>$uid])
                    ->where(['user_type'=>$user_type])
                    ->get();
        // $result['cart_sub_total'] = DB::table('carts')
        //             ->leftJoin('products_attr','products_attr.id','=','carts.product_attr_id')
        //             ->where(['user_id'=>$uid])
        //             ->where(['user_type'=>$user_type])
        //             ->sum('products_attr.price');
                    // prx($result);
        return view('frontend.cart',$result);
    } 
    public function category($slug){
        $result['product']=
            DB::table('products')
            ->leftJoin('categories','categories.id','=','products.category_id')
            ->where(['products.status'=>1])
            ->where(['categories.category_slug'=>$slug])
            ->get();

        foreach($result['product'] as $list1){
            $result['product_attr'][$list1->id]=
                DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->leftJoin('colors','colors.id','=','products_attr.color_id')
                ->where(['products_attr.products_id'=>$list1->id])
                ->get();
        }
        // prx($result);

        // foreach($result['product'] as $list1){
        //     $result['product_images'][$list1->id]=
        //         DB::table('product_images')
        //         ->where(['product_images.products_id'=>$list1->id])
        //         ->get();
        // }
        // $result['related_product']=
        //     DB::table('products')
        //     ->where(['status'=>1])
        //     ->where('slug','!=',$slug)
        //     ->where(['category_id'=>$result['product'][0]->category_id])
        //     ->get();
        // foreach($result['related_product'] as $list1){
        //     $result['related_product_attr'][$list1->id]=
        //         DB::table('products_attr')
        //         ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
        //         ->leftJoin('colors','colors.id','=','products_attr.color_id')
        //         ->where(['products_attr.products_id'=>$list1->id])
        //         ->get();
        return view('frontend.category',$result);
    } 
}

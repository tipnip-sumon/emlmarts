<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        // prx($result);
        return view('frontend.product',$result);
    }
}

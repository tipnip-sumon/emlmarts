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
                    $result['home_products'][$list2->id]=$list2;
                }
            }
            // echo "<pre>";
            // print_r($result);
            // die();
            $result['home_brand'] = DB::table('brands')
                        ->where(['status'=>1])
                        ->where(['is_home'=>1])
                        ->get();
        return view('frontend.index',$result);
    }
}

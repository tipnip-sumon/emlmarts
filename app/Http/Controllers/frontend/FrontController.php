<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Response;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Facades\Validator;

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
                        // prx($result);
                        
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
    public function category(Request $request, $slug){
        $filter_price_start="";
        $filter_price_end="";
        $sort="";
        if($request->get('sort')!==null){
            $sort = $request->get('sort');
        }
        $query=DB::table('products');
        $query=$query->leftJoin('categories','categories.id','=','products.category_id');
        $query=$query->leftJoin('products_attr','products_attr.id','=','products.id');
        $query=$query->where(['products.status'=>1]);
        $query=$query->where(['categories.category_slug'=>$slug]);
        if($request->get('filter_price_start')!==null && $request->get('filter_price_end')!==null){
            $filter_price_start=$request->get('filter_price_start');
            $filter_price_end=$request->get('filter_price_end');
            $query=$query->whereBetween('products_attr.price',[$filter_price_start,$filter_price_end]);
        }
        $query=$query->distinct()->select('products.*');
        if(isset($sort)){
            if($sort=='name'){
                $query=$query->orderBy('products.name','asc');
            } 
        }
        if(isset($sort)){
            if($sort=='date'){
                $query=$query->orderBy('products.id','asc');
            }
        }
         if(isset($sort)){
            if($sort=='price_asc'){
                $query1=$query->orderBy('products_attr.price','asc');
            } 
        }
        if(isset($sort)){
            if($sort=='price_desc'){
                $query=$query->orderBy('products_attr.price','desc');
            } 
        }
        $query=$query->get();
        $result['filter_price_start']=$filter_price_start;
        $result['filter_price_end']=$filter_price_end;
        $result['product']=$query;
        $result['count']=count($query);

        foreach($result['product'] as $list1){
            $query1=DB::table('products_attr');
                $query1=$query1->leftJoin('sizes','sizes.id','=','products_attr.size_id');
                $query1=$query1->leftJoin('colors','colors.id','=','products_attr.color_id');
                $query1=$query1->where(['products_attr.products_id'=>$list1->id]);
                $query1=$query1->distinct()->select('products_attr.*','sizes.*','colors.*');
                $query1=$query1->get();
                $result['product_attr'][$list1->id]=$query1;
        }
        $result['left_categories_slug'] = 
                DB::table('categories')
                ->where(['status'=>1])
                ->get();
        // prx($result);
        return view('frontend.category',$result);
    } 
    public function search(Request $request,$str)
    {
        $query=DB::table('products');
        $query=$query->leftJoin('categories','categories.id','=','products.category_id');
        $query=$query->leftJoin('products_attr','products_attr.id','=','products.id');
        $query=$query->where('products.name','like',"%$str%");
        $query=$query->orWhere('products.brand','like',"%$str%");
        $query=$query->orWhere('products.model','like',"%$str%");
        $query=$query->orWhere('products.short_desc','like',"%$str%");
        $query=$query->orWhere('products.desc','like',"%$str%");
        $query=$query->orWhere('products.technical_spceification','like',"%$str%");
        $query=$query->orWhere('products.warranty','like',"%$str%");
        // $query=$query->distinct()->select('products.*');
        $query=$query->get();
        $result['product']=$query;
        $result['count']=count($query);

        foreach($result['product'] as $list1){
            $query1=DB::table('products_attr');
                $query1=$query1->leftJoin('sizes','sizes.id','=','products_attr.size_id');
                $query1=$query1->leftJoin('colors','colors.id','=','products_attr.color_id');
                $query1=$query1->where(['products_attr.products_id'=>$list1->id]);
                $query1=$query1->distinct()->select('products_attr.*','sizes.*','colors.*');
                $query1=$query1->get();
                $result['product_attr'][$list1->id]=$query1;
        }
        // prx($result);
        return view('frontend.search',$result);
    }
    public function register(){
        return view('frontend.register');
    }
    public function register_process(Request $request){
        $rand = rand(111111111,999999999);
        $valid = Validator::make($request->all(),[
            "username"=>'required|min:5',
            "email"=>'required|email|unique:users,email',
            "mobile"=>'required|unique:users,mobile',
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);
        if(!$valid->passes()){
            return response()->json(['status'=>'error','error'=>$valid->errors()->toArray()]);
        }else{
            $model = new User();
            $model->name = $request->username;
            $model->email = $request->email;
            $model->mobile = $request->mobile;
            $model->password = Hash::make($request->password);
            // $model->password = Crypt::encrypt($request->password);
            $model->status = 1;
            $model->is_verify = 0;
            $model->rand_id = $rand;
            $res = $model->save();
            
            if($res){
                $url = url('/mail');
                $data = ['name'=>$request->username,'data'=>$rand,'url'=>$url];
                $user['to'] = $request->email;
                Mail::send('mail', $data, function($message) use ($user) {
                    $message->to($user['to']);
                    $message->subject('Email ID verification');
                });
                
            }
            return response()->json(['status'=>'success','msg'=>'Registration Successfully.Please check your mail & verification.']);
        }
        
    }
    public function login(){
        return view('frontend.login');
    }
    public function login_process(Request $request){
        $result = User::where(['email'=>$request->login_email])->first();
        if($result){
            if(Hash::check($request->password, $result->password)){
                if($request->checkbox===null){
                    setcookie('login_email',$request->login_email,100);
                    setcookie('login_pwd',$request->password,100);
                }else{
                    setcookie('login_email',$request->login_email,time()+ 60*24*7);
                    setcookie('login_pwd',$request->password,time()+ 60*24*7);
                }
                $request->session()->put('FRONT_USER_LOGIN',true);
                $request->session()->put('FRONT_USER_ID',$result->id);
                $request->session()->put('FRONT_USER_NAME',$result->name);
                $status='success';
                $msg="Login Successfully";
            }else{
                $status='error';
                $msg="Incorrect Password";
            }
        }else{
            $status='error';
            $msg='Please enter your valid email';
        }
        return response()->json(['status'=>$status,'msg'=>$msg]);
            
    }
    public function email_verification(Request $request,$rand_id){
        $result = User::where(['rand_id'=>$rand_id])->get();
        if($result){
            $model = User::find($result[0]->id);
            $model->is_verify = 1;
            $model->save();
            return response()->json(['status'=>'success','msg'=>'Mail verification successfully.']);
        }
    }
}
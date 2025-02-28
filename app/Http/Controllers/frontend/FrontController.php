<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\FrontRequest;
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

    public function show(){
        return view('index');
    }
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
            $uid = $request->session()->get('FRONT_USER_ID');
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
            $uid = $request->session()->get('FRONT_USER_ID');
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
        // prx($request);
        $result = User::where(['email'=>$request->login_email])->first();
        if($result === null){
            $status='error';
            $msg='Please enter your valid email';
        }else{
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
                $getUserTempId = getUserTempId();
                DB::table('carts')
                    ->where(['user_id'=>$getUserTempId,'user_type'=>'Not-Reg'])
                    ->update(['user_id'=>$result->id,'user_type'=>'Reg']);
            }else{
                $status='error';
                $msg="Incorrect Password";
            }
        }
        return response()->json(['status'=>$status,'msg'=>$msg]);
            
    }
    public function email_verification(Request $request,$rand_id){
        $result = User::where(['rand_id'=>$rand_id])->where(['is_verify'=>'0'])->get();
        if($result  === null){
            return response()->json(['status'=>'success','msg'=>'Mail Already Verified.']);
        }else{
            $model = User::find($result[0]->id);
            $model->is_verify = true;
            $model->rand_id = '';
            $model->save();
            return response()->json(['status'=>'success','msg'=>'Mail verification successfully.']);
        }
    }
    public function forgot_process(Request $request){
        $result = User::where(['email'=>$request->forgot_email])->first();
        $rand = rand(111111111,999999999);
        if($result){
            $result->is_forgot_password = true;
            $result->rand_id = $rand;
            $res = $result->save();
            if($res){
                $url = url('/forgot_pass');
                $data = ['data'=>$rand,'url'=>$url];
                $user['to'] = $request->forgot_email;
                Mail::send('forgot_pass', $data, function($message) use ($user) {
                    $message->to($user['to']);
                    $message->subject('Forget Password');
                });
                
            }
            $status = 'success';
            $msg = 'Please Check Your Email & Set Password.';
            return response()->json(['status'=>$status,'msg'=>$msg]);
        }else{
            $status = 'error';
            $msg = 'Email Id not Registered.';
            return response()->json(['status'=>$status,'msg'=>$msg]);
        }
        
            
    }
    public function reset_password(Request $request, $id){
        $user = User::where(['rand_id'=>$id])->first();
        if($user){
            return view('frontend.reset_password')->with(['user_id'=>$user->id]);
        }else{
            return response()->json(['status'=>"error",'msg'=>'Session Expire!']);
        }
    }
    public function forgot_password_verify(Request $request){
        $valid = Validator::make($request->all(),[
            'password'=> 'required|min:6',
            'confirmation_password'=> 'required_with:password|same:password|min:6',
        ]);
            if(!$valid->passes()){
                return response()->json(['status'=>'error','error'=>$valid->errors()]);
            }else{
                $model = User::find($request->user_id);
                $model->password = bcrypt($request->password);
                $model->is_forgot_password = 0;
                $model->rand_id = '';
                $model->save();
                return response()->json(['status'=>'success','msg'=>'Password Reset successfully.']);
            }
        }
        public function checkout(Request $request){
            $result['cart_data'] = getAddToCartTotalItem();
            // prx($result);
            if(isset($result['cart_data'][0])){
                if($request->session()->has('FRONT_USER_LOGIN')){
                    $uid = $request->session()->get('FRONT_USER_ID');
                    $user_type = "Reg";
                }else{
                    $uid = getUserTempId();
                    $user_type = "Not-Reg";
                }
                $user_info = DB::table('users')->where(['id'=>$uid])->get();
                $result['user_info']['name'] = $user_info[0]->name;
                $result['user_info']['email'] = $user_info[0]->email;
                $result['user_info']['mobile'] = $user_info[0]->mobile;
                $result['user_info']['address'] = $user_info[0]->address;
                $result['user_info']['city'] = $user_info[0]->city;
                $result['user_info']['country'] = $user_info[0]->country;
                $result['user_info']['zip'] = $user_info[0]->zip;
                $result['user_info']['company'] = $user_info[0]->company;
                return view('frontend.checkout', $result);
            }else{
                return redirect('/');
            }
            
        }
        public function apply_coupon_code(Request $request){
            $result = Coupon::where('code',$request->coupon_code)->first();
            // prx($result);
            if(!is_null($result)){
                $type = $result->type;
                $value = $result->value;
                if($result->status == 1){
                    if($result->is_one_time == 1){
                        $status = 'error';
                        $msg = 'Coupon Code Already Used!';
                    }else{
                        $total_price = getAddToCartTotalItem();
                        $cart_price = 0;
                        foreach($total_price as $item){
                            $cart_price += $item->price*($item->qty);
                        }
                        $min_order_amt = $result->min_order_amt;
                        if( $cart_price < $min_order_amt){
                            $status = "error";
                            $msg = "You have must be purchase order minimum $min_order_amt";
                        }else{
                            $status = "success";
                            $msg = "Coupon Applied!";
                        }
                    }
                }else{
                    $status = "error";
                    $msg = "Coupon Code Deactivated!";
                }
                    
            }else{
                $status = "error";
                $msg = "Invalid Coupon Code!";
            }
            if( $status == "success"){
                if($type == 'value'){
                    $cart_price_tl = $cart_price - $value;
                    $coupon_price = round($value);
                }
                if($type == 'per'){
                    $cart_price_tl = round($cart_price - ($cart_price*$value)/100);
                    $coupon_price = round($cart_price*$value/100);
                }
            }else{
                $cart_price_tl = 0;
                $coupon_price = 0;
            }
            return response()->json(["status"=> $status,"msg"=> $msg,"cart_price"=>$cart_price_tl,"coupon_price"=>$coupon_price]);
        }
}
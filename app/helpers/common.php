<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
function prx($arr){
    echo "<pre>";
    print_r($arr);
    die();
}
function current_url(){
    $url = URL::full();
    return $url;
}

   function getTopNavCat(){
    $result=DB::table('categories')
            ->where(['status'=>1])
            ->where(['is_home'=>1])
            ->get();
    $arr=[];
    foreach($result as $row){
        // $arr[$row->id]['category_name']=$row->category_name;
        // $arr[$row->id]['category_slug']=$row->category_slug;
        // $arr[$row->id]['category_image']=$row->category_image;
        $arr[]=$row;
    }
    // $str = buildTreeView($arr,0);
    return $arr;
    // return $result;
    }
    
// $html='';
// function buildTreeView($arr,$parent,$level = 0, $prelevel = -1){
//     global $html;
//     foreach($arr as $id => $data){
//         if($parent==$data['parent_category_id']){
//             if($level>$prelevel) {
//                 if($html==''){
// 					$html.=$data['category_name'];
//                 }else{
//                     $html.=$data['category_name'];
//                 }
//             }
//             if($level==$prelevel) {
//                 $html.= '</li>';
//             }
//             $html.='<li class="sub-menu">'.$data['category_name'];
//             if($level>$prelevel) {
//                 $prelevel = $level;
//             }
//             $level++;
//             buildTreeView($arr,$id,$level,$prelevel);
//             $level--;
//         }
//     }
//     if($level==$prelevel) {
//         // $html.='</a>';
//     }
//     return $html;
// }
function getUserTempId(){
    if(session()->get('USER_TEMP_ID')===null){
        $rand=rand(111111111,999999999);
        session()->put('USER_TEMP_ID',$rand);
        return $rand;
    }else{
        return session()->has('USER_TEMP_ID');
    }
}
function getAddToCartTotalItem(){
    if(session()->has('FRONT_USER_LOGIN')){
        $uid = session()->get('FRONT_USER_LOGIN');
        $user_type = "Reg";
    }else{
        $uid = getUserTempId();
        $user_type = "Not-Reg";
    }
    // $result = DB::table('carts')
    //     ->where(['user_id'=>$uid])
    //     ->where(['user_type'=>$user_type])
    //     ->get();
    $result = DB::table('carts')
        ->select('products_attr.id as attr_id','products_attr.*','products.*','carts.*','sizes.*','colors.*')
        ->leftJoin('products_attr','products_attr.id','=','carts.product_attr_id')
        ->leftJoin('products','products.id','=','carts.product_id')
        ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
        ->leftJoin('colors','colors.id','=','products_attr.color_id')
        ->where(['user_id'=>$uid])
        ->where(['user_type'=>$user_type])
        ->get();
        return $result;
}
?>
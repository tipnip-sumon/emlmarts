<?php

use Illuminate\Support\Facades\DB;
function prx($arr){
    echo "<pre>";
    print_r($arr);
    die();
}

   function getTopNavCat(){
    $result=DB::table('categories')
            ->where(['is_home'=>1])
            ->where(['status'=>1])
            ->get();
    $arr=[];
    foreach($result as $row){
        $arr[$row->id]['category_name']=$row->category_name;
        $arr[$row->id]['parent_category_id']=$row->parent_category_id;
        $arr[$row->id]['category_image']=$row->category_image;
    }
    $str = buildTreeView($arr,0);
    return $str;
    }
    
$html='';
function buildTreeView($arr,$parent,$level = 0, $prelevel = -1){
    global $html;
    foreach($arr as $id => $data){
        if($parent==$data['parent_category_id']){
            if($level>$prelevel) {
                if($html==''){
					$html.=$data['category_name'];
                }else{
                    $html.=$data['category_name'];
                }
            }
            if($level==$prelevel) {
                $html.= '</li>';
            }
            $html.='<li class="sub-menu">'.$data['category_name'];
            if($level>$prelevel) {
                $prelevel = $level;
            }
            $level++;
            buildTreeView($arr,$id,$level,$prelevel);
            $level--;
        }
    }
    if($level==$prelevel) {
        // $html.='</a>';
    }
    return $html;
}
?>
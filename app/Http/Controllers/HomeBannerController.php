<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeBannerController extends Controller
{
    public function index()
    {
        $result['data'] = HomeBanner::all();
        return view('admin/homebanner',$result);
    }
    public function banner_list()
    {
        return view('admin/banner-list');
    }
    public function manage_banner($id)
    {
    
        $result['data'] = HomeBanner::find($id);
        return view('admin/manage_banner',$result);
        
    }
    public function manage_homebanner_update(Request $request)
    {
        $model = HomeBanner::find($request->id);
        if($request->hasfile('image')){
            $proImg = DB::table('home_banners')->where(['id'=>$request->id])->get();
            if(Storage::exists('/public/media/banner/'.$proImg[0]->image)){
                Storage::delete('/public/media/banner/'.$proImg[0]->image);
            };
            $image=$request->file('image');
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs('/public/media/banner/',$image_name);
            $model->image = $image_name;
        }
        $model->btn_txt = $request->btn_txt;
        $model->btn_link = $request->btn_link;
        $model->is_home = $request->is_home;
        $model->status=$request->status;
        $model->save();
        $msg = "Banner Updated";
        session()->flash('message',$msg);
        return redirect('admin/homebanner');
    }


    public function insert_banner(Request $request)
    {
        $request->validate([
            'image'=>'required|mimes:jpg,jpeg,png',
        ]);
       
        $model = new HomeBanner();
        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs('/public/media/banner/',$image_name);
            $model->image = $image_name;
        }
        
        $model->btn_txt = $request->post('btn_txt');
        $model->btn_link = $request->post('btn_link');
        $model->is_home = $request->post('is_home');

        $model->save();
        $msg = "Banner Inserted";
        session()->flash('message',$msg);
        return redirect('admin/homebanner');
    }
    public function delete($id)
    {
        $model = HomeBanner::find($id);
        $proImg = DB::table('home_banners')->where(['id'=>$id])->get();
        if(Storage::exists('/public/media/banner/'.$proImg[0]->image)){
            Storage::delete('/public/media/banner/'.$proImg[0]->image);
        };
        $model->delete();
        session()->flash('message','Banner Deleted');
        return redirect('admin/homebanner');
    }
    public function status($status,$id)
    {
        $model = HomeBanner::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message','Status Changed');
        return redirect('admin/homebanner');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // $category = Category::findOrFail([3,4,5,6],['category_name','category_slug']);
        //$category = Category::count(); // 9
        //$category = Category::max('created_at');
        // $category = Category::min('created_at');
        // $category = Carbon::today()->toDateString();
        //$category = Category::first();
        //return $category;



        $search = $request['search'] ??'';
        if(isset($search) && strlen(trim($search)) > 3) {
            $category = Category::where('category_name','like','%'.$search.'%')
                        ->orWhere('category_description','like','%'.$search.'%')
                        ->orWhere('category_slug','like','%'.$search.'%')
                        ->get();
        }else{
            $category = Category::all();
        }
        $data = compact('search','category');
        return view('admin/category')->with($data);
    }
    public function product_list()
    {
        return view('admin/products-list');
    }
    public function manage_category($id)
    {
    
        $result['data'] = Category::find($id);
        $result['category'] = DB::table('categories')->where(['status'=>1])->where('id','!=',$id)->get();
        return view('admin/manage_category',$result);
        
    }
    public function manage_category_update(Request $request)
    {
        $model = Category::find($request->id);
        $model->category_name = $request->category_name;
        $model->category_description = $request->category_description;
        $model->category_slug = $request->category_slug;
        $model->parent_category_id = $request->parent_category_id;
        $model->category_order = $request->category_order;
        $model->is_home = $request->is_home;
        $model->status=$request->status;
        $model->save();
        $msg = "Category Updated";
        session()->flash('message',$msg);
        return redirect('admin/category');
    }


    public function insert(CategoryRequest $request)
    {
        //dd($request);
        $model = new Category();
        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs('/public/media/category',$image_name);
            $model->category_image = $image_name;
        }
        
        $model->category_name = $request->post('category_name');
        $model->category_description = $request->post('category_description');
        $model->category_slug = $request->post('category_slug');
        $model->parent_category_id = $request->post('parent_category_id');
        $model->category_order = $request->post('category_order');
        $model->is_home = $request->post('is_home');
        // $model->status = $request->post('status');
        $model->status = 1;

        $model->save();
        $msg = "Category Inserted";
        session()->flash('message',$msg);
        return redirect('admin/category');
    }
    public function delete(Request $request,$id)
    {
        $model = Category::find($id);
        $model->delete();
        session()->flash('message','Category Deleted');
        return redirect('admin/category');
    }
    public function status(Request $request,$status,$id)
    {
        $model = Category::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message','Status Changed');
        return redirect('admin/category');
    }
}

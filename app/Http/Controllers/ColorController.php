<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Requests\ColorRequest;

class ColorController extends Controller
{
   
    public function index()
    {
        
        $result['data'] = Color::paginate(4);
        return view('admin/color',$result);
    }
    public function Color_list()
    {
        $result['data'] = Color::paginate(4);
        return view('admin/color-list',$result);
    }
    public function manage_Color($id)
    {
    
        $result['data'] = Color::find($id);
        return view('admin/manage_color',$result['data']);
        
    }
    public function manage_color_update(ColorRequest $request)
    {
        
        $model = Color::find($request->id);
        $model->color = $request->color;
        $model->id = $request->post('id');
        $model->save();
        $msg = "Color Updated";
        session()->flash('message',$msg);
        return redirect('admin/color');
    }


    public function insert(Request $request)
    {
        $request->validate([
            'color'=>'required|unique:colors'
        ]);
       
        $model = new Color();
        
        $model->color = $request->post('color');
        $model->status = 1;
        $model->save();
        $msg = "Color Inserted";
        session()->flash('message',$msg);
        return redirect('admin/color');
    }
    public function delete(Request $request,$id)
    {
        $model = Color::find($id);
        $model->delete();
        session()->flash('message','Color Deleted');
        return redirect('admin/color');
    }
    public function status(Request $request,$status,$id)
    {
        $model = Color::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message','Status Changed');
        return redirect('admin/color');
    }
    public function status_list(Request $request,$status,$id)
    {
        $model = Color::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message','Status Changed');
        return redirect('admin/color-list');
    }
}

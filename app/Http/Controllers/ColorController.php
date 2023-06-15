<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $result['data'] = Color::paginate(4);
        return view('admin/color',$result);
    }
    public function Color_list()
    {
        //
        $result['data'] = Color::paginate(4);
        //$data = Color::paginate(2);
        return view('admin/color-list',$result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function manage_Color($id)
    {
    
        $result['data'] = Color::find($id);
        return view('admin/manage_color',$result['data']);
        
    }
    public function manage_color_update(Request $request)
    {
        $request->validate([
            'color'=>'unique:colors,color'
        ]);

        $model = Color::find($request->id);
        $model->color = $request->color;
        $model->id = $request->post('id');
        $model->save();
        $msg = "Color Updated";
        $request->session()->flash('message',$msg);
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
        $request->session()->flash('message',$msg);
        return redirect('admin/color');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function delete(Request $request,$id)
    {
        $model = Color::find($id);
        $model->delete();
        $request->session()->flash('message','Color Deleted');
        return redirect('admin/color');
    }
    public function status(Request $request,$status,$id)
    {
        $model = Color::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message','Status Changed');
        return redirect('admin/color');
    }
    public function status_list(Request $request,$status,$id)
    {
        $model = Color::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message','Status Changed');
        return redirect('admin/color-list');
    }
    public function edit(Color $request,$id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $Color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $request)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $result['data'] = Size::paginate(4);
        return view('admin/size',$result);
    }
    public function Size_list()
    {
        //
        $result['data'] = Size::paginate(4);
        //$data = Size::paginate(2);
        return view('admin/size-list',$result);
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
    public function manage_size($id)
    {
    
        $result['data'] = Size::find($id);
        return view('admin/manage_size',$result['data']);
        
    }
    public function manage_size_update(Request $request)
    {
        $request->validate([
            'size'=>'unique:sizes,size'
        ]);

        $model = Size::find($request->id);
        $model->size = $request->size;
        $model->id = $request->post('id');
        $model->save();
        $msg = "Size Updated";
        $request->session()->flash('message',$msg);
        return redirect('admin/size');
    }


    public function insert(Request $request)
    {
        $request->validate([
            'size'=>'required'
        ]);
       
        $model = new Size();
        
        $model->size = $request->post('size');
        $model->status = 1;
        $model->save();
        $msg = "Size Inserted";
        $request->session()->flash('message',$msg);
        return redirect('admin/size');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function delete(Request $request,$id)
    {
        $model = Size::find($id);
        $model->delete();
        $request->session()->flash('message','Size Deleted');
        return redirect('admin/size');
    }
    public function status(Request $request,$status,$id)
    {
        $model = Size::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message','Status Changed');
        return redirect('admin/size');
    }
    public function status_list(Request $request,$status,$id)
    {
        $model = Size::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message','Status Changed');
        return redirect('admin/size-list');
    }
    public function edit(Size $request,$id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $Size)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $request)
    {
        //
    }
}

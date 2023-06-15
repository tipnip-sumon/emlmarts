<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $result['data'] = Coupon::paginate(2);
        return view('admin/coupon',$result);
    }
    public function coupon_list()
    {
        //
        $result['data'] = Coupon::paginate(2);
        //$data = Coupon::paginate(2);
        return view('admin/coupon-list',$result);
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
    public function manage_coupon($id)
    {
    
        $result['data'] = Coupon::find($id);
        return view('admin/manage_coupon',$result['data']);
        
    }
    public function manage_coupon_update(Request $request)
    {
        $request->validate([
            'code'=>'unique:coupons,code'
        ]);

        $model = Coupon::find($request->id);
        $model->title = $request->title;
        $model->code = $request->code;
        $model->value = $request->value;
        $model->id = $request->post('id');
        $model->save();
        $msg = "Coupon Updated";
        $request->session()->flash('message',$msg);
        return redirect('admin/coupon');
    }


    public function insert(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'code'=>'required|unique:coupons,code' .$request->post('id'),
            'value'=>'required',
        ]);
       
        $model = new Coupon();
        
        $model->title = $request->post('title');
        $model->code = $request->post('code');
        $model->value = $request->post('value');
        $model->status = 1;
        $model->save();
        $msg = "Coupon Inserted";
        $request->session()->flash('message',$msg);
        return redirect('admin/coupon');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function delete(Request $request,$id)
    {
        $model = Coupon::find($id);
        $model->delete();
        $request->session()->flash('message','Coupon Deleted');
        return redirect('admin/coupon');
    }
    public function status(Request $request,$status,$id)
    {
        $model = Coupon::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message','Status Changed');
        return redirect('admin/coupon');
    }
    public function edit(Coupon $request,$id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $request)
    {
        //
    }
}

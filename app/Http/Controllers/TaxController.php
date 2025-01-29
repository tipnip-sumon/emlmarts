<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index()
    {
        $result['data'] = Tax::paginate(4);
        return view('admin/tax',$result);
    }
    public function tax_list()
    {
        $result['data'] = Tax::paginate(4);
        return view('admin/tax-list',$result);
    }
    public function manage_tax($id)
    {
    
        $result['data'] = Tax::find($id);
        return view('admin/manage_tax',$result['data']);
        
    }
    public function manage_tax_update(Request $request)
    {
        $request->validate([
            'tax_value'=>'exists:taxes,tax_value|numeric'
        ]);

        $model = Tax::find($request->id);
        $model->tax_desc = $request->tax_desc;
        $model->tax_value = $request->tax_value;
        $model->status = $request->status;
        // $model->id = $request->post('id');
        $model->save();
        $msg = "Tax Updated";
        session()->flash('message',$msg);
        return redirect('admin/tax');
    }


    public function insert_tax(Request $request)
    {
        // dd($request);
        $request->validate([
            'tax_desc'=>'required|unique:taxes,tax_desc',
            'tax_value'=>'required|unique:taxes,tax_value|numeric'
        ],
        [
        'tax_desc.required'=>'The Tax Description field is required.',
        'tax_value.required'=>'The Tax Value field is required.'
        ]);
       
        $model = new Tax();
        
        $model->tax_desc = $request->post('tax_desc');
        $model->tax_value = $request->post('tax_value');
        // $model->status = 1;
        $model->save();
        $msg = "Tax Inserted";
        session()->flash('message',$msg);
        return redirect('admin/tax');
    }
    public function delete(Request $request,$id)
    {
        $model = Tax::find($id);
        $model->delete();
        session()->flash('message','Tax Deleted');
        return redirect('admin/tax');
    }
    public function status_tax(Request $request,$status,$id)
    {
        $model = Tax::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message','Status Changed');
        return redirect('admin/tax');
    }
    public function status_list(Request $request,$status,$id)
    {
        $model = Tax::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message','Status Changed');
        return redirect('admin/tax-list');
    }
}

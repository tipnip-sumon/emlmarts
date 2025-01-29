<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $result['data'] = User::paginate(2);
        return view('admin/user',$result);
    }
    public function show()
    {
        $result['data'] = User::paginate(2);
        return view('admin/user',$result);
    }
    public function status($status,$id)
    {
        $model = User::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message','Status Changed');
        return redirect('admin/user');
    }
}

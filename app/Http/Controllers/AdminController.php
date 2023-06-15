<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(session()->has('ADMIN_LOGIN')){
            return view('admin/dashboard');
        }else{
        return view('admin/login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
   
    public function store(Request $request)
    {
        //
    }
    public function auth(Request $request)
    {
        $email=$request->post('email');
        $password=$request->post('password');

        //$result = Admin::where(['email'=>$email,'password'=>$password])->get();
        $result = Admin::where(['email'=>$email])->first();

        if($result){
            if(Hash::check($request->post('password'),$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/dashboard');
            }else{
                $request->session()->flash('errors','Please Correct Password');
                return redirect('admin');
            }
           
        }else{
            $request->session()->flash('errors','Please Correct Login Details');
            return redirect('admin');
        }

    }
    public function dashboard()
    {
        return view('admin/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
    public function passwordupdate(){
        $res = Admin::find(1);
        $res->password = Hash::make('123456');
        $res->save();
    }
}

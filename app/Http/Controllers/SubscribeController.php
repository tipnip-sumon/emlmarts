<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'email|unique:subscribes|min:6|max:64'
        ],['email.unique'=>"You'r already Subscribed"]
    );
        $model = new Subscribe();
        $model->email = $request->email;
        $model->save();
        session()->flash('message','Subscribed');
        return redirect()->back();
    }
}

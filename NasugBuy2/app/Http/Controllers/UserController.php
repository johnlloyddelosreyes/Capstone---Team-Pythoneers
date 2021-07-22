<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.user.index');
    }
    public function edit($id){
        $user = User::find($id);
        return view('pages.user.edit',compact('user'));
    }
    public function update(Request $request){
        $data = $request->all();

        $request -> validate([
            'name' => 'required',
            'storename' => 'required',
            'storeaddress' => 'required',
            'contact' => 'required',
            'email' => 'required'
        ]);

        Auth::user()->update($data);

        return redirect()->back()->with(['message'=>'Update Successful']);
    }

}

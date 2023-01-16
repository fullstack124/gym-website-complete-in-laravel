<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(){
        $users=User::all();
        return view('admin.users.list-user',compact('users'));
    }
    public function create(){
        return view('admin.users.add-user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' =>'required',
            'email' =>'required|email|unique:users',
            'phone_number' =>'required',
            'gender' =>'required',
            'address' =>'required',
            'city' =>'required',
            'country' =>'required',
            'password' =>'required',
            'pincode' =>'required',
            'image' =>'required',
        ]);

        $user=new User();
        $filename="";
        if($request->file('image')){
            $filename=$request->file('image')->store('users','public');
        }
        dd($filename);
        $user->username=$request->username;
         $user->email=$request->email;
         $user->phone_number=$request->phone_number;
         $user->gender=$request->gender;
         $user->address=$request->address;
         $user->city=$request->city;
         $user->country=$request->country;
         $user->password=Hash::make($request->password);
         $user->pincode=$request->pincode;
         $user->image=$filename;
         $result=$user->save();
         if($result){
            return redirect(route('admin.user'));
         }else{
            return redirect(route('admin.user.add'));
         }
    }

    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('admin.users.update-user',compact('user'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'username' =>'required',
            'email' =>'required|email',
            'phone_number' =>'required',
            'gender' =>'required',
            'address' =>'required',
            'city' =>'required',
            'country' =>'required',
            'pincode' =>'required',
        ]);

        $user=User::findOrFail($id);
        $filename="";
        if($request->file('image')){
            $filename=$request->file('image')->store('users','public');
        }
        $user->username=$request->username;
         $user->email=$request->email;
         $user->phone_number=$request->phone_number;
         $user->gender=$request->gender;
         $user->address=$request->address;
         $user->city=$request->city;
         $user->country=$request->country;
         $user->password=Hash::make($request->password);
         $user->pincode=$request->pincode;
         $user->image=$filename;
         $result=$user->save();
         if($result){
            return redirect(route('admin.user'));
         }else{
            return redirect(route('admin.user.update',['id'=>$id]));
         }
    }

    public function delete($id)
    {
        $user=User::findOrFail($id)->delete();
      return redirect(route('admin.user'));
    }
}

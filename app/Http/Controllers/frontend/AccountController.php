<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $data=Auth::user();
        return view('frontend.pages.account',compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' =>'required',
                'phone' =>'required',
                'province' =>'required',
                'district' =>'required',
                'address' =>'required',
                'postcode' =>'required',

            ]
        );
        $user = User::where('id', $id)->update(
            [
                'name'=>$request->name,
                'phone'=>$request->phone,
                'province'=>$request->province,
                'district'=>$request->district,
                'address'=>$request->address,
                'postcode'=>$request->postcode,

            ]
        );
        if ($user) {
            return back()->with('success', 'Address ekleme işlemi başarılı');
        }
        return back()->with('error', 'Address ekleme işlemi başarısız');
    }

   public function store (Request $request, $id)
    {
        $request->validate(
            [
                'name' =>'required',
                'email' =>'required',
                'password' =>'required|string|min:8|confirmed',
                'password2' =>'required',
            ]

        );

        if($request->password=$request->password2){
            $password=$request->password;
        }
        else{

        }
        $user = User::where('id', $id)->update(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($password),
            ]
        );
        if ($user) {
            return back()->with('success', 'Address ekleme işlemi başarılı');
        }
        return back()->with('error', 'Address ekleme işlemi başarısız');
    }

}

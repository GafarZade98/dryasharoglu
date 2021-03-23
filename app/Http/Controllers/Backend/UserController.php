<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use function PHPUnit\Framework\fileExists;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        veri cekme islemi databaseden data ya verini cekirik ordan isledirik
//        burdaki users yarattigimiz modelin adidi | yuxarda model eklemeyi unutma

        $data['user'] = User::all()->sortBy('user_must');
        return view('backend.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//slug yapma islem| eger gelen slug 3 herfden boyukduse girilen slug slug olsun girilen slug yoxdusa title slug olsun

        $request->validate(
            [
                'name' =>'required',
                'email' =>'required|email',
                'password' =>'required|Min:6',

            ]
        );
//file yukleme
        if ($request->hasFile('user_file')){

            $request->validate(
                [

                    'user_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
                ]
            );

            $file_name=uniqid().'.'.$request->user_file->getClientOriginalExtension();
            $request->user_file->move(public_path('images/user'),$file_name);
        }
        else{
            $file_name=null;
        }


        $user=User::insert(
            [
                'name'=>$request->name,
                'user_file'=>$file_name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'role'=>$request->role,
            ]
        );
        if ($user) {
            return redirect(route('user.index'))->with('success', 'User ekleme işlemi başarılı');
        }
            return back()->with('error', 'User ekleme işlemi başarısız');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users=User::where('id',$id)->firstOrFail();
        return view('backend.user.edit')->with('users',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

//file yukleme


        if (strlen($request->password) > 0) {

            if ($request->hasFile('user_file')) {

                $request->validate(
                    [
                        'name' =>'required',
                        'email' =>'required|email',
                        'password' =>'Min:6',

                    ]
                );

                $request->validate(
                    [

                        'user_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
                    ]
                );

                $file_name = uniqid() . '.' . $request->user_file->getClientOriginalExtension();
                $request->user_file->move(public_path('images/user'), $file_name);


                $user = User::where('id', $id)->update(
                    [
                        'name'=>$request->name,
                        'user_file'=>$file_name,
                        'email'=>$request->email,
                        'password'=>Hash::make($request->password),
                        'role'=>$request->role,
                    ]
                );
                $path = 'images/user/' . $request->old_file;
                if (file_exists($path)) {
                    @unlink((public_path($path)));
                }

            } else {
                $user = User::where('id', $id)->update(
                    [
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'password'=>Hash::make($request->password),
                        'role'=>$request->role,
                    ]
                );
            }

        } else {

            if ($request->hasFile('user_file')) {
                $request->validate(
                    [
                        'name' =>'required',
                        'email' =>'required|email',


                    ]
                );
                $request->validate(
                    [

                        'user_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
                    ]
                );

                $file_name = uniqid() . '.' . $request->user_file->getClientOriginalExtension();
                $request->user_file->move(public_path('images/user'), $file_name);


                $user = User::where('id', $id)->update(
                    [
                        'name'=>$request->name,
                        'user_file'=>$file_name,
                        'email'=>$request->email,

                        'role'=>$request->role,
                    ]
                );
                $path = 'images/user/' . $request->old_file;
                if (file_exists($path)) {
                    @unlink((public_path($path)));
                }

            } else {
                $user = User::where('id', $id)->update(
                    [
                        'name'=>$request->name,
                        'email'=>$request->email,

                        'role'=>$request->role,
                    ]
                );
            }

        }
















//
//        if ($request->hasFile('user_file')) {
//
//            $request->validate(
//                [
//
//                    'user_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
//                ]
//            );
//
//            $file_name = uniqid() . '.' . $request->user_file->getClientOriginalExtension();
//            $request->user_file->move(public_path('images/user'), $file_name);
//
//
//            $user = User::where('id', $id)->update(
//                [
//                    'name'=>$request->name,
//                    'user_file'=>$file_name,
//                    'email'=>$request->email,
//                    'password'=>Hash::make($request->password),
//                    'role'=>$request->role,
//                ]
//            );
//            $path = 'images/user/' . $request->old_file;
//            if (file_exists($path)) {
//                @unlink((public_path($path)));
//            }
//
//        } else {
//            $user = User::where('id', $id)->update(
//                [
//                    'name'=>$request->name,
//                    'email'=>$request->email,
//                    'password'=>Hash::make($request->password),
//                    'role'=>$request->role,
//                ]
//            );
//        }



        if ($user) {
            return back()->with('success', 'User ekleme işlemi başarılı');
        }
        return back()->with('error', 'User ekleme işlemi başarısız');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find(intval($id));
        if ($user->delete())
        {
            echo 1;
        }
        echo 0;
    }


    public function sortable()
    {


        foreach ($_POST['item'] as $key => $value) {
            $users = User::find(intval($value));
            $users->user_must = intval($key);
            $users->save();
        }

        echo true;
    }
}

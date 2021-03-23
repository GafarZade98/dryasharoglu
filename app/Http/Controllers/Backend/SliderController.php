<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Str;
use function PHPUnit\Framework\fileExists;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        veri cekme islemi databaseden data ya verini cekirik ordan isledirik
//        burdaki sliders yarattigimiz modelin adidi | yuxarda model eklemeyi unutma

        $data['slider'] = Slider::all()->sortBy('slider_must');
        return view('backend.slider.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.slider.create');
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
        if (strlen($request->slider_slug) > 3) {
            $slug = Str::slug($request->slider_slug);
        } else {
            $slug = Str::slug($request->slider_title);
        }
        $request->validate(
            [
                'slider_title' =>'required',
                'slider_content' =>'required',
                'slider_url' =>'required|url',

            ]
        );
//file yukleme
        if ($request->hasFile('slider_file')){

            $request->validate(
                [

                    'slider_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
                ]
            );

            $file_name=uniqid().'.'.$request->slider_file->getClientOriginalExtension();
            $request->slider_file->move(public_path('images/slider'),$file_name);
        }
        else{
            $file_name=null;
        }


        $slider=Slider::insert(
            [
                'slider_title'=>$request->slider_title,
                'slider_slug'=>$slug,
                'slider_file'=>$file_name,
                'slider_content'=>$request->slider_content,
                'slider_url'=>$request->slider_url,
                'slider_must'=>null,
                'slider_status'=>$request->slider_status,
            ]
        );
        if ($slider) {
            return redirect(route('slider.index'))->with('success', 'Slider ekleme işlemi başarılı');
        }
            return back()->with('error', 'Slider ekleme işlemi başarısız');

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
        $sliders=Slider::where('id',$id)->firstOrFail();
        return view('backend.slider.edit')->with('sliders',$sliders);
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
        if (strlen($request->slider_slug) > 3) {
            $slug = Str::slug($request->slider_slug);
        } else {
            $slug = Str::slug($request->slider_title);
        }
        $request->validate(
            [
                'slider_title' =>'required',
                'slider_content' =>'required',
                'slider_url' =>'required|url',

            ]
        );
//file yukleme
        if ($request->hasFile('slider_file')) {

            $request->validate(
                [

                    'slider_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
                ]
            );

            $file_name = uniqid() . '.' . $request->slider_file->getClientOriginalExtension();
            $request->slider_file->move(public_path('images/slider'), $file_name);


            $slider = Slider::where('id', $id)->update(
                [
                    'slider_title' => $request->slider_title,
                    'slider_slug' => $slug,
                    'slider_file' => $file_name,
                    'slider_content' => $request->slider_content,
                    'slider_url' => $request->slider_url,
                    'slider_must' => null,
                    'slider_status' => $request->slider_status,
                ]
            );
            $path = 'images/slider/' . $request->old_file;
            if (file_exists($path)) {
                @unlink((public_path($path)));
            }

        } else {
            $slider = Slider::where('id', $id)->update(
                [
                    'slider_title' => $request->slider_title,
                    'slider_slug' => $slug,
                    'slider_content' => $request->slider_content,
                    'slider_url' => $request->slider_url,
                    'slider_must' => null,
                    'slider_status' => $request->slider_status,
                ]
            );
        }



        if ($slider) {
            return back()->with('success', 'Slider ekleme işlemi başarılı');
        }
        return back()->with('error', 'Slider ekleme işlemi başarısız');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider=Slider::find(intval($id));
        if ($slider->delete())
        {
            echo 1;
        }
        echo 0;
    }


    public function sortable()
    {


        foreach ($_POST['item'] as $key => $value) {
            $sliders = Slider::find(intval($value));
            $sliders->slider_must = intval($key);
            $sliders->save();
        }

        echo true;
    }
}

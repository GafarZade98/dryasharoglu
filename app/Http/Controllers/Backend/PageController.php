<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;
use Illuminate\Support\Str;
use function PHPUnit\Framework\fileExists;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        veri cekme islemi databaseden data ya verini cekirik ordan isledirik
//        burdaki pages yarattigimiz modelin adidi | yuxarda model eklemeyi unutma

        $data['page'] = Pages::all()->sortBy('page_must');
        return view('backend.page.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.page.create');
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
        if (strlen($request->page_slug) > 3) {
            $slug = Str::slug($request->page_slug);
        } else {
            $slug = Str::slug($request->page_title);
        }
//file yukleme
        if ($request->hasFile('page_file')){

            $request->validate(
                [
                    'page_title' =>'required',
                    'page_content' =>'required',
                    'page_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
                ]
            );

            $file_name=uniqid().'.'.$request->page_file->getClientOriginalExtension();
            $request->page_file->move(public_path('images/page'),$file_name);
        }
        else{
            $file_name=null;
        }


        $page=Pages::insert(
            [
                'page_title'=>$request->page_title,
                'page_slug'=>$slug,
                'page_file'=>$file_name,
                'page_content'=>$request->page_content,
                'page_must'=>null,
                'page_status'=>$request->page_status,
            ]
        );
        if ($page) {
            return redirect(route('page.index'))->with('success', 'Page ekleme işlemi başarılı');
        }
            return back()->with('error', 'Page ekleme işlemi başarısız');

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
        $pages=Pages::where('id',$id)->firstOrFail();
        return view('backend.page.edit')->with('pages',$pages);
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
        if (strlen($request->page_slug) > 3) {
            $slug = Str::slug($request->page_slug);
        } else {
            $slug = Str::slug($request->page_title);
        }
//file yukleme
        if ($request->hasFile('page_file')) {

            $request->validate(
                [
                    'page_title' => 'required',
                    'page_content' => 'required',
                    'page_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
                ]
            );

            $file_name = uniqid() . '.' . $request->page_file->getClientOriginalExtension();
            $request->page_file->move(public_path('images/page'), $file_name);


            $page = Pages::where('id', $id)->update(
                [
                    'page_title' => $request->page_title,
                    'page_slug' => $slug,
                    'page_file' => $file_name,
                    'page_content' => $request->page_content,
                    'page_must' => null,
                    'page_status' => $request->page_status,
                ]
            );
            $path = 'images/page/' . $request->old_file;
            if (file_exists($path)) {
                @unlink((public_path($path)));
            }

        } else {
            $page = Pages::where('id', $id)->update(
                [
                    'page_title' => $request->page_title,
                    'page_slug' => $slug,
                    'page_content' => $request->page_content,
                    'page_must' => null,
                    'page_status' => $request->page_status,
                ]
            );
        }



        if ($page) {
            return back()->with('success', 'Page ekleme işlemi başarılı');
        }
        return back()->with('error', 'Page ekleme işlemi başarısız');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page=Pages::find(intval($id));
        if ($page->delete())
        {
            echo 1;
        }
        echo 0;
    }


    public function sortable()
    {


        foreach ($_POST['item'] as $key => $value) {
            $pages = Pages::find(intval($value));
            $pages->page_must = intval($key);
            $pages->save();
        }

        echo true;
    }
}

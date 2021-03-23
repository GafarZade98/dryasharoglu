<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CategoryController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        veri cekme islemi databaseden data ya verini cekirik ordan isledirik
//        burdaki categories yarattigimiz modelin adidi | yuxarda model eklemeyi unutma

        $data['category'] = Category::all()->sortBy('must');
        return view('backend.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//slug yapma islem| eger gelen slug 3 herfden boyukduse girilen slug slug olsun girilen slug yoxdusa title slug olsun

        $request->validate(
            [
                'name' =>'required',
            ]
        );
        if (strlen($request->slug) > 3) {
            $slug = Str::slug($request->slug);
        } else {
            $slug = Str::slug($request->name);
        }
        $category=Category::insert(
            [
                'name' => $request->name,
                'slug' => $slug,
                'must' => $request->must,
                'status' => $request->status,
                'featured' => $request->featured
            ]
        );
        if ($category) {
            return redirect(route('category.index'))->with('success', 'Kategori ekleme işlemi başarılı');
        }
        return back()->with('error', 'Kategori ekleme işlemi başarısız');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $categories=Category::where('id',$id)->firstOrFail();
        return view('backend.category.edit')->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if (strlen($request->slug) > 3) {
            $slug = Str::slug($request->slug);
        } else {
            $slug = Str::slug($request->name);
        }
        $request->validate(
            [
                'name' =>'required',
            ]
        );

            $category = Category::where('id', $id)->update(
                [
                    'name' => $request->name,
                    'slug' => $slug,
                    'must' => +1,
                    'status' => $request->status,
                    'featured'=> $request->featured
                ]
            );


        if ($category) {
            return back()->with('success', 'Kategori ekleme işlemi başarılı');
        }
        return back()->with('error', 'Kategori ekleme işlemi başarısız');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $category=Category::find(intval($id));
        if ($category->delete())
        {
            echo 1;
        }
        echo 0;
    }


    public function sortable()
    {


        foreach ($_POST['item'] as $key => $value) {
            $category = Category::find(intval($value));
            $category->must = intval($key);
            $category->save();
        }

        echo true;
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::all()->sortBy('id');
        return view('backend.products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        return view('backend.products.create')->with('categories',$categories);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//slug yapma islem| eger gelen slug 3 herfden boyukduse girilen slug slug olsun girilen slug yoxdusa title slug olsun
        if (strlen($request->slug) > 3) {
            $slug = Str::slug($request->slug);
        } else {
            $slug = Str::slug($request->name);
        }
//file yukleme
        if ($request->hasFile('file')) {

            $request->validate(
                [
                    'category_id' => 'required',
                    'name' => 'required',
                    'description' => 'required',
                    'details' => 'required',
                    'file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
                ]
            );

            $file_name = uniqid() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/products'), $file_name);


        } else {
            $file_name = null;
        }


        $products = Product::insert(
            [

                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => $slug,
                'file' => $file_name,
                'details' => $request->details,
                'price' => $request->price,
                'description' => $request->description,
                'must' => null,
                'status' => $request->status,
            ]
        );
        if ($products) {
            return redirect(route('products.index'))->with('success', 'Ürün ekleme işlemi başarılı');
        }
        return back()->with('error', 'Ürün ekleme işlemi başarısız');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::where('id', $id)->firstOrFail();
        return view('backend.products.edit')->with('products', $products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (strlen($request->slug) > 3) {
            $slug = Str::slug($request->slug);
        } else {
            $slug = Str::slug($request->name);
        }
//file yukleme
        if ($request->hasFile('file')) {

            $request->validate(
                [
                    'name' => 'required',
                    'description' => 'required',
                    'details' => 'required',
                    'file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
                ]
            );

            $file_name = uniqid() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/products'), $file_name);


            $products = Product::where('id', $id)->update(
                [
                    'name' => $request->name,
                    'slug' => $slug,
                    'file' => $file_name,
                    'details' => $request->details,
                    'price' => $request->price,
                    'description' => $request->description,
                    'must' => null,
                    'status' => $request->status,
                ]
            );
            $path = 'images/products/' . $request->old_file;
            if (file_exists($path)) {
                @unlink((public_path($path)));
            }

        } else {
            $products = Product::where('id', $id)->update(
                [
                    'name' => $request->name,
                    'slug' => $slug,
                    'details' => $request->details,
                    'price' => $request->price,
                    'description' => $request->description,
                    'must' => null,
                    'status' => $request->status,
                ]
            );
        }


        if ($products) {
            return back()->with('success', 'Ürün ekleme işlemi başarılı');
        }
        return back()->with('error', 'Ürün ekleme işlemi başarısız');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find(intval($id));
        if ($products->delete()) {
            echo 1;
        }
        echo 0;
    }


    public function sortable()
    {


        foreach ($_POST['item'] as $key => $value) {
            $products = Product::find(intval($value));
            $products->must = intval($key);
            $products->save();
        }

        echo true;
    }


}

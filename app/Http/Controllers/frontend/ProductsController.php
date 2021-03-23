<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories=Category::all();
        if (request()->category) {
            $products = Product::with('category')->whereHas('category', function ($query) {
                $query->where('slug', request()->category);
            })->paginate(6);
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
            $likealsothat=Product::inRandomOrder()->take(3)->get();

        }
        else  {

            $products=Product::take(12)->paginate(6);
            $likealsothat=Product::inRandomOrder()->take(3)->get();
            $categoryName = 'Ürünler';

        }


        return view('frontend.pages.products')->with([
            'products'=>$products,
            'likealsothat'=>$likealsothat,
            'categories'=>$categories,
            'categoryName' => $categoryName,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function detail($slug)
    {
        $product = Product::where('slug',$slug)->firstOrFail();
        $likealsothat=Product::where('slug','!=',$slug)->inRandomOrder()->take(4)->get();

        return view('frontend.pages.product')->with([
        'product'=>$product,
        'likealsothat'=>$likealsothat]);

    }
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');
        $categories=Category::all();
        $likealsothat=Product::inRandomOrder()->take(3)->get();

//        $products = Products::where('name', 'like', "%$query%")
//                            ->orWhere('details', 'like', "%$query%")
//                            ->orWhere('description', 'like', "%$query%")
//                            ->paginate(10);

        $products = Product::search($query)->paginate(10);

        return view('frontend.pages.search-results')->with([
            'products'=>$products,
            'likealsothat'=>$likealsothat,
            'categories'=>$categories,
        ]);
    }


}

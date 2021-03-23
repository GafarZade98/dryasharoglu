<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Tests\Shoppingcart\Fixtures\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipping="15,00";
        $likealsothat=Product::inRandomOrder()->take(4)->get();
        return view('frontend.pages.cart')->with
            ([
                'likealsothat' =>$likealsothat,
                'shipping' =>$shipping
            ]);
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
        $dublicates=Cart::search(function ($cartItem, $rowId)use($request){
            return $cartItem->id === $request->id;
        });
        if ($dublicates->isNotEmpty()) {
            return redirect()->route('cart')->with('success_message', 'Bu ürün daha önce eklenmiştir!!!');
        }
            Cart::add($request->id, $request->name, $request->qty, $request->price, 0, ['files' => $request->file,'description' => $request->description])
                ->associate('App\Models\Product');

            return redirect()->route('cart')->with('success_message', 'Ürün sepetinize eklendi!!!');
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
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,20'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', 'Sayı güncellenmesi başarısız oldu!!');
            return response()->json(['success' => false],400);
        }


        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Sayı başarıyla güncellendi!!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Cart::remove($id);
           return back()->with('succes_message','Ürün başarlıyla silindi');
    }

}

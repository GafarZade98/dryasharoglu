<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $shipping = 15;

        return view('frontend.pages.checkout')->with('shipping', $shipping);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => auth()->user()->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_phone' => $request->phone,
            'billing_province' => $request->province,
            'billing_district' => $request->district,
            'billing_postcode' => $request->postcode,
            'billing_subtotal' => $this->getNumbers()->get('newSubtotal'),
            'billing_shipping' => $this->getNumbers()->get('shipping'),
        ]);


        Cart::content()->map(function ($item) use ($order) {
            $order
                ->products()
                ->syncWithoutDetaching([
                    $item->id => ['quantity' => $item->qty]
                ]);
        });

        return redirect()->route('confirmation');

}



public function getNumbers()
{
    $newSubtotal = intval(str_replace(",","",Cart::total()));
    $shipping = 15;
    return collect(['newSubtotal' => $newSubtotal,
            'shipping' => $shipping
        ]);
}

/**
 * Display the specified resource.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public
function show($id)
{
    //
}

/**
 * Show the form for editing the specified resource.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public
function edit($id)
{
    //
}

/**
 * Update the specified resource in storage.
 *
 * @param \Illuminate\Http\Request $request
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public
function update(Request $request, $id)
{
    //
}

/**
 * Remove the specified resource from storage.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public
function destroy($id)
{
    //
}
}

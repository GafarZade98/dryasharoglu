<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrdersController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $orders = Order::all();
        return view('backend.orders.index', compact('orders'));
    }


    /**
     * This is order detail page function
     * @param int $id
     * @return View
     */
    public function detail(int $id): View
    {
        $order = Order::where('id', $id)->firstOrFail();

        return view('backend.orders.products', compact('order'));
    }
    public function destroy($id)
    {
        $orders=Order::find(intval($id));
        if ($orders->delete())
        {
            return back()->with('success', 'Silinme işlemi başarılı');
        }
        return back()->with('error', 'Silinme işlemi başarısız');
    }
}

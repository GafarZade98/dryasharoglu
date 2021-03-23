<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;

class DefaultController extends Controller
{
    public function index()
    {
        $products=Product::inRandomOrder()->take(8)->get();

        $data['slider'] = Slider::all()
            ->where('slider_status', '1')
            ->sortBy('slider_must');
        return view('frontend.pages.index', compact('data'))->with('products',$products);
    }


    public function contact()
    {
        return view('frontend.default.contact');
    }
}


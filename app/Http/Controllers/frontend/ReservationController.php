<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('frontend.pages.reservation');

    }

    public function store(Request $request)
    {
        $reservation = Reservation::insert(
            [
                'name' => $request->name,
                'number' => $request->number,
                'message' => $request->message,

            ]
        );
        if ($reservation) {
            return redirect(route('reservation'))->with('success', 'Randevu alma işlemi başarı ile gerçekleşti');
        }
        return back()->with('error', 'Randevu alma işlemi başarısız');

    }
}

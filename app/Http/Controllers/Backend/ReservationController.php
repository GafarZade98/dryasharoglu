<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations= Reservation::all()->sortBy('created_at');
        return view('backend.reservations.index')->with('reservations',$reservations);

    }

    public function destroy($id)
    {
        $reservations=Reservation::find(intval($id));
        if ($reservations->delete())
        {
            return back()->with('success', 'Silinme işlemi başarılı');
        }
        return back()->with('error', 'Silinme işlemi başarısız');
    }
}

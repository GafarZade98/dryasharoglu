<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    public function index()
    {
        return view('frontend.pages.reservation');

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'number' => 'required',
            'created_at' => 'required|date',
            'message' => 'required|max:255'
        ]);

        if (!$validator->fails()){
            Reservation::insert(
                $validator->validated()
            );

            return back()->with('message', ['type' => 'success', 'content' => 'Mesajınız iletildi']);
        }
        else return back()->with('message', ['type' => 'danger', 'content' => 'Mesajınız iletilemedi']);
    }
}

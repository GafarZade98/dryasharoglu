<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class ContactController extends Controller
{
    public function index()
    {

        return view('frontend.pages.contact');
    }
    public function store(Request $request)
    {
        $messages = Message::insert(
            [
                'name' => $request->name,
                'email' => $request->email,
                'created_at' => $request->created_at,
                'message' => $request->message,

            ]
        );
        if ($messages) {
            return redirect(route('contact'))->with('success', 'Mesajınız iletildi');
        }
        return back()->with('error', 'Mesajınız iletilemedi');

    }
}





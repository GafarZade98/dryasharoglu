<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {

        return view('frontend.pages.contact');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email:rfc,dns',
            'message' => 'required|max:255',
        ]);

        if (!$validator->fails()){
            Message::insert(
                $validator->validated()
            );

            return back()->with('message', ['type' => 'success', 'content' => 'Mesajınız iletildi']);
        }
        else return back()->with('message', ['type' => 'danger', 'content' => 'Mesajınız iletilemedi']);
    }
}





<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
class MessagesController extends Controller
{
    public function index()
    {
        $messages= Message::all()->sortBy('created_at');
        return view('backend.message.index')->with('messages',$messages);

    }

    public function destroy($id)
    {
        $messages=Message::find(intval($id));
        if ($messages->delete())
        {
            return back()->with('success', 'Silinme işlemi başarılı');
        }
        return back()->with('error', 'Silinme işlemi başarısız');
    }
}

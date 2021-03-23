<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Teams;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()

    {

        $data['teams'] = Teams::all()
            ->where('team_status', 1)
            ->sortBy('team_must');

        return view('frontend.pages.about',compact('data'));
    }

}

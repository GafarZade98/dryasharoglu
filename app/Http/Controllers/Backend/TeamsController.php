<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['teams']=Teams::all()->sortBy('team_must')->where('team_status',1);
        return view('backend.team.index',compact('data'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams=Teams::where('id',$id)->firstOrFail();
        return view('backend.team.edit')->with('teams',$teams);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (strlen($request->team_slug) > 3) {
            $slug = Str::slug($request->team_slug);
        } else {
            $slug = Str::slug($request->team_name);
        }

        if ($request->hasFile('team_file')) {

            $request->validate(
                [
                    'team_name' => 'required',
                    'team_mission' => 'required',
                    'team_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
                ]
            );

            $file_name = uniqid() . '.' . $request->team_file->getClientOriginalExtension();
            $request->team_file->move(public_path('images/team'), $file_name);


            $team = Teams::where('id', $id)->update(
                [
                    'team_name' => $request->team_name,
                    'team_slug' => $slug,
                    'team_file' => $file_name,
                    'team_mission' => $request->team_mission,
                    'team_must' => null,
                    'team_status' => $request->team_status,
                ]
            );
            $path = 'images/team/' . $request->old_file;
            if (file_exists($path)) {
                @unlink((public_path($path)));
            }

        } else {
            $team = Teams::where('id', $id)->update(
                [
                    'team_name' => $request->team_name,
                    'team_slug' => $slug,
                    'team_mission' => $request->team_mission,
                    'team_must' => null,
                    'team_status' => $request->team_status,
                ]
            );
        }



        if ($team) {
            return back()->with('success', 'Team ekleme işlemi başarılı');
        }
        return back()->with('error', 'Team ekleme işlemi başarısız');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sortable()
    {


        foreach ($_POST['item'] as $key => $value) {
            $teams = Teams::find(intval($value));
            $teams->team_must = intval($key);
            $teams->save();
        }

        echo true;
    }
}

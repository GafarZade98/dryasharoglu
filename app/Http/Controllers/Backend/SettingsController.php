<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
//    model bazlı veri çekme işlemi
        $data['adminSettings'] = Settings::all()->sortBy('settings_must');
        return view('backend.settings.index', compact('data'));
    }

    public function create()
    {
        return view('backend.settings.create');
    }

    public function store(Request $request)
    {
        $setting = Settings::insert(
            [
                'settings_descriptions' => $request->settings_descriptions,
                'settings_key' => $request->settings_key,
                'settings_value' => null,
                'settings_must' => null,
                'settings_status' => $request->settings_status,
                'settings_type' => $request->settings_type
            ]
        );
        if ($setting) {
            return redirect(route('setting.Index'))->with('success', 'Setting ekleme işlemi başarılı');
        }
        return back()->with('error', 'Setting ekleme işlemi başarısız');

    }





//sortable islemi
    public function sortable()
    {


        foreach ($_POST['item'] as $key => $value)
        {
            $settings=Settings::find(intval($value));
            $settings->settings_must=intval($key);
            $settings->save();
        }

        echo true;
    }
//silinme islemi
    public function destroy($id)
    {
        $settings = Settings::find($id);
        if ($settings->delete()) {
            return back()->with('success', 'Silinme işlemi başarılı');
        }
        return back()->with('error', 'Silinme işlemi başarısız');
    }

//    edit islemi
    public function edit($id)
    {
    $settings=Settings::where('id',$id)->first();

    return view('backend.settings.edit')->with('settings',$settings);

    }

//    post geldiyi ucun request veririk
    public function update(Request $request, $id)
    {
//        asagida file olan yuklemeler ucundu validate dosyanin uzantisinin ne olmali oldugunu gosterir,
//        uniqid 13 reqmli sayi uretur onu, get...ile uzantiyla birlesdirir,
//        move onu secdiyimiz papkaya atir
        if ($request->hasFile('settings_value'))
        {
            $request->validate([
                'settings_value' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name=uniqid().'.'.$request->settings_value->getClientOriginalExtension();
            $request->settings_value->move(public_path('images/settings'),$file_name);
            $request->settings_value=$file_name;
        }
//        yuxarida file olan yuklemeler ucundu validate dosyanin uzantisinin ne olmali oldugunu gosterir,
//        uniqid 13 reqmli sayi uretur onu, get...ile uzantiyla birlesdirir,
//        move onu secdiyimiz papkaya atir

        //    post geldiyi ucun request veririk
        $settings = Settings::where('id', $id)->update(
            [
                "settings_value" => $request->settings_value
            ]
        );

        if ($settings)
        {
//            yuklenen sekli tekrar etmemek ucun silir
            $path='images/settings/'.$request->old_file;
            if (file_exists($path))
            {
                @unlink(public_path($path));
            }
//            yuklenen sekli tekrar etmemek ucun silir
            return back()->with('success', 'İşlem başarılı...');
        }
            return back()->with('error', 'İşlem başarısız...');
    }
}

<?php

namespace App\Http\Controllers\Adminka;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){

        $settings = Setting::find(1);

        return view('dashboard.settings.index',compact('settings'));

    }

    public function update(Request $request){

        $this->validate($request, [
            'title' => 'required',
            'active' => 'integer|required',
            'logo' => 'image|nullable|mimes:png,jpeg,jpg,svg',
            'favicon' => 'image|nullable|mimes:png,jpeg,jpg,svg'
        ]);

        $settings = Setting::find(1);

        $settings->title         = $request->title;
        $settings->subtitle      = $request->subtitle;
        $settings->footer        = $request->footer;
        $settings->active        = $request->active;
        $settings->description   = $request->description;
        $settings->keywords      = $request->keywords;
        $settings->author        = $request->author;
        $settings->copyright     = $request->copyright;

        if ( $request->hasFile('logo') ) {

            $fileName = 'logo'.time().'.'.$request->logo->extension();  // logo123.png
            $fileNameWithUpload = 'storage/uploads/settings'.$fileName;

            //seklin ozunu storage save etmek
            $request->logo->storeAs('public/uploads/settings',$fileName);

            //database yuklemek
            $settings->logo = $fileNameWithUpload;

        }

        if ( $request->hasFile('favicon') ) {

            $fileName = 'favicon'.time().'.'.$request->favicon->extension();  // logo123.png
            $fileNameWithUpload = 'storage/uploads/settings'.$fileName;

            $request->favicon->storeAs('public/uploads/settings',$fileName);

            $settings->favicon = $fileNameWithUpload;

        }

        $settings->save();

        return redirect()->back();

    }
}

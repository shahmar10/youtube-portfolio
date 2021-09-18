<?php

namespace App\Http\Controllers\Adminka;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use App\Models\Social;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){

        $about  = About::find(1);
        $social = Social::find(1);

        return view('dashboard.abouts.index',compact('about','social'));

    }

    public function update(AboutRequest $request){

        $about = About::find(1);

        $about->name = $request->name;
        $about->email = $request->email;
        $about->birth = $request->birth;
        $about->adress = $request->adress;
        $about->degree = $request->degree;
        $about->body = $request->body;

        if ( $request->hasFile('photo') ) {

            $fileName = 'img'.time().'.'.$request->photo->extension();  // logo123.png
            $fileNameWithUpload = 'storage/uploads/about'.$fileName;

            //seklin ozunu storage save etmek
            $request->photo->storeAs('public/uploads/about',$fileName);

            //database yuklemek
            $about->img = $fileNameWithUpload;

        }

        if ( $request->hasFile('cv') ) {

            $fileName = 'cv'.time().'.'.$request->cv->extension();  // logo123.pdf
            $fileNameWithUpload = 'storage/uploads/about'.$fileName;

            //seklin ozunu storage save etmek
            $request->cv->storeAs('public/uploads/about',$fileName);

            //database yuklemek
            $about->cv = $fileNameWithUpload;

        }

        $about->save();

        $social = Social::find(1);

        $social->update($request->all());


        return redirect()->route('admin.about')->with('success',"Ugurla yenilendi");

    }
}

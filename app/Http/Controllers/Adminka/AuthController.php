<?php

namespace App\Http\Controllers\Adminka;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){

        return view('dashboard.login');

    }

    public function login (Request $request){

        $this->validate($request, [
            'password' => 'required',
            'email' => 'email|required'
        ]);

        if ( !Auth::attempt(['email' => $request->email, 'password' => $request->password]) ) {

            return redirect()->back()->with('danger','Email ve ya parol yanlisdir!');

        }

        return redirect()->route('admin.index');

    }

    public function logout(){

        auth()->logout();

        return redirect()->route('admin.login');

    }
}

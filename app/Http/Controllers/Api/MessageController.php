<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function send (Request $request) {

        $this->validate($request,[
            'email' => 'email|required',
            'title' => 'required',
            'body' => 'required'
        ]);

        $message = Message::create($request->all());

        return response(['success'=>"true"] , 200);

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WallController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        $user_id = Auth::id();
        return view(
            'dashboard',
            [
                'messages' => $messages,
                'user_id' => $user_id,
            ]
        );
    }

    public function postMessage(Request $request)
    {
        $message = new Message();
        $message->message = $request->message;
        $message->user_id = Auth::id();
        $message->save();
        return redirect()->route('dashboard');
    }

    public function deleteMessage(Request $request)
    {
        $message = Message::find($request->id);
        $message->delete();
        return redirect()->route('dashboard');
    }
    /*
    public function updateMessage(Request $request)
    {
        $message = Message::find($request->id);
        return view('updateMessage', ['message' => $message]);
    }*/

    public function updateMessage(Request $request)
    {
        $message = Message::find($request->id);
        $message->message = $request->message;
        $message->save();
        return redirect()->route('dashboard');
    }
}

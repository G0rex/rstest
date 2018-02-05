<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Events\TestEvent;
class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $messages = Message::all(); 
        return view('chat.index',compact('messages'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postMessage(Request $request)
    {
        $message = Message::create($request->all());
        event(
          new TestEvent($message)
        );
        return redirect()->back();
    }

}

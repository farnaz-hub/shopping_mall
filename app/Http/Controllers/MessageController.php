<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function add(Message $message)
    {
        return view('message.add', compact('message'));
    }


    public function save(Request $request, Message $message)
    {
        Message::create([
            'ticket_id' => $ticket->id,
            'content' => $request->get('content'),
            'customer_id' => $customer->id->get('customer_id'),
            'user_id' => $user->id->get('user_id'),
        ]);
    }
}

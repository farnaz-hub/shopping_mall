<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Message;
use App\Models\Ticket;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function save(Request $request, Ticket $ticket, Customer $customer, User $user)
    {
        Message::create([
            'ticket_id' => $ticket->id,
            'customer_id' => $customer->id,
            'user_id' => $user->id,
            'content' => $request->get('content'),
        ]);

        return redirect(route('ticket.list', ['ticket' => $ticket]));
    }


    public function list(Ticket $ticket)
    {
        $types = Type::all();
        $categories = Category::all();
        return view('message.list', compact('ticket', 'types', 'categories'));
    }


    public function delete(Message $message)
    {
        $message->delete();
        return [
            'success' => true,
        ];
    }
}

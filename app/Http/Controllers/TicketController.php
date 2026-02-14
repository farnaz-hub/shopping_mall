<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ticket;
use App\Models\Type;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function add()
    {
        $types = Type::all();
        $categories = Category::all();
        return view('ticket.add', compact('types', 'categories'));
    }


    public function save(Request $request)
    {
        Ticket::create([
            'title' => $request->get('title'),
            'type_id' => $request->get('type_id'),
            'category_id' => $request->get('category_id'),
            'priority' => $request->get('priority'),
            'status' => $request->get('status'),
            'send_message' => $request->get('send_message', 0),
            'description' => $request->get('description'),
        ]);

        return redirect(route('ticket.list'));
    }


    public function list()
    {
        $tickets = Ticket::all();
        return view('ticket.list', compact('tickets'));
    }


    public function show(Ticket $ticket)
    {
        $types = Type::all();
        $categories = Category::all();
        return view('ticket.edit', compact('ticket', 'types', 'categories'));
    }


    public function update(Request $request, Ticket $ticket)
    {
        $ticket->title = $request->get('title');
        $ticket->type_id = $request->get('type_id');
        $ticket->category_id = $request->get('category_id');
        $ticket->priority = $request->get('priority');
        $ticket->status = $request->get('status');
        $ticket->send_message = $request->get('send_message', 0);
        $ticket->description = $request->get('description');
        $ticket->update();

        return redirect(route('ticket.list'));
    }


    public function delete(Ticket $ticket)
    {
        $ticket->delete();
        return redirect(route('ticket.list'));
    }
}

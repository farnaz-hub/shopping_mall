@extends('layout')
@section('content')
    <div class="container-fluid">
        <a href="{{route('ticket.add')}}" class="btn btn-info">ADD</a>

        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th class="text-center">Title</th>
                <th class="text-center">Type</th>
                <th class="text-center">Category</th>
                <th class="text-center">Priority</th>
                <th class="text-center">Status</th>
                <th class="text-center">Description</th>
                <th class="text-center">Send Message</th>
                <th class="text-center"></th>
                <th class="text-center">Operations</th>
            </tr>
            </thead>

            @foreach($tickets as $ticket)
                <tr>
                    <td class="text-center">{{$ticket->title}}</td>
                    <td class="text-center">{{$ticket->type?->title}}</td>
                    <td class="text-center">{{$ticket->category?->title}}</td>
                    <td class="text-center">@if($ticket->priority == 1)
                            up
                        @elseif($ticket->priority == 2)
                            middle
                        @else
                            down
                        @endif</td>
                    <td class="text-center">@if($ticket->status == 1)
                            closed
                        @else
                            pending response
                        @endif</td>
                    <td class="text-center">{{$ticket->description}}</td>
                    <td class="text-center">@if($ticket->send_message == 1)
                            yes
                        @else
                            no
                        @endif</td>
                    <td class="text-center"><a
                            {{-- href="{{route('message.show')}}" onclick="showMessage(this);return false;"--}} class="btn btn-info btn-sm">
                            <i class="fa fa-eye">show</i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="{{route('ticket.show', ['ticket' => $ticket])}}"
                           class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{route('ticket.delete', ['ticket' => $ticket])}}"
                           class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

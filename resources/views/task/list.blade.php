@extends('layout')
@section('content')
    <a href="{{route('task.add')}}" class="btn btn-info fa fa-plus">ADD</a>
    <table class="table table-striped" style="background-color: ">
        <thead class="table-dark">
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Title</th>
            <th class="text-center">Category</th>
            <th class="text-center">Solver</th>
            <th class="text-center">Owner</th>
            <th class="text-center">Customer</th>
            <th class="text-center">Start Time</th>
            <th class="text-center">End Time</th>
            <th class="text-center">Priority</th>
            <th class="text-center">Send Message</th>
            <th class="text-center">Status</th>
            <th class="text-center">Last Idea</th>
            <th class="text-center">Operations</th>
        </tr>
        </thead>
        <tbody class="text-center">
        @foreach($tasks as $task)
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->title}}</td>
                <td>{{$task->category->title}}</td>
                <td>{{$task->solver->name}}</td>
                <td>{{$task->owner->name}}</td>
                <td>{{$task->customer->name}}</td>
                <td>{{$task->start_time}}</td>
                <td>{{$task->end_time}}</td>
                <td>@if($task->priority == 1)
                        Up
                    @elseif($task->priority == 2)
                        Middle
                    @elseif($task->priority == 3)
                        Down
                    @elseif($task->priority == 4)
                        Emergency
                    @endif</td>
                <td>@if($task->send_message == 1)
                        yes
                    @else
                        no
                    @endif</td>
                <td>@if($task->status == 1)
                        New
                    @elseif($task->status == 2)
                        Pending
                    @elseif($task->status == 3)
                        Problem
                    @elseif($task->status == 4)
                        Done
                    @endif</td>
                <td>{{@$task->ideas()->orderBy('id', 'desc')->first()->comment}}</td>
                <td>
                    <a href="{{route('task.show', ['task' => $task])}}"
                       class="btn btn-warning btn-sm fa fa-edit">Edit</a>
                    <a href="{{route('task.delete', ['task' => $task])}}"
                       class="btn btn-danger btn-sm fa fa-minus-circle">Delete</a>
                    <a href="{{route('idea.list', ['task' => $task])}}" onclick="openIdea(this);return false"
                       class="btn btn-success btn-sm fa fa-comments-o">Ideas</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="IdeaList" class="modal fade" role="dialog">               {{-- Modal --}}
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ideas</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openIdea(el) {
            $.ajax({
                url: $(el).attr('href'),
                method: 'GET',
                success: function (result) {
                    $('.modal-body').html(result)
                    $('#IdeaList').modal('toggle')
                }
            })
        }
    </script>
@endsection

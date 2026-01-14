@extends('layout')
@section('content')
    <div class="container-fluid">
        <form method="post" action="{{route('task.update', ['task' => $task])}}">
            @csrf
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Title</label>
                <input name="title" type="text" placeholder="title" class="form-control" value="{{$task->title}}">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Customer</label>
                <select class="form-control" name="customer_id">
                    @foreach($customers as $customer)
                        <option value="{{$customer->id}}"
                                @if($customer->id == $task->customer_id) selected @endif>{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Solver</label>
                <select class="form-control" name="solver_id">
                    @foreach($solvers as $solver)
                        <option value="{{$solver->id}}"
                                @if($solver->id == $task->solver_id) selected @endif>{{$solver->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Category</label>
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if($category->id == $task->category_id) selected @endif>{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Start Time</label>
                <input name="start_time" type="datetime-local" class="form-control" value="{{$task->start_time}}">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>End Time</label>
                <input name="end_time" type="datetime-local" class="form-control" value="{{$task->end_time}}">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Priority</label>
                <select class="form-control" name="priority">
                    <option value="1" @if($task->priority == 1) selected @endif>Up</option>
                    <option value="2" @if($task->priority == 2) selected @endif>Middle</option>
                    <option value="3" @if($task->priority == 3) selected @endif>Down</option>
                    <option value="4" @if($task->priority == 4) selected @endif>Emergency</option>
                </select>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1" @if($task->status == 1) selected @endif>New</option>
                    <option value="2" @if($task->status == 2) selected @endif>Pending</option>
                    <option value="3" @if($task->status == 3) selected @endif>Problem</option>
                    <option value="4" @if($task->status == 4) selected @endif>Done</option>
                </select>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Description</label>
                <textarea name="description" type="text" rows="5" class="form-control">{{$task->description}}</textarea>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>? Send Message</label>
                <input name="send_message" type="checkbox" class="form-check-input" value="1"
                       @if($task->send_message) checked @endif>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <button type="submit" class="btn btn-success">submit</button>
            </div>
        </form>
    </div>
@endsection

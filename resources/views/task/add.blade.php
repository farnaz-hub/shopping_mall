@extends('layout')
@section('content')
    <div class="container-fluid">
        <form method="post" action="{{route('task.save')}}">
            @csrf
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Title</label>
                <input name="title" type="text" placeholder="title" class="form-control">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Customer</label>
                <select class="form-control" name="customer_id">
                    @foreach($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Solver</label>
                <select class="form-control" name="solver_id">
                    @foreach($solvers as $solver)
                        <option value="{{$solver->id}}">{{$solver->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Category</label>
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Start Time</label>
                <input name="start_time" type="datetime-local" class="form-control">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>End Time</label>
                <input name="end_time" type="datetime-local" class="form-control">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Priority</label>
                <select class="form-control" name="priority">
                    <option value="1">Up</option>
                    <option value="2">Middle</option>
                    <option value="3">Down</option>
                    <option value="4">Emergency</option>
                </select>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1">New</option>
                    <option value="2">Pending</option>
                    <option value="3">Problem</option>
                    <option value="4">Done</option>
                </select>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Description</label>
                <textarea name="description" type="text" rows="5" class="form-control"></textarea>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>? Send Message</label>
                <input name="send_message" type="checkbox" class="form-check-input" value="1">
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <button type="submit" class="btn btn-success">submit</button>
            </div>
        </form>
    </div>
@endsection

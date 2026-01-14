@extends('layout')
@section('content')
    <div class="container-fluid">
        <form method="post" action="{{route('ticket.save')}}">
            @csrf

            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Title</label>
                <input name="title" type="text" id="title" placeholder="title" class="form-control">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Type</label>
                <select name="type_id" class="form-control">
                    @foreach($types as $type)
                        <option value="{{$type->id}}"> {{$type->title}} </option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"> {{$category->title}} </option>
                    @endforeach
                </select>
            </div>

            <div class="clearfix"></div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Priority</label>
                <div id="priority" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default">
                        <input name="priority" type="radio" value="1">up
                    </label>
                    <label class="btn btn-default">
                        <input name="priority" type="radio" value="2">middle
                    </label>
                    <label class="btn btn-default">
                        <input name="priority" type="radio" value="3">down
                    </label>
                </div>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Status</label>
                <div id="status" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default">
                        <input name="status" type="radio" value="1">closed
                    </label>
                    <label class="btn btn-default">
                        <input name="status" type="radio" value="2">pending response
                    </label>
                </div>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label for="description">Description</label>
                <textarea rows="5" name="description" type="text" id="description" placeholder="description"
                          class="form-control"></textarea>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label style="margin: 30px">Do you want to receive message from support team?</label>
                <input name="send_message" type="checkbox" value="1" class="form-check-input">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <button type="submit" style="margin: 10px" class="btn btn-success">submit</button>
            </div>
        </form>
    </div>
@endsection

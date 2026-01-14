@extends('layout')
@section('content')
    <div class="x_content">
        <form method="post" action="{{route('type.save')}}">
            @csrf

            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Title</label>
                <input name="title" type="text" id="title" placeholder="title" class="form-control">
            </div>


            <div class="ln_solid"></div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <button type="submit" style="margin: 10px" class="btn btn-success">submit</button>
            </div>
        </form>
    </div>
@endsection

@extends('layout')

@section('content')
    <div class="container-fluid">
        <form method="post" action="{{route('brand.save')}}">
            @csrf

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  name="title" type="text" id="title" class="form-control col-md-7 col-xs-12">
                </div>
            </div>


            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                    <button type="submit" class="btn btn-success">submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection






{{--
<form method="post" action="{{route('brand.save')}}">
        @csrf

        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="title" placeholder="name">
            <label>Title: </label>
        </div>


        <div>
            <button type="submit" class="btn btn-success btn-lg">submit</button>
        </div>
    </form>
--}}

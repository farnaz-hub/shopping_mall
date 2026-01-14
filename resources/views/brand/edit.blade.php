@extends('layout')
@section('content')
    <div class="x_content">
        <br/>
        <form method="post" action="{{route('brand.update', ['brand' => $brand])}}" id="demo-form2"
              data-parsley-validate class="form-horizontal form-label-left">
            @csrf

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="title" type="text" id="title" class="form-control col-md-7 col-xs-12"
                           value="{{$brand->title}}">
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
    <form method="post" action="{{route('brand.update', ['brand' => $brand])}}">
        @csrf

        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="title" placeholder="name" value="{{$brand->title}}">
            <label>Title: </label>
        </div>

        <div>
            <button type="submit" class="btn btn-success btn-lg">submit</button>
        </div>
    </form>
--}}

@extends('layout')
@section('content')
    <div class="container-fluid">
        <form method="post" action="{{route('category.update', ['category' => $category])}}">
            @csrf

            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Type</label><br>
                <select name="type_id" class="form-control">
                    @foreach($types as $type)
                        <option value="{{$type->id}}"
                                @if($type->id == $category->type_id) selected @endif> {{$type->title}} </option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Title</label>
                <input name="title" type="text" id="title" placeholder="title" class="form-control"
                       value="{{$category->title}}">
            </div>


            <div class="ln_solid"></div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <button type="submit" style="margin: 10px" class="btn btn-success">submit</button>
            </div>
        </form>
    </div>
@endsection

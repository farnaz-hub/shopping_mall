@extends('layout')

@section('content')
    <div class="container-fluid">
        <form method="post" action="{{route('product.save')}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label">
            @csrf

            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Title</label>
                <input  name="title" type="text" id="title" placeholder="title" class="form-control">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label for="description">Description</label>
                <textarea name="description" type="text" id="description" placeholder="description" class="form-control"></textarea>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Slug</label>
                <input  name="slug" type="text" id="slug" placeholder="slug" class="form-control">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Image</label>
                <input  name="image" type="text" id="image" placeholder="image" class="form-control">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label for="brand_id">Brand</label>
                <select class="form-control" name="brand_id" id="brand_id">
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}"> {{$brand->title}} </option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Max Order</label>
                <input  name="max_order" type="text" id="max_order" placeholder="max_order" class="form-control">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Warning Border</label>
                <input  name="warning_border" type="text" id="warning_border" placeholder="warning_border" class="form-control">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label style="margin: 30px">Unlimited Inventory</label>
                <input name="unlimited_inventory" type="checkbox" value="1" class="form-check-input">
            </div>

            <div class="clearfix"></div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <button type="submit" class="btn btn-success">submit</button>
            </div>
        </form>
    </div>
@endsection







{{--
<form method="post" action="{{route('product.save')}}">
        @csrf

        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="title" placeholder="title">
            <label>Title: </label>
        </div>


        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="description" placeholder="description">
            <label>Description: </label>
        </div>


        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="slug" placeholder="slug">
            <label>Slug: </label>
        </div>


        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="image" placeholder="image">
            <label>Image: </label>
        </div>


        <div class="form-floating mb-3 mt-3">
            <select class="form-control" name="brand_id">
                @foreach($brands as $brand)
                    <option value="{{$brand->id}}"> {{$brand->title}} </option>
                @endforeach
            </select>
            <label>Brand: </label>
        </div>


        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="max_order" placeholder="max_order">
            <label>Max Order: </label>
        </div>


        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="warning_border" placeholder="warning_border">
            <label>Warning Border: </label>
        </div>


        <div class="form-check form-switch mb-3 mt-3">
            <input class="form-check-input" value="1" type="checkbox">
            <label class="form-check-label">Unlimited Inventory</label>
        </div>


        <div>
            <button type="submit" class="btn btn-success btn-lg">submit</button>
        </div>
    </form>
--}}

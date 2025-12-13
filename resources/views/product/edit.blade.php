@extends('layout')

@section('content')
    <div class="x_content">
        <br/>
        <form method="post" action="{{route('product.update', ['product' => $product])}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            @csrf

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Title</label>
                <input  name="title" type="text" id="title" placeholder="title" class="form-control has-feedback-left"
                        value="{{$product->title}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label for="description">Description</label>
                <textarea name="description" type="text" id="description" placeholder="description" class="form-control has-feedback-left">{{$product->description}}</textarea>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Slug</label>
                <input  name="slug" type="text" id="slug" placeholder="slug" class="form-control has-feedback-left"
                        value="{{$product->slug}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Image</label>
                <input  name="image" type="text" id="image" placeholder="image" class="form-control has-feedback-left"
                        value="{{$product->image}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Brand</label>
                <select class="form-control" name="brand_id">
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}" @if($brand->id == $product->brand_id) selected @endif> {{$brand->title}} </option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Max Order</label>
                <input  name="max_order" type="text" id="max_order" placeholder="max_order" class="form-control has-feedback-left"
                        value="{{$product->max_order}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Warning Border</label>
                <input  name="warning_border" type="text" id="warning_border" placeholder="warning_border" class="form-control has-feedback-left"
                        value="{{$product->warning_border}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Unlimited Inventory</label>
                <input name="unlimited_inventory" type="checkbox" class="form-check-input has-feedback"
                       value="1" @if($product->unlimited_inventory) checked @endif>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <button type="submit" class="btn btn-success">submit</button>
            </div>
        </form>
    </div>
@endsection






{{--
<form method="post" action="{{route('product.update', ['product' => $product])}}">
        @csrf

        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="title" placeholder="title" value="{{$product->title}}">
            <label>Title: </label>
        </div>


        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="description" placeholder="description" value="{{$product->description}}">
            <label>Description: </label>
        </div>


        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="slug" placeholder="slug" value="{{$product->slug}}">
            <label>Slug: </label>
        </div>


        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="image" placeholder="image" value="{{$product->image}}">
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
            <input class="form-control" name="max_order" placeholder="max_order" value="{{$product->max_order}}">
            <label>Max Order: </label>
        </div>


        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="warning_border" placeholder="warning_border" value="{{$product->warning_border}}">
            <label>Warning Border: </label>
        </div>


        <div class="form-check form-switch mb-3 mt-3">
            <input id="unlimited_inventory" class="form-check-input" name="unlimited_inventory" value="1" type="checkbox" @if($product->unlimited_inventory) checked @endif>
            <label for="unlimited_inventory" class="form-check-label">Unlimited Inventory</label>
        </div>


        <div>
            <button type="submit" class="btn btn-success btn-lg">submit</button>
        </div>
    </form>
--}}

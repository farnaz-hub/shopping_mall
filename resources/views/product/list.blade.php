@extends('layout')
@section('content')
    <div class="mb-2 mt-2"><a href="{{route('product.add')}}" class="btn btn-info">ADD</a></div>

    <table class="table table-striped">
        <thead class="table-dark">
        <tr>
            <th class="text-center">Title</th>
            <th class="text-center">Description</th>
            <th class="text-center">Slug</th>
            <th class="text-center">Image</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Unlimited Inventory</th>
            <th class="text-center">Max Order</th>
            <th class="text-center">Warning Border</th>
            <th class="text-center">Operations</th>
        </tr>
        </thead>

        @foreach($products as $product)
            <tr>
                <td class="text-center">{{$product->title}}</td>
                <td class="text-center">{{$product->description}}</td>
                <td class="text-center">{{$product->slug}}</td>
                <td class="text-center">{{$product->image}}</td>
                <td class="text-center">{{$product->brand?->title}}</td>
                <td class="text-center">@if($product->unlimited_inventory == 1)
                        yes
                    @else
                        no
                    @endif</td>
                <td class="text-center">{{$product->max_order}}</td>
                <td class="text-center">{{$product->warning_border}}</td>
                <td class="text-center">
                    <div class="d-grid gap-2">
                        <a href="{{route('product.show', ['product' => $product])}}"
                           class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{route('product.delete', ['product' => $product])}}" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

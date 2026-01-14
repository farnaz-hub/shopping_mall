@extends('layout')
@section('content')
    <div class="mb-2 mt-2"><a href="{{route('brand.add')}}" class="btn btn-info">ADD</a></div>

    <table class="table table-striped">
        <thead class="table-dark">
        <tr>
            <th class="text-center">Title</th>
            <th class="text-center">Operations</th>
        </tr>
        </thead>

        @foreach($brands as $brand)
            <tr>
                <td class="text-center">{{$brand->title}}</td>
                <td>
                    <div class="text-center">
                        <a href="{{route('brand.show', ['brand' => $brand])}}" class="btn btn-warning">Edit</a>
                        <a href="{{route('brand.delete', ['brand' => $brand])}}" class="btn btn-danger">Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

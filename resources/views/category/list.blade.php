@extends('layout')
@section('content')
    <div>
        <a href="{{route('category.add')}}" class="btn btn-info">ADD</a>

        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th class="text-center">Type</th>
                <th class="text-center">Title</th>
                <th class="text-center">Operations</th>
            </tr>
            </thead>

            @foreach($categories as $category)
                <tr>
                    <td class="text-center">{{$category->type->title}}</td>
                    <td class="text-center">{{$category->title}}</td>
                    <td class="text-center">
                        <div class="d-grid gap-2">
                            <a href="{{route('category.show', ['category' => $category])}}"
                               class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{route('category.delete', ['category' => $category])}}"
                               class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

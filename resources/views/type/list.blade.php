@extends('layout')

@section('content')
    <div>
        <a href="{{route('type.add')}}" class="btn btn-info">ADD</a>

        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th class="text-center">Title</th>
                <th class="text-center">Operations</th>
            </tr>
            </thead>

            @foreach($types as $type)
                <tr>
                    <td class="text-center">{{$type->title}}</td>
                    <td class="text-center">
                        <div class="d-grid gap-2">
                            <a href="{{route('type.show', ['type' => $type])}}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{route('type.delete', ['type' => $type])}}" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

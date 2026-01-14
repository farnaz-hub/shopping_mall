@extends('layout')
@section('content')
    <div class="mb-2 mt-2"><a href="{{route('user.add')}}" class="btn btn-info">ADD</a></div>

    <table class="table table-striped">
        <thead class="table-dark">
        <tr>
            <th class="text-center">Name</th>
            <th class="text-center">Family</th>
            <th class="text-center">Mobile</th>
            <th class="text-center">Gender</th>
            <th class="text-center">Birth Date</th>
            <th class="text-center">National Code</th>
            <th class="text-center">Province</th>
            <th class="text-center">City</th>
            <th class="text-center">Job</th>
            <th class="text-center">Username</th>
            {{-- <th class="text-center">Password</th> --}}
            {{-- <th>LAT</th> --}}
            {{-- <th>LAN</th> --}}
            <th class="text-center">Operations</th>
        </tr>
        </thead>

        @foreach($users as $user)
            <tr>
                <td class="text-center">{{$user->name}}</td>
                <td class="text-center">{{$user->family}}</td>
                <td class="text-center">{{$user->mobile}}</td>
                <td class="text-center">{{$user->gender}}</td>
                <td class="text-center">{{$user->birth_date}}</td>
                <td class="text-center">{{$user->national_code}}</td>
                <td class="text-center">{{$user->province->name}}</td>
                <td class="text-center">{{$user->city->name}}</td>
                <td class="text-center">{{$user->job}}</td>
                <td class="text-center">{{$user->username}}</td>
                {{-- <td>{{$user->password}}</td> --}}
                {{-- <td>{{$user->lat}}</td> --}}
                {{-- <td>{{$user->lan}}</td> --}}
                <td class="text-center">
                    <div class="d-grid gap-2">
                        <a href="{{route('user.show',['user' => $user])}}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{route('user.delete', ['user' => $user])}}" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

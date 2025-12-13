@extends('layout')

@section('content')
    <div class="mb-2 mt-2"><a href="{{route('user.add')}}" class="btn btn-info">ADD</a></div>

    <table class="table table-striped">
        <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Family</th>
            <th>Mobile</th>
            <th>Gender</th>
            <th>Birth Date</th>
            <th>National Code</th>
            <th>Province</th>
            <th>City</th>
            <th>Job</th>
            <th>Username</th>
            {{-- <th class="text-center">Password</th> --}}
            {{-- <th>LAT</th> --}}
            {{-- <th>LAN</th> --}}
            <th>Operations</th>
        </tr>
        </thead>

        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->family}}</td>
                <td>{{$user->mobile}}</td>
                <td>{{$user->gender}}</td>
                <td>{{$user->birth_date}}</td>
                <td>{{$user->national_code}}</td>
                <td>{{$user->province_id}}</td>
                <td>{{$user->city_id}}</td>
                <td>{{$user->job}}</td>
                <td>{{$user->username}}</td>
                {{-- <td>{{$user->password}}</td> --}}
                {{-- <td>{{$user->lat}}</td> --}}
                {{-- <td>{{$user->lan}}</td> --}}
                <td>
                    <div class="d-grid gap-2">
                        <a href="{{route('user.show',['user' => $user])}}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{route('user.delete', ['user' => $user])}}" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

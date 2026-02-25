@extends('layout')
@section('content')
    <div>
        <h3 class="text-center">Welcome</h3>
    </div>

    <a href="{{route('greeting')}}" class="btn btn-primary">Facade Test</a>
@endsection


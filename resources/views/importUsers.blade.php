@extends('layout')
@section('content')
<form action="{{route('import')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="file">Select Excel File: </label>
        <input type="file" name="file" required>
    </div>
    <button type="submit">Upload</button>
</form>
@endsection

@extends('layout')
@section('content')
    <div class="x_content">
        <form method="post" action="{{route('user.update', ['user' => $user])}}">
            @csrf
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Name</label>
                <input name="name" type="text" id="name" placeholder="name" class="form-control"
                       value="{{$user->name}}">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Family</label>
                <input name="family" type="text" id="family" class="form-control" value="{{$user->family}}">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Mobile</label>
                <input name="mobile" type="text" id="mobile" class="form-control" value="{{$user->mobile}}">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Gender</label>
                <div id="gender" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default @if($user->gender == 'male') active @endif"
                           data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input name="gender" type="radio" value="male" @if($user->gender == 'male') checked @endif>male
                    </label>
                    <label class="btn btn-default @if($user->gender == 'female') active @endif"
                           data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input name="gender" type="radio" value="female" @if($user->gender == 'female') checked @endif>female
                    </label>
                    <label class="btn btn-default @if($user->gender == 'prefer_not_to_say') active @endif"
                           data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input name="gender" type="radio" value="prefer_not_to_say"
                               @if($user->gender == 'prefer_not_to_say') checked @endif>prefer not to say
                    </label>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Birth Date</label>
                <input name="birth_date" type="date" id="birth_date" class="date-picker form-control"
                       value="{{$user->birth_date}}">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>National Code</label>
                <input name="national_code" type="text" id="national_code" placeholder="national_code"
                       class="form-control"
                       value="{{$user->national_code}}">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Job</label>
                <input name="job" type="text" id="job" class="form-control"
                       value="{{$user->job}}">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Province</label>
                <select class="form-control" name="province_id">
                    @foreach($provinces as $province)
                        <option value="{{$province->id}}"
                                @if($province->id == $user->province_id) selected @endif> {{$province->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>City</label>
                <select class="form-control" name="city_id">
                    @foreach($cities as $city)
                        <option value="{{$city->id}}"
                                @if($city->id == $user->city_id) selected @endif> {{$city->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Username</label>
                <input name="username" type="text" id="username" class="form-control"
                       value="{{$user->username}}">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Password</label>
                <input name="password" type="password" id="password" class="form-control"
                       value="{{$user->password}}">
            </div>
            <input name="lat" type="hidden" class="form-control" placeholder="lat">
            <input name="lan" type="hidden" class="form-control" placeholder="lan">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <button type="submit" class="btn btn-success">submit</button>
            </div>
        </form>
    </div>
@endsection

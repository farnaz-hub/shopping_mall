@extends('layout')
@section('content')
    <div class="x_content">
        <br/>
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







{{--
    <form method="post" action="{{route('user.update', ['user' => $user])}}">
        @csrf

        <div class="col-md-2">
            <label class="form-label">Name: </label>
            <input class="form-control" name="name" placeholder="name" value="{{$user->name}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Family: </label>
            <input class="form-control" name="family" placeholder="family" value="{{$user->family}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Mobile: </label>
            <input class="form-control" name="mobile" placeholder="mobile" value="{{$user->mobile}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Gender: </label>
            <select name="gender">
                <option value="1">male</option>
                <option value="2">female</option>
                <option value="3">prefer not to say</option>
            </select>
        </div><br>


        <div class="col-md-2">
            <label class="form-label">Birth Date: </label>
            <input class="form-control" name="birth_date" type="date" placeholder="birth_date" value="{{$user->birth_date}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">National Code: </label>
            <input class="form-control" name="national_code" placeholder="optional" value="{{$user->national_code}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Province ID: </label>
            <input class="form-control" name="province_id" placeholder="province" value="{{$user->province_id}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">City ID: </label>
            <input class="form-control" name="city_id" placeholder="city" value="{{$user->city_id}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Job: </label>
            <input class="form-control" name="job" placeholder="job" value="{{$user->job}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Username: </label>
            <input class="form-control" name="username" placeholder="username" value="{{$user->username}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Password: </label>
            <input class="form-control" name="password" placeholder="password" value="{{$user->password}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">LAT: </label>
            <input class="form-control" name="lat" placeholder="lat" value="{{$user->lat}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">LAN: </label>
            <input class="form-control" name="lan" placeholder="lan" value="{{$user->lan}}"><br>
        </div>


        <button type="submit" class="btn btn-secondary">submit</button>
    </form>
--}}

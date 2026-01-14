@extends('layout')
@section('content')
    <div class="x_content">
        <br/>
        <form method="post" action="{{route('user.save')}}" id="demo-form2" data-parsley-validate
              class="form-horizontal form-label-left">
            @csrf

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Name</label>
                <input name="name" type="text" id="name" placeholder="name" class="form-control has-feedback-left">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Family</label>
                <input name="family" type="text" id="family" placeholder="family"
                       class="form-control has-feedback-left">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Mobile</label>
                <input name="mobile" type="text" id="mobile" placeholder="mobile"
                       class="form-control has-feedback-left">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Gender</label>
                <div id="gender" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default" data-toggle-class="btn-primary"
                           data-toggle-passive-class="btn-default">
                        <input name="gender" type="radio" value="1">male
                    </label>
                    <label class="btn btn-default" data-toggle-class="btn-primary"
                           data-toggle-passive-class="btn-default">
                        <input name="gender" type="radio" value="2">female
                    </label>
                    <label class="btn btn-default" data-toggle-class="btn-primary"
                           data-toggle-passive-class="btn-default">
                        <input name="gender" type="radio" value="3">prefer not to say
                    </label>
                </div>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Birth Date</label>
                <input name="birth_date" type="date" id="birth_date" placeholder="birth_date"
                       class="form-control has-feedback-left">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>National Code</label>
                <input name="national_code" type="text" id="national_code" placeholder="national_code"
                       class="form-control has-feedback-left">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Job</label>
                <input name="job" type="text" id="job" placeholder="job" class="form-control has-feedback-left">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Province</label>
                <select class="form-control has-feedback-left" name="province_id">
                    @foreach($provinces as $province)
                        <option value="{{$province->id}}"> {{$province->name}} </option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>City</label>
                <select class="form-control has-feedback-left" name="city_id">
                    @foreach($cities as $city)
                        <option value="{{$city->id}}"> {{$city->name}} </option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Username</label>
                <input name="username" type="text" id="username" placeholder="username"
                       class="form-control has-feedback-left">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Password</label>
                <input name="password" type="password" id="password" placeholder="password"
                       class="form-control has-feedback-left">
            </div>


            <input name="lat" type="hidden" class="form-control" placeholder="lat">


            <input name="lan" type="hidden" class="form-control" placeholder="lan">


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <button type="submit" class="btn btn-success">submit</button>
            </div>
        </form>
    </div>
@endsection






{{--
<form method="post" action="{{route('user.save')}}">
        @csrf

        <div class="row-cols-1">

            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="name" placeholder="name">
                <label>Name: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="family" placeholder="family">
                <label>Family: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="mobile" placeholder="mobile">
                <label>Mobile: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <select class="form-control" name="gender">
                    <option value="1">male</option>
                    <option value="2">female</option>
                    <option value="3">prefer not to say</option>
                </select>
                <label>Gender: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="birth_date" placeholder="birth_date" type="date">
                <label>Birth Date: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="national_code" placeholder="optional">
                <label>National Code:</label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <select class="form-select" name="province_id">
                    @foreach($provinces as $province)
                        <option value="{{$province->id}}">{{$province->name}}</option>
                    @endforeach
                </select>
                <label>Province: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <select class="form-select" name="city_id">
                    @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
                <label>City: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="job" placeholder="job">
                <label>Job: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="username" placeholder="username">
                <label>Username: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="password" placeholder="password" type="password">
                <label>Password: </label>
            </div>


            <input class="form-control" name="lat" placeholder="lat" type="hidden">


            <input class="form-control" name="lan" placeholder="lan" type="hidden">


            <div>
                <button type="submit" class="btn btn-success btn-lg">submit</button>
            </div>
        </div>
    </form>
--}}

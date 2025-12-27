@extends('layout')

@section('content')
    <div class="container-fluid">
        <form method="post" action="{{route('customer.save')}}">
            @csrf


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Name</label>
                <input  name="name" type="text" id="name" placeholder="name" class="form-control">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Family</label>
                <input  name="family" type="text" id="family" placeholder="family" class="form-control">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Mobile</label>
                <input  name="mobile" type="text" id="mobile" placeholder="mobile" class="form-control">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Gender</label>
                <div id="gender" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default">
                        <input name="gender" type="radio" value="1">male
                    </label>
                    <label class="btn btn-default">
                        <input name="gender" type="radio" value="2">female
                    </label>
                    <label class="btn btn-default">
                        <input name="gender" type="radio" value="3">prefer not to say
                    </label>
                </div>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Birth Date</label>
                <input  name="birth_date" type="date" id="birth_date" placeholder="birth_date" class="form-control">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>National Code</label>
                <input  name="national_code" type="text" id="national_code" placeholder="national_code" class="form-control">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Job</label>
                <input  name="job" type="text" id="job" placeholder="job" class="form-control">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Province</label>
                <select class="form-control" name="province_id">
                    @foreach($provinces as $province)
                        <option value="{{$province->id}}"> {{$province->name}} </option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>City</label>
                <select class="form-control" name="city_id">
                    @foreach($cities as $city)
                        <option value="{{$city->id}}"> {{$city->name}} </option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Username</label>
                <input  name="username" type="text" id="username" placeholder="username" class="form-control">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Password</label>
                <input  name="password" type="password" id="password" placeholder="password" class="form-control">
            </div>


            <input name="lat" type="hidden" class="form-control" placeholder="lat">


            <input name="lan" type="hidden" class="form-control" placeholder="lan">


            <div>
                <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                    <label>Address title</label>
                    <input name="title[]" id="title" placeholder="title" class="form-control">
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                    <label>Full address</label>
                    <input name="address[]" id="address" placeholder="address" class="form-control">
                </div>

                <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                    <label>Postal code</label>
                    <input name="postal_code[]" id="postal_code" placeholder="postal_code" class="form-control">
                </div>

                <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                    <label>Unit</label>
                    <input name="unit[]" id="unit" placeholder="unit" class="form-control">
                </div>

                <div class="center">
                    <button class="btn btn-success" style="margin: 20px" onclick="addAddress();return false">+</button>
                </div>
            </div>


            <div class="address-tmp full-address hidden">
                <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                    <label>Address title</label>
                    <input name="title[]" id="title" placeholder="title" class="form-control">
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                    <label>Full address</label>
                    <input name="address[]" id="address" placeholder="address" class="form-control">
                </div>

                <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                    <label>Postal code</label>
                    <input name="postal_code[]" id="postal_code" placeholder="postal_code" class="form-control">
                </div>

                <div class="col-md-2 col-sm-6 col-xs-12 form-group">
                    <label>Unit</label>
                    <input name="unit[]" id="unit" placeholder="unit" class="form-control">
                </div>

                <div class="center">
                    <button class="btn btn-success" style="margin: 20px" onclick="addAddress();return false">+</button>
                    <button class="btn btn-danger" style="margin: 20px" onclick="removeAddress(this);return false">-</button>
                </div>
            </div>

            <div class="addresses"></div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <button type="submit" class="btn btn-success" style="margin: 20px">submit</button>
            </div>
        </form>
    </div>

<script>
    function addAddress(){
        let address = $('.full-address').clone();
        $(address).removeClass('full-address').removeClass('hidden');
        $('.addresses').append(address);
    }

    function removeAddress(el){
        $(el).parents('.address-tmp').first().remove();
    }
</script>
@endsection







{{--
<form method="post" action="{{route('customer.save')}}">
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
        <select class="form-select" name="gender">
            <option value="1">male</option>
            <option value="2">female</option>
            <option value="3">prefer not to say</option>
        </select>
        <label>Gender: </label>
    </div>


    <div class="form-floating mb-3 mt-3">
        <input class="form-control" name="birth_date" type="date" placeholder="birth_date">
        <label>Birth Date: </label>
    </div>


    <div class="form-floating mb-3 mt-3">
        <input class="form-control" name="national_code" placeholder="optional">
        <label>National Code: </label>
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

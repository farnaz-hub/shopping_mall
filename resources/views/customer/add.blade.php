@extends('layout')
@section('content')
    <div class="container-fluid">
        <form method="post" action="{{route('customer.save')}}">
            @csrf
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Name</label>
                <input name="name" type="text" id="name" placeholder="name"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Family</label>
                <input name="family" type="text" id="family" placeholder="family" class="form-control">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label for="mobile">Mobile</label>
                <input name="mobile" type="text" id="mobile" placeholder="mobile"
                       class="form-control @error('mobile') is-invalid @enderror">
                @error('mobile')
                <div class="alert-danger">{{$message}}</div>
                @enderror
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
                <input name="birth_date" type="date" id="birth_date" placeholder="birth_date" class="form-control">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>National Code</label>
                <input name="national_code" type="text" id="national_code" placeholder="national_code"
                       class="form-control">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Job</label>
                <input name="job" type="text" id="job" placeholder="job" class="form-control">
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
                <input name="username" type="text" id="username" placeholder="username" class="form-control">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Password</label>
                <input name="password" type="password" id="password" placeholder="password"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <div class="alert-danger">{{$message}}</div>
                @enderror
            </div>
            <input name="lat" type="hidden" class="form-control" placeholder="lat">
            <input name="lan" type="hidden" class="form-control" placeholder="lan">
            <div>                                                     {{-- Address --}}
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
            <div class="address-tmp full-address hidden">             {{-- Hidden Address --}}
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
                    <button class="btn btn-danger" style="margin: 20px" onclick="removeAddress(this);return false">-
                    </button>
                </div>
            </div>
            <div class="addresses"></div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <button type="submit" class="btn btn-success" style="margin: 20px">submit</button>
            </div>
        </form>
    </div>

    <script>
        function addAddress() {
            let address = $('.full-address').clone();                       //clone--> make a copy from selected element
            $(address).removeClass('full-address').removeClass('hidden');   //removeClass('hidden')--> removing hidden feature from div
            $('.addresses').append(address);                                //removeClass('full-address')--> removing 'full-address' name from div in order to stop selecting it again from selector($.'full-address')
        }

        function removeAddress(el) {
            $(el).parents('.address-tmp').first().remove();
        }
    </script>
@endsection

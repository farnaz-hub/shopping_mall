@extends('layout')
@section('content')
    <div class="container-fluid">
        <form method="post" action="{{route('customer.save')}}">
            @csrf
            <x-input label="Name" name="name" type="text" id="name" placeholder="name"/>
            <x-input label="Family" name="family" type="text" id="family" placeholder="family"/>
            <x-input label="Mobile" name="mobile" type="number" id="mobile" placeholder="mobile"/>
            <x-select label="Gender" id="gender" name="gender" :values="[1 => 'male', 2 => 'female', 3 => 'prefer not to say']"/>
            <x-input label="Birth Date" name="birth_date" type="date" id="birth_date" placeholder="birth date"/>
            <x-input label="National Code" name="national_code" type="text" id="national_code" placeholder="national_code"/>
            <x-input label="Job" name="job" type="text" id="job" placeholder="job"/>
            <x-province-city/>
            <x-input label="Username" name="username" type="text" id="username" placeholder="username"/>
            <x-input label="Password" name="password" type="password" id="password" placeholder="password"/>
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


{{--            <div class="col-md-6 col-sm-6 col-xs-12 form-group">--}}
{{--                <label>Name</label>--}}
{{--                <input name="name" type="text" id="name" placeholder="name"--}}
{{--                       class="form-control @error('name') is-invalid @enderror">--}}
{{--                @error('name')--}}
{{--                <div class="alert-danger">{{$message}}</div>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-sm-6 col-xs-12 form-group">--}}
{{--                <label>Password</label>--}}
{{--                <input name="password" type="password" id="password" placeholder="password"--}}
{{--                       class="form-control @error('password') is-invalid @enderror">--}}
{{--                @error('password')--}}
{{--                <div class="alert-danger">{{$message}}</div>--}}
{{--                @enderror--}}
{{--            </div>--}}

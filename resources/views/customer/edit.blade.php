@extends('layout')

@section('content')
    <div class="container-fluid">
        <br/>
        <form method="post" action="{{route('customer.update', ['customer' => $customer])}}" id="demo-form2"
              data-parsley-validate class="form-horizontal form-label-left">
            @csrf


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Name</label>
                <input name="name" type="text" id="name" placeholder="name" class="form-control has-feedback-left"
                       value="{{$customer->name}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Family</label>
                <input name="family" type="text" id="family" class="form-control has-feedback-left"
                       value="{{$customer->family}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Mobile</label>
                <input name="mobile" type="text" id="mobile" class="form-control has-feedback-left"
                       value="{{$customer->mobile}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Gender</label>
                <div id="gender" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default @if($customer->gender == 1) active @endif"
                           data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input name="gender" type="radio" value="1" @if($customer->gender == 1) checked @endif>male
                    </label>
                    <label class="btn btn-default @if($customer->gender == 2) active @endif"
                           data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input name="gender" type="radio" value="2" @if($customer->gender == 2) checked @endif>female
                    </label>
                    <label class="btn btn-default @if($customer->gender == 3) active @endif"
                           data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input name="gender" type="radio" value="3" @if($customer->gender == 3) checked @endif>prefer
                        not to say
                    </label>
                </div>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Birth Date</label>
                <input name="birth_date" type="date" id="birth_date" class="date-picker form-control has-feedback-left"
                       value="{{$customer->birth_date}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>National Code</label>
                <input name="national_code" type="text" id="national_code" placeholder="national_code"
                       class="form-control has-feedback-left"
                       value="{{$customer->national_code}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Job</label>
                <input name="job" type="text" id="job" class="form-control has-feedback-left"
                       value="{{$customer->job}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Province</label>
                <select class="form-control" name="province_id">
                    @foreach($provinces as $province)
                        <option value="{{$province->id}}"
                                @if($province->id == $customer->province_id) selected @endif> {{$province->name}} </option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>City</label>
                <select class="form-control" name="city_id">
                    @foreach($cities as $city)
                        <option value="{{$city->id}}"
                                @if($city->id == $customer->city_id) selected @endif> {{$city->name}} </option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Username</label>
                <input name="username" type="text" id="username" class="form-control has-feedback-left"
                       value="{{$customer->username}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Password</label>
                <input name="password" type="password" id="password" class="form-control has-feedback-left"
                       value="{{$customer->password}}">
            </div>


            <input name="lat" type="hidden" class="form-control" placeholder="lat">

            <input name="lan" type="hidden" class="form-control" placeholder="lan">


            <div class="address-tmp full-address hidden">

                <input name="address_id[]" value="" type="hidden"> //to stop the repetition of ids

                <div class="col-md-2 col-sm-6 col-xs-12 form-group has-feedback">
                    <label>Address title</label>
                    <input name="title[]" id="title" placeholder="title" class="form-control has-feedback-left"
                           value="{{$customer->title}}">
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                    <label>Full address</label>
                    <input name="address[]" id="address" placeholder="address" class="form-control has-feedback-left"
                           value="{{$customer->address}}">
                </div>

                <div class="col-md-2 col-sm-6 col-xs-12 form-group has-feedback">
                    <label>Postal code</label>
                    <input name="postal_code[]" id="postal_code" placeholder="postal_code"
                           class="form-control has-feedback-left"
                           value="{{$customer->postal_code}}">
                </div>

                <div class="col-md-2 col-sm-6 col-xs-12 form-group has-feedback">
                    <label>Unit</label>
                    <input name="unit[]" id="unit" placeholder="unit" class="form-control has-feedback-left"
                           value="{{$customer->unit}}">
                </div>

                <div class="center">
                    <button class="btn btn-success" style="margin: 20px" onclick="addAddress();return false">+</button>
                    <button class="btn btn-danger" style="margin: 20px" onclick="removeAddress(this);return false">-
                    </button>
                </div>
            </div>

            <div class="addresses">
                @foreach($customer->addresses as $address)
                    <div class="address-tmp">

                        <input name="address_id[]" value="{{$address->id}}" type="hidden">

                        <div class="col-md-2 col-sm-6 col-xs-12 form-group has-feedback">
                            <label>Address title</label>
                            <input name="title[]" id="title" placeholder="title" class="form-control has-feedback-left"
                                   value="{{$address->title}}">
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                            <label>Full address</label>
                            <input name="address[]" id="address" placeholder="address"
                                   class="form-control has-feedback-left"
                                   value="{{$address->address}}">
                        </div>

                        <div class="col-md-2 col-sm-6 col-xs-12 form-group has-feedback">
                            <label>Postal code</label>
                            <input name="postal_code[]" id="postal_code" placeholder="postal_code"
                                   class="form-control has-feedback-left"
                                   value="{{$address->postal_code}}">
                        </div>

                        <div class="col-md-2 col-sm-6 col-xs-12 form-group has-feedback">
                            <label>Unit</label>
                            <input name="unit[]" id="unit" placeholder="unit" class="form-control has-feedback-left"
                                   value="{{$address->unit}}">
                        </div>

                        <div class="center">
                            <button class="btn btn-success" style="margin: 20px" onclick="addAddress();return false">+
                            </button>
                            @if($loop->index)
                                <button class="btn btn-danger" style="margin: 20px"
                                        onclick="removeAddress(this);return false">-
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <button type="submit" class="btn btn-success" style="margin: 20px">submit</button>
            </div>
        </form>
    </div>

    <script>
        function addAddress() {
            let address = $('.full-address').clone();
            $(address).removeClass('full-address').removeClass('hidden');
            $('.addresses').append(address);
        }

        function removeAddress(el) {
            $(el).parents('.address-tmp').first().remove();
        }
    </script>
@endsection







{{--
    <form method="post" action="{{route('customer.update', ['customer' => $customer])}}">
        @csrf

        <div class="col-md-2">
            <label class="form-label">Name: </label>
            <input class="form-control" name="name" placeholder="name" value="{{$customer->name}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Family: </label>
            <input class="form-control" name="family" placeholder="family" value="{{$customer->family}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Mobile: </label>
            <input class="form-control" name="mobile" placeholder="mobile" value="{{$customer->mobile}}"><br>
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
            <input class="form-control" name="birth_date" type="date" placeholder="birth_date" value="{{$customer->birth_date}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">National Code: </label>
            <input class="form-control" name="national_code" placeholder="optional" value="{{$customer->national_code}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Province ID: </label>
            <input class="form-control" name="province_id" placeholder="province" value="{{$customer->province_id}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">City ID: </label>
            <input class="form-control" name="city_id" placeholder="city" value="{{$customer->city_id}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Job: </label>
            <input class="form-control" name="job" placeholder="job" value="{{$customer->job}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Username: </label>
            <input class="form-control" name="username" placeholder="username" value="{{$customer->username}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Password: </label>
            <input class="form-control" name="password" placeholder="password" value="{{$customer->password}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">LAT: </label>
            <input class="form-control" name="lat" placeholder="lat" value="{{$customer->lat}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">LAN: </label>
            <input class="form-control" name="lan" placeholder="lan" value="{{$customer->lan}}"><br>
        </div>


        <button type="submit" class="btn btn-secondary">submit</button>
    </form>
--}}

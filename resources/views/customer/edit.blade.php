@extends('layout')
@section('content')
    <div class="container-fluid">
        <form method="post" action="{{route('customer.update', ['customer' => $customer])}}"
              class="form-horizontal form-label-left">
            @csrf


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Name</label>
                <input name="name" type="text" id="name" placeholder="name" class="form-control"
                       value="{{$customer->name}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Family</label>
                <input name="family" type="text" id="family" class="form-control"
                       value="{{$customer->family}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Mobile</label>
                <input name="mobile" type="text" id="mobile" class="form-control"
                       value="{{$customer->mobile}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Gender</label>
                <div id="gender" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default @if($customer->gender == 1) active @endif">
                        <input name="gender" type="radio" value="1" @if($customer->gender == 1) checked @endif>male
                    </label>
                    <label class="btn btn-default @if($customer->gender == 2) active @endif">
                        <input name="gender" type="radio" value="2" @if($customer->gender == 2) checked @endif>female
                    </label>
                    <label class="btn btn-default @if($customer->gender == 3) active @endif">
                        <input name="gender" type="radio" value="3" @if($customer->gender == 3) checked @endif>prefer
                        not to say
                    </label>
                </div>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Birth Date</label>
                <input name="birth_date" type="date" id="birth_date" class="date-picker form-control"
                       value="{{$customer->birth_date}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>National Code</label>
                <input name="national_code" type="text" id="national_code" placeholder="national_code"
                       class="form-control"
                       value="{{$customer->national_code}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Job</label>
                <input name="job" type="text" id="job" class="form-control"
                       value="{{$customer->job}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Province</label>
                <select class="form-control" name="province_id">
                    @foreach($provinces as $province)
                        <option value="{{$province->id}}"
                                @if($province->id == $customer->province_id) selected @endif> {{$province->name}} </option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>City</label>
                <select class="form-control" name="city_id">
                    @foreach($cities as $city)
                        <option value="{{$city->id}}"
                                @if($city->id == $customer->city_id) selected @endif> {{$city->name}} </option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Username</label>
                <input name="username" type="text" id="username" class="form-control"
                       value="{{$customer->username}}">
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label>Password</label>
                <input name="password" type="password" id="password" class="form-control"
                       value="{{$customer->password}}">
            </div>


            <input name="lat" type="hidden" class="form-control" placeholder="lat">

            <input name="lan" type="hidden" class="form-control" placeholder="lan">


            <div class="address-tmp full-address hidden">  {{-- empty template for + button --}}

                <input name="address_id[]" value="" type="hidden"> {{-- to stop the repetition of ids --}}

                <div class="col-md-2 col-sm-6 col-xs-12 form-group ">
                    <label>Address title</label>
                    <input name="title[]" id="title" placeholder="title" class="form-control"
                           value="">
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12 form-group ">
                    <label>Full address</label>
                    <input name="address[]" id="address" placeholder="address" class="form-control"
                           value="">
                </div>

                <div class="col-md-2 col-sm-6 col-xs-12 form-group ">
                    <label>Postal code</label>
                    <input name="postal_code[]" id="postal_code" placeholder="postal_code"
                           class="form-control"
                           value="">
                </div>

                <div class="col-md-2 col-sm-6 col-xs-12 form-group ">
                    <label>Unit</label>
                    <input name="unit[]" id="unit" placeholder="unit" class="form-control"
                           value="">
                </div>

                <div class="center">
                    <button class="btn btn-success" style="margin: 20px" onclick="addAddress();return false">+</button>
                    <button class="btn btn-danger" style="margin: 20px" onclick="removeAddress(this);return false">-
                    </button>
                </div>
            </div>

            @if(! $customer->addresses()->count())
                {{-- For those who dosent have address --}}  {{-- count()-->counting the number of customer's addresses --}}
                <div class="address-tmp">

                    <input name="address_id[]" value="" type="hidden">

                    <div class="col-md-2 col-sm-6 col-xs-12 form-group ">
                        <label>Address title</label>
                        <input name="title[]" id="title" placeholder="title" class="form-control"
                               value="">
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 form-group ">
                        <label>Full address</label>
                        <input name="address[]" id="address" placeholder="address" class="form-control"
                               value="">
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12 form-group ">
                        <label>Postal code</label>
                        <input name="postal_code[]" id="postal_code" placeholder="postal_code"
                               class="form-control"
                               value="">
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12 form-group ">
                        <label>Unit</label>
                        <input name="unit[]" id="unit" placeholder="unit" class="form-control"
                               value="">
                    </div>

                    <div class="center">
                        <button class="btn btn-success" style="margin: 20px" onclick="addAddress();return false">+
                        </button>
                    </div>
                </div>
            @endif

            <div class="addresses">
                @foreach($customer->addresses as $address)
                    <div class="address-tmp">

                        <input name="address_id[]" value="{{$address->id}}" type="hidden">

                        <div class="col-md-2 col-sm-6 col-xs-12 form-group ">
                            <label>Address title</label>
                            <input name="title[]" id="title" placeholder="title" class="form-control"
                                   value="{{$address->title}}">
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12 form-group ">
                            <label>Full address</label>
                            <input name="address[]" id="address" placeholder="address"
                                   class="form-control"
                                   value="{{$address->address}}">
                        </div>

                        <div class="col-md-2 col-sm-6 col-xs-12 form-group ">
                            <label>Postal code</label>
                            <input name="postal_code[]" id="postal_code" placeholder="postal_code"
                                   class="form-control"
                                   value="{{$address->postal_code}}">
                        </div>

                        <div class="col-md-2 col-sm-6 col-xs-12 form-group ">
                            <label>Unit</label>
                            <input name="unit[]" id="unit" placeholder="unit" class="form-control"
                                   value="{{$address->unit}}">
                        </div>

                        <div class="center">
                            <button class="btn btn-success" style="margin: 20px" onclick="addAddress();return false">+
                            </button>
                            @if($loop->index)
                                {{-- hiding remove button for first item --}}
                                <button class="btn btn-danger" style="margin: 20px"
                                        onclick="removeAddress(this);return false">-
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
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

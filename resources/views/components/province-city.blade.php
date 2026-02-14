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

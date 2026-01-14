<div class="container-fluid">
    <div class="table-responsive">
        <input type="hidden" name="customer_id" value="{{$address->customer->id}}">

        <form id="editAddress" method="post" action="{{route('address.update', ['address' => $address])}}">
            @csrf

            <div class="form-group col-md-4">
                <label>Title</label>
                <input name="title" class="form-control" value="{{$address->title}}">
            </div>

            <div class="form-group col-md-8">
                <label>Address</label>
                <textarea name="address" class="form-control" cols="7"> {{$address->address}} </textarea>
            </div>

            <div class="form-group col-md-3">
                <label>Postal Code</label>
                <input name="postal_code" class="form-control" value="{{$address->postal_code}}">
            </div>

            <div class="form-group col-md-3">
                <label>Unit</label>
                <input name="unit" class="form-control" value="{{$address->unit}}">
            </div>

            <div>
                <button type="submit" style="margin: 20px" class="btn btn-success"
                        onclick="updateAddress(this); return false;">Submit
                </button>
            </div>
        </form>
    </div>
</div>

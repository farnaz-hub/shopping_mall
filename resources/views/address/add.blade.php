<div class="container-fluid">
    <div class="table-responsive">
        <input type="hidden" name="customer_id" value="{{$customer->id}}">

        <form id="saveAddress" method="post" action="{{route('address.save', ['customer' => $customer])}}">
            @csrf

            <div class="form-group col-md-4">
                <label>Title</label>
                <input name="title" class="form-control">
            </div>

            <div class="form-group col-md-8">
                <label>Address</label>
                <textarea name="address" class="form-control" cols="7"></textarea>
            </div>

            <div class="form-group col-md-3">
                <label>Postal Code</label>
                <input name="postal_code" class="form-control">
            </div>

            <div class="form-group col-md-3">
                <label>Unit</label>
                <input name="unit" class="form-control">
            </div>

            <div>
                <button type="submit" class="btn btn-success" onclick="saveAddress(this); return false;">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>

</script>

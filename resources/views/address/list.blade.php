<div class="container-fluid">
    <input type="hidden" name="customer_id" value="{{$customer->id}}">
    <a href="{{route('address.add', ['customer' => $customer])}}" onclick="addAddress(this);return false;" class="btn btn-success m-5">
        <i class="fa fa-plus"></i>
        Adding address
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th class="text-center">Title</th>
                <th class="text-center">Address</th>
                <th class="text-center">Postal Code</th>
                <th class="text-center">Unit</th>
                <th class="text-center">Operations</th>
            </tr>
            </thead>

            @foreach($customer->addresses as $address)
                <tr>
                    <td class="text-center"> {{$address->title}} </td>
                    <td class="text-center"> {{$address->address}} </td>
                    <td class="text-center"> {{$address->postal_code}} </td>
                    <td class="text-center"> {{$address->unit}} </td>
                    <td class="text-center">
                        <a href="{{route('address.show', ['address' => $address])}}" onclick="showAddress(this);return false;" class="btn btn-warning btn-sm fa fa-edit">Edit</a>
                        <a href="{{route('address.delete', ['address' => $address])}}" onclick="removeAddress(this);return false;" class="btn btn-danger btn-sm fa fa-minus-circle">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>


        <div id="addAddress" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content -->
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Adding Address</h4>
                    </div>

                    <div class="modal-body">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function addAddress(el)
    {
        $.ajax({
            url: $(el).attr('href'),
            method: 'GET',
            success: function(result)
            {
                $('.modal-body').html(result.body);
            }
        })
    }


    function saveAddress()
    {
        $.ajax({
            url: $('#saveAddress').attr('action'),
            method: 'POST',
            data: $('#saveAddress').serializeArray(),
            success: function (result)
            {
                $.ajax({
                    url: '{{route('address.list', ['customer' => '!id!'])}}'.replace('!id!', $('[name="customer_id"]').val()),
                    method: "GET",
                    success: function (result) {
                        $('.modal-body').html(result);
                    }
                })
            }
        })
    }


    function showAddress(el)
    {
        $.ajax({
            url: $(el).attr('href'),
            method: 'GET',
            success: function(result)
            {
                $('.modal-body').html(result);
            }
        })
    }


    function updateAddress()
    {
        $.ajax({
            url: $('#editAddress').attr('action'),
            method: 'POST',
            data: $('#editAddress').serializeArray(),
            success: function(result)
            {
                $.ajax({
                    url: '{{route('address.list', ['customer' => '!id!'])}}'.replace('!id!', $('[name="customer_id"]').val()),
                    method: 'GET',
                    success: function (result)
                    {
                        $('.modal-body').html(result);
                    }
                })
            }
        })
    }


    function removeAddress(el)
    {
        $.ajax({
            url: $(el).attr('href'),
            method: 'DELETE',
            data: {
                _token: '{{csrf_token()}}'
            },
            success: function(result)
            {
                $.ajax({
                    url: '{{route('address.list', ['customer' => '!id!'])}}'.replace('!id!', $('[name="customer_id"]').val()),
                    method: 'GET',
                    success: function(result)
                    {
                        $('.modal-body').html(result);
                    }
                })
            }
        })
    }
</script>

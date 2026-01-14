@extends('layout')
@section('content')
    <div class="mb-2 mt-2"><a href="{{route('customer.add')}}" class="btn btn-info fa fa-plus">ADD</a></div>
    <table class="table table-striped">
        <thead class="table-dark">
        <tr>
            <th class="text-center">Name</th>
            <th class="text-center">Family</th>
            <th class="text-center">Mobile</th>
            <th class="text-center">Gender</th>
            <th class="text-center">Birth Date</th>
            <th class="text-center">National Code</th>
            <th class="text-center">Province</th>
            <th class="text-center">City</th>
            <th class="text-center">Job</th>
            <th class="text-center">Username</th>
            <th class="text-center">Operations</th>
        </tr>
        </thead>
        <tbody class="text-center">
        @foreach($customers as $customer)
            <tr>
                <td>{{$customer->name}}</td>
                <td>{{$customer->family}}</td>
                <td>{{$customer->mobile}}</td>
                <td>@if($customer->gender == 1)
                        male
                    @elseif($customer->gender == 2)
                        female
                    @else
                        prefer no to say
                    @endif</td>
                <td>{{$customer->birth_date}}</td>
                <td>{{$customer->national_code}}</td>
                <td>{{$customer->province->name}}</td>
                <td>{{$customer->city->name}}</td>
                <td>{{$customer->job}}</td>
                <td>{{$customer->username}}</td>
                <td>
                    <div class="d-grid gap-2">
                        <a href="{{route('customer.show', ['customer' => $customer])}}"
                           class="btn btn-warning btn-sm fa fa-edit">Edit</a>
                        <a href="{{route('customer.delete', ['customer' => $customer])}}"
                           class="btn btn-danger btn-sm fa fa-minus-circle">Delete</a>
                        <a href="{{route('address.list', ['customer' => $customer])}}"
                           class="btn btn-success btn-sm fa fa-address-book-o"
                           onclick="openAddress(this); return false;">Addresses</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="listAddress" class="modal fade" role="dialog">               {{-- Address Modal --}}
        <div class="modal-dialog">
            <!-- Modal content -->
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Addresses</h4>
                </div>

                <div class="modal-body">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openAddress(el) {
            $.ajax({
                url: $(el).attr('href'),
                method: 'GET',
                success: function (result) {
                    $('.modal-body').html(result);
                    $('#listAddress').modal('toggle');
                }
            })
        }
    </script>
@endsection

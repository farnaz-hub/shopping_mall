<html>
<head>
    <link href="{{asset('files/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('files/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
<div class="container">
    <div class="mb-2 mt-2"><a href="{{route('customer.add')}}" class="btn btn-info">ADD</a></div>

    <table class="table table-striped">
        <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Family</th>
            <th>Mobile</th>
            <th>Gender</th>
            <th>Birth Date</th>
            <th>National Code</th>
            <th>Province</th>
            <th>City</th>
            <th>Job</th>
            <th>Username</th>
            <th>Password</th>
            <th>LAT</th>
            <th>LAN</th>
            <th>Operations</th>
        </tr>
        </thead>

        @foreach($customers as $customer)
            <tr>
                <td>{{$customer->name}}</td>
                <td>{{$customer->family}}</td>
                <td>{{$customer->mobile}}</td>
                <td>{{$customer->gender}}</td>
                <td>{{$customer->birth_date}}</td>
                <td>{{$customer->national_code}}</td>
                <td>{{$customer->province_id}}</td>
                <td>{{$customer->city_id}}</td>
                <td>{{$customer->job}}</td>
                <td>{{$customer->username}}</td>
                <td>{{$customer->password}}</td>
                <td>{{$customer->lat}}</td>
                <td>{{$customer->lan}}</td>
                <td>
                    <div class="d-grid gap-2">
                        <a href="{{route('customer.show', ['customer' => $customer])}}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{route('customer.delete', ['customer' => $customer])}}" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</body>

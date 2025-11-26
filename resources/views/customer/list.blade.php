<html>
<head>
    <link href="{{asset('files/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('files/bootstrap.bundle.min.js')}}"></script>
</head>

<body>
<div class="container">
    <div><a href="{{route('customer.add')}}">ADD</a></div>

    <table class="table table-striped">
        <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Family</th>
            <th>Mobile</th>
            <th>Gender</th>
            <th>Birth Date</th>
            <th>National Code</th>
            <th>Province ID</th>
            <th>City ID</th>
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
                    <a href="{{route('customer.show', ['customer' => $customer])}}">Edit</a>
                    <a href="{{route('customer.delete', ['customer' => $customer])}}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</body>

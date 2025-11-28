<html>
<head>
    <link href="{{asset('files/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('files/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
<div class="container">
    <form method="post" action="{{route('user.update', ['user' => $user])}}">
        @csrf

        <div class="col-md-2">
            <label class="form-label">Name: </label>
            <input class="form-control" name="name" placeholder="name" value="{{$user->name}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Family: </label>
            <input class="form-control" name="family" placeholder="family" value="{{$user->family}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Mobile: </label>
            <input class="form-control" name="mobile" placeholder="mobile" value="{{$user->mobile}}"><br>
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
            <input class="form-control" name="birth_date" type="date" placeholder="birth_date" value="{{$user->birth_date}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">National Code: </label>
            <input class="form-control" name="national_code" placeholder="optional" value="{{$user->national_code}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Province ID: </label>
            <input class="form-control" name="province_id" placeholder="province" value="{{$user->province_id}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">City ID: </label>
            <input class="form-control" name="city_id" placeholder="city" value="{{$user->city_id}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Job: </label>
            <input class="form-control" name="job" placeholder="job" value="{{$user->job}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Username: </label>
            <input class="form-control" name="username" placeholder="username" value="{{$user->username}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">Password: </label>
            <input class="form-control" name="password" placeholder="password" value="{{$user->password}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">LAT: </label>
            <input class="form-control" name="lat" placeholder="lat" value="{{$user->lat}}"><br>
        </div>


        <div class="col-md-2">
            <label class="form-label">LAN: </label>
            <input class="form-control" name="lan" placeholder="lan" value="{{$user->lan}}"><br>
        </div>


        <button type="submit" class="btn btn-secondary">submit</button>
    </form>
</div>
</body>
</html>

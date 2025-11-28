<html>
<head>
    <link href="{{asset('files/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('files/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
<div class="container">
    <form method="post" action="{{route('user.save')}}">
        @csrf

        <div class="row-cols-1">

            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="name" placeholder="name">
                <label>Name: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="family" placeholder="family">
                <label>Family: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="mobile" placeholder="mobile">
                <label>Mobile: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <select class="form-control" name="gender">
                    <option value="1">male</option>
                    <option value="2">female</option>
                    <option value="3">prefer not to say</option>
                </select>
                <label>Gender: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="birth_date" placeholder="birth_date" type="date">
                <label>Birth Date: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="national_code" placeholder="optional">
                <label>National Code:</label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <select class="form-select" name="province_id">
                    @foreach($provinces as $province)
                        <option value="{{$province->id}}">{{$province->name}}</option>
                    @endforeach
                </select>
                <label>Province: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <select class="form-select" name="city_id">
                    @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
                <label>City: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="job" placeholder="job">
                <label>Job: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="username" placeholder="username">
                <label>Username: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="password" placeholder="password">
                <label>Password: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="lat" placeholder="lat">
                <label>LAT: </label>
            </div>


            <div class="form-floating mb-3 mt-3">
                <input class="form-control" name="lan" placeholder="lan">
                <label>LAN: </label>
            </div>


            <div>
                <button type="submit" class="btn btn-success btn-lg">submit</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>

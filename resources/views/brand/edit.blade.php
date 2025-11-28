<html>
<head>
    <link href="{{asset('files/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('files/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
<div class="container mt-3">
    <form method="post" action="{{route('brand.update', ['brand' => $brand])}}">
        @csrf

        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="title" placeholder="name" value="{{$brand->title}}">
            <label>Title: </label>
        </div>

        <div>
            <button type="submit" class="btn btn-success btn-lg">submit</button>
        </div>
    </form>
</div>
</body>
</html>

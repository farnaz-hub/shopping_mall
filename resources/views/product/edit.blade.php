<html>
<head>
    <link href="{{asset('files/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('files/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
<div class="container">
    <form method="post" action="{{route('product.update', ['product' => $product])}}">
        @csrf

        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="title" placeholder="title" value="{{$product->title}}">
            <label>Title: </label>
        </div>


        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="description" placeholder="description" value="{{$product->description}}">
            <label>Description: </label>
        </div>


        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="slug" placeholder="slug" value="{{$product->slug}}">
            <label>Slug: </label>
        </div>


        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="image" placeholder="image" value="{{$product->image}}">
            <label>Image: </label>
        </div>


        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="brand_id" placeholder="brand_id" value="{{$product->brand_id}}">
            <label>Brand: </label>
        </div>


        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="unlimited_inventory" placeholder="unlimited_inventory" value="{{$product->unlimite_inventory}}">
            <label>Unlimited Inventory: </label>
        </div>


        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="max_order" placeholder="max_order" value="{{$product->max_order}}">
            <label>Max Order: </label>
        </div>


        <div class="form-floating mb-3 mt-3">
            <input class="form-control" name="warning_border" placeholder="warning_border" value="{{$product->warning_border}}">
            <label>Warning Border: </label>
        </div>


        <div>
            <button type="submit" class="btn btn-success btn-lg">submit</button>
        </div>
    </form>
</div>
</body>
</html>

<html>
<head>
    <link href="{{asset('files/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('files/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
<div class="container">
    <div class="mb-2 mt-2"><a href="{{route('product.add')}}" class="btn btn-info">ADD</a></div>

    <table class="table table-striped">
        <thead class="table-dark">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Slug</th>
            <th>Image</th>
            <th>Brand</th>
            <th>Unlimited Inventory</th>
            <th>Max Order</th>
            <th>Warning Border</th>
            <th>Operations</th>
        </tr>
        </thead>

        @foreach($products as $product)
            <tr>
                <td>{{$product->title}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->slug}}</td>
                <td>{{$product->image}}</td>
                <td>{{$product->brand_id}}</td>
                <td>{{$product->unlimited_inventory}}</td>
                <td>{{$product->max_order}}</td>
                <td>{{$product->warning_border}}</td>
                <td>
                    <div class="d-grid gap-2">
                        <a href="{{route('product.show', ['product' => $product])}}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{route('product.delete', ['product' => $product])}}" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>

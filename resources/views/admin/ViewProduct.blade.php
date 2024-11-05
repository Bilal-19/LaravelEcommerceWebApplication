<!DOCTYPE html>
<html>

<head>
    @include('AdminLayout.CSS')
    <style>
        table {
            color: white;
        }
    </style>
</head>

<body>
    @include('AdminLayout.header')
    @include('AdminLayout.Sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center">View Products</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('view.product')}}" method="get">
                            @csrf
                            <div class="input-group">
                                <input type="search" name="search" class="form-control">
                                <button class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Preview Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="align-middle">{{ $product->id }}</td>
                                    <td>
                                        <img src="{{ asset("products/$product->image") }}" alt="..."
                                            class="card-img-top"
                                            style="height: 100px; width: 100px; object-fit:cover; border-radius:50%;">
                                    </td>
                                    <td class="align-middle">{{ $product->title }}</td>
                                    <td class="align-middle">{!! Str::limit($product->description, 15) !!}</td>
                                    <td class="align-middle">{{ $product->price }}</td>
                                    <td class="align-middle">{{ $product->category }}</td>
                                    <td class="align-middle">{{ $product->quantity }}</td>
                                    <td class="align-middle">
                                        <a href="{{ route('edit.product', $product->id) }}" class="fa fa-pencil"></a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('delete.product', $product->id) }}" class="fa fa-trash"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="col-md-12 mt-2 d-flex justify-content-center">
                        {{-- {{ $products->onEachSide(1)->links() }} --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/charts-home.js') }}"></script>
    <script src="{{ asset('assets/js/front.js') }}"></script>

    <script>
        function confirmation(ev) {
            ev.preventDefault()
            let urlToRedirect = ev.currentTarget.getAttribute('href')
            swal({
                title: 'Are you sure to delete this?'
                text: 'This delete will be permanent',
                icon: 'Warning',
                buttons: true,
                dangerMode: true
            }).then(
                (willCancel) => {
                    if (willCancel) {
                        window.location.href = urlToRedirect;
                    }
                }
            )
        }
    </script>
</body>

</html>

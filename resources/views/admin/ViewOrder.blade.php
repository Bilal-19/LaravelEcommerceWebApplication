<!DOCTYPE html>
<html>

<head>
    @include('AdminLayout.CSS')
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
                        <h4 class="text-center">View Orders</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Product Title</th>
                                <th>Price</th>
                                <th>Update Order Status</th>
                                <th>Print PDF</th>
                            </tr>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>
                                        @if ($order->status == 'in progress')
                                            <span class="text-secondary">{{ $order->status }}</span>
                                        @elseif ($order->status == 'On the way')
                                        <span class="text-primary">{{ $order->status }}</span>
                                        @elseif ($order->status == 'Delivered')
                                        <span class="text-success">{{ $order->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->product->title }}</td>
                                    <td>{{ $order->product->price }}</td>
                                    <td>
                                        <a href="{{ route('update.status', $order->id) }}"
                                            class="btn btn-primary btn-sm {{ $order->status == 'Delivered' ? 'disabled' : '' }}">Update
                                            Status</a>
                                    </td>
                                    <td>
                                        <a href="{{route('printPDF', $order->id)}}" class="btn btn-secondary btn-sm">Print PDF</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
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

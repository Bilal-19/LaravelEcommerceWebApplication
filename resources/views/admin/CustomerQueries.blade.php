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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center">Customer Inquiries</h4>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped">
                            <tr class="text-light">
                                <th>Customer ID</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Message</th>
                            </tr>
                            @foreach ($allInquiries as $query)
                                <tr>
                                    <td>{{$query->id}}</td>
                                    <td>{{$query->username}}</td>
                                    <td>{{$query->useremail}}</td>
                                    <td>{{$query->usermessage}}</td>
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
</body>

</html>

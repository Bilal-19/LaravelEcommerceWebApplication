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
                        <h4 class="text-center">Update Category</h4>
                    </div>
                </div>
                <div class="row mt-2 mb-5">
                    <div class="col-md-6 mx-auto">
                        <form action="{{ route('update.category', $findCategory->id) }}" method="post">
                            @csrf

                            <input type="text" name="category" class="form-control"
                                value="{{ $findCategory->category_name }}">
                            <button class="btn btn-primary mt-2">Update Category</button>

                            <small class="text-danger">
                                @error('category')
                                    {{ $message }}
                                @enderror
                            </small>
                        </form>
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

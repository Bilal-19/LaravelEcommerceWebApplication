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
                        <h4 class="text-center">Add New Category</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <form action="{{ route('add.category') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="category" class="form-control">
                                <button class="btn btn-primary">Add Category</button>
                            </div>
                            <small class="text-danger">
                                @error('category')
                                    {{ $message }}
                                @enderror
                            </small>
                        </form>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-8">
                        <table class="table table-bordered table-striped text-light">
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            @foreach ($category as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->category_name }}</td>
                                    <td class="text-center">
                                        <a
                                            href="{{ route('edit.category', $value->id) }}" class="fa fa-pencil"
                                            title="Edit"></a>
                                    </td>
                                    <td class="text-center">
                                        <a onclick="confirmation(event)"
                                            href="{{ route('delete.category', $value->id) }}" class="fa fa-trash"
                                            title="Delete"></a>
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
                icon: 'warning',
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

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
                        <h4 class="text-center">Edit Products</h4>
                    </div>
                </div>
                <div class="row mt-2 mb-5">
                    <div class="col-md-12">
                        <form action="{{ route('update.product', $findProduct->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6 mx-auto">
                                <label for="title" class="form-label text-light mb-0 inline-block">Enter Product
                                    Title: </label>
                                <input type="text" name="title" class="form-control" required
                                    value="{{ $findProduct->title }}">
                                <small class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="col-md-6 mx-auto">
                                <label for="description" class="form-label text-light mb-0 mt-3">Enter Product
                                    Description:
                                </label>
                                <textarea name="description" class="form-control" rows="5" style="resize: none" required>{{ $findProduct->description }}</textarea>
                                <small class="text-danger">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="col-md-6 mx-auto mt-2">
                                <label for="image" class="form-label text-light mb-0 mt-3 d-block">Current Image:
                                </label>
                                <img src="{{ asset("products/$findProduct->image") }}" alt="" class="img-fluid" style="height:250px; width: 100;">
                            </div>

                            <div class="col-md-6 mx-auto mt-2">
                                <label for="image" class="form-label text-light mb-0 mt-3">Upload Product Image:
                                </label>
                                <input type="file" name="image" class="form-control" required multiple
                                    value="{{ asset("products/$findProduct->image") }}">
                                <small class="text-danger">
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="col-md-6 mx-auto">
                                <label for="price" class="form-label text-light mb-0 mt-3">Enter Product Price:
                                </label>
                                <input type="number" name="price" class="form-control" required
                                    value="{{ $findProduct->price }}">
                                <small class="text-danger">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="col-md-6 mx-auto">
                                <label for="category" class="form-label text-light mb-0 mt-3">Select Product Category:
                                </label>
                                <select name="category" class="form-control" required>
                                    <option>Select Option</option>
                                    @foreach ($allCategories as $value)
                                        <option value="{{ $value->category_name }}"
                                            {{ $findProduct->category == $value->category_name ? 'selected' : '' }}>
                                            {{ $value->category_name }}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger">
                                    @error('category')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="col-md-6 mx-auto">
                                <label for="quantity" class="form-label text-light mb-0 mt-3">Enter Product Quantity:
                                </label>
                                <input type="number" name="quantity" class="form-control" required
                                    value="{{ $findProduct->quantity }}">
                                <small class="text-danger">
                                    @error('quantity')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <div class="col-md-6 mx-auto">
                                <button class="btn btn-primary btn-block mt-2">Update</button>
                            </div>
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

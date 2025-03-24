@extends('UserLayout.main')


@section('main-section')
    <?php
    $totalSum = 0;
    ?>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-12">
                <h4>Welcome {{ Auth::user()->name }}</h4>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Image Preview</th>
                        <th>Product Category</th>
                        <th>Product Description</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Remove from Cart</th>
                    </tr>
                    @foreach ($cart as $listCart)
                        <tr class="text-center align-middle">
                            <td>
                                <img src="{{ asset('products/' . $listCart->product->image) }}"
                                    alt="{{ $listCart->product->title }}" class="card-img-top"
                                    style="height: 100px; object-fit: cover;">
                            </td>
                            <td>{{ $listCart->product->category }}</td>
                            <td>{{ $listCart->product->description }}</td>
                            <td>${{ $listCart->product->price }}</td>
                            <td>{{ $listCart->product_quantity }}</td>
                            <td>
                                <a href="{{ route('delete.product.cart', $listCart->id) }}"
                                    class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php
                        $totalSum = $totalSum + $listCart->product->price * $listCart->product_quantity;
                        ?>
                    @endforeach
                </table>
                <hr>
                <p class="text-center">Total Price: ${{ $totalSum }}</p>
                <hr>

            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <form action="{{ route('confirm.order') }}" method="post">
                    @csrf
                    <div class="col-md-8">
                        <label class="form-label mb-0 inline-block">Receiver Name: </label>
                        <input type="text" class="form-control" name="receiver_name" value="{{ Auth::user()->name }}">
                        <small class="text-danger">
                            @error('receiver_name')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-8">
                        <label class="form-label mb-0 mt-2">Receiver Address: </label>
                        <textarea class="form-control" name="receiver_address" style="resize:none">{{ Auth::user()->address }}</textarea>
                        <small class="text-danger">
                            @error('receiver_address')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-8">
                        <label class="form-label mb-0 mt-2">Receiver Phone No: </label>
                        <input type="number" class="form-control" name="receiver_phone" value="{{ Auth::user()->phone }}">
                        <small class="text-danger">
                            @error('receiver_phone')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>

                    <input type="submit" value="Cash On Delivery" class="btn btn-primary mt-5">
                    <a href="{{ url('stripe', $totalSum) }}" class="btn btn-success mt-5"><i
                            class="fa-brands fa-cc-stripe mx-1"></i> Stripe Payment</a>
                </form>

            </div>

        </div>

    </div>
@endsection

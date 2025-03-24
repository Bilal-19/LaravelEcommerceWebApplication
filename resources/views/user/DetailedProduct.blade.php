@extends('UserLayout.main')


@section('main-section')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-6 mx-auto">
                <div class="card shadow">
                    <img src="{{ asset("products/$findProduct->image") }}" alt="{{ $findProduct->title }}" class="card-img-top"
                        style="height: 500px; object-fit: cover;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mb-0">{{ $findProduct->title }}</h4>
                            <p class="card-text mb-0"><i class="fa-solid fa-tag"></i> ${{ $findProduct->price }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="card-text mb-0">Category: {{ $findProduct->category }}</p>
                            <p class="card-text mb-0">Quantity: {{ $findProduct->quantity }}</p>
                        </div>
                        <p class="card-text mb-0">{{ $findProduct->description }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <h3>Similar Products</h3>
            @foreach ($similarProducts as $product)
            <div class="col-md-3">
                <div class="card mt-2 shadow">
                    <img src="{{ asset("products/$product->image") }}" alt="{{ $product->title }}" class="card-img-top"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mb-0 product-title">{{ $product->title }}</h4>
                        </div>
                        <p class="card-text mb-0 product-description">{{ $product->description }}</p>
                        <div class="d-flex justify-content-between">
                            <p class="card-text product-price"><i class="fa-solid fa-tag"></i> ${{ $product->price }}
                            </p>
                            <p class="card-text">Quantity: {{ $product->quantity }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href={{ route('view-user.product', $product->id) }} class="btn btn-sm"><i
                                    class="fa-regular fa-eye"></i> View</a>
                            <a href="{{ route('add.cart', $product->id) }}" class="btn btn-sm"><i
                                    class="fa-solid fa-cart-shopping"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

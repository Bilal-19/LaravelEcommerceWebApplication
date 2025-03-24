@extends('UserLayout.main')


@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            @isset(Auth::user()->name)
                <h4 class="text-dark">Welcome {{ Auth::user()->name }}</h4>
            @endisset
        </div>
        <div class="row mt-3 text-center">
            <h2>All Products</h2>
        </div>
        <div class="row">
            <form action="{{route('view.shop')}}" method="get">
                <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Search product by name, categories">
                    <button class="btn">Search</button>
                </div>
            </form>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="card mt-4 mb-4 shadow">
                        <img src="{{ asset("products/$product->image") }}" alt="{{ $product->title }}" class="card-img-top"
                            style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mb-0 product-title">{{ $product->title }}</h4>
                            </div>
                            <p class="card-text mb-0 product-description">{{ $product->description }}</p>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="card-text product-price"><i class="fa-solid fa-tag"></i> ${{ $product->price }}
                                </p>
                                <p class="card-text">Quantity: {{ $product->quantity }}</p>
                            </div>
                            <div class="d-flex mt-0 justify-content-between">
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

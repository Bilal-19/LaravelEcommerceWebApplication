@extends('UserLayout.main')


@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            @isset(Auth::user()->name)
                <h4 class="">Welcome {{ Auth::user()->name }}</h4>
            @endisset
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="card mt-2 shadow">
                        <img src="{{ asset("products/$product->image") }}" alt="{{ $product->title }}" class="card-img-top"
                            style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mb-0">{{ $product->title }}</h4>
                            </div>
                            <p class="card-text mb-0">{{ $product->description }}</p>
                            <div class="d-flex justify-content-between">
                                <p class="card-text"><i class="fa-solid fa-tag"></i> ${{ $product->price }}</p>
                                <p class="card-text">Quantity: {{ $product->quantity }}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href={{ route('view-user.product', $product->id) }} class="btn btn-primary btn-sm"><i
                                        class="fa-regular fa-eye"></i> View</a>
                                <a href="{{ route('add.cart', $product->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fa-solid fa-cart-shopping"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

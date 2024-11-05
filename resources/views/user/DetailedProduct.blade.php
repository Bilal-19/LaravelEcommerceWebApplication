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
                            <p class="card-text mb-0"><i class="fa-solid fa-tag"></i> {{ $findProduct->price }} PKR</p>
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
    </div>
@endsection

@extends('UserLayout.main')


@section('main-section')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Product Name</th>
                        <th>Receiving Address</th>
                        <th>Price</th>
                        <th>Delivery Status</th>
                        <th>Order Date</th>
                        <th>Order Time</th>
                        <th>Order Preview</th>
                    </tr>
                    @foreach ($findUserOrders as $userOrder)
                        <tr>
                            <td>{{ $userOrder->product->title }}</td>
                            <td>{{ $userOrder->receiving_address }}</td>
                            <td>{{ $userOrder->product->price }}</td>
                            <td>{{ $userOrder->status }}</td>
                            <td>{{ date_format($userOrder->created_at, 'd-m-Y') }}</td>
                            <td>{{ date_format($userOrder->created_at, 'h:i:s') }}</td>
                            <td>
                                <img src="{{ asset('products/' . $userOrder->product->image) }}"
                                    alt="{{ $userOrder->product->title }}" class="img-fluid" height="50" width="50">
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

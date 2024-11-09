@extends('UserLayout.main')


@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h2 class="text-center">My Profile</h2>
            <div class="col-md-4 mx-auto">
                <form action="{{route('update.profile')}}" method="post">
                    @csrf
                    <label for="name" class="form-label mb-0">Name: </label>
                    <input type="text" class="form-control mb-2" name="name" value="{{ Auth::user()->name }}">

                    <label for="email" class="form-label mb-0">Email: </label>
                    <input type="email" class="form-control mb-2" name="email" value="{{ Auth::user()->email }}">

                    <label for="phone_no" class="form-label mb-0">Phone Number: </label>
                    <input type="number" class="form-control mb-2" name="phone" value="{{ Auth::user()->phone }}">

                    <label for="address" class="form-label mb-0">Address: </label>
                    <textarea name="address" rows="6" class="form-control mb-2">{{Auth::user()->address}}</textarea>
                <button class="btn">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('UserLayout.main')


@section('main-section')
    <div class="container-fluid">
        <div class="row mt-5">
            <h4 class="text-center">Contact Us</h4>
            <div class="col-md-4 mx-auto">
                <form action="{{ route('store.contactus.form') }}" method="post">
                    @csrf
                    <input type="text" class="form-control" placeholder="Enter your name" name="username">
                    <small class="mb-3 text-danger">
                        @error('username')
                            {{ 'Please enter your name' }}
                        @enderror
                    </small>
                    <input type="email" class="form-control mt-3" placeholder="Enter your email" name="useremail">
                    <small class="mb-3 text-danger">
                        @error('useremail')
                            {{ 'Please enter your email' }}
                        @enderror
                    </small>

                    <textarea name="usermessage" rows="5" class="form-control mt-3" placeholder="Write your message here..."
                        style="resize:none;"></textarea>
                    <small class="text-danger mb-3">
                        @error('usermessage')
                            {{ 'Please enter your message' }}
                        @enderror
                    </small>
                    <div class="col-md-12 d-grid">
                        <input type="submit" class="btn btn-outline-dark btn-block mt-3" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

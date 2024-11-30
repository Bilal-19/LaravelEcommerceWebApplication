@include('UserLayout.header')

@yield('main-section')

<div class="container-fluid bg-dark text-light footer mt-5 pb-5 pt-3 shadow">
    <div class="row mt-5">
        <div class="col-md-4">
            <h5 class="text-center">QUICK LINKS</h5>
            <a href="{{route('Home')}}" class="nav-link text-light pb-0">Home</a>
            <a href="{{route('view.shop')}}" class="nav-link text-light pt-0 pb-0">View All Products</a>
            <a href="{{route('contact-us')}}" class="nav-link text-light pt-0">Contact Us</a>
        </div>
        <div class="col-md-4">
            <h5 class="text-center">OUR SOCIAL PLATFORMS</h5>
            <div class="d-flex justify-content-center align-items-center">
                <a href="https://www.facebook.com/" target="_blank" class="nav-link text-light"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/" target="_blank" class="nav-link text-light"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://twitter.com/?lang=en" target="_blank" class="nav-link text-light"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="https://linkedin.com/" target="_blank" class="nav-link text-light"><i class="fa-brands fa-linkedin"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <h5 class="text-center">CONTACT US</h5>
            <p class="mb-0"><i class="fa-solid fa-location-dot"></i> Karachi, Pakistan</p>
            <p class="mb-0"><i class="fa-solid fa-phone"></i> 03427634247</p>
            <p class="mb-0"><i class="fa-solid fa-envelope"></i> smartmart@pk.com</p>
        </div>
    </div>
</div>
@include('UserLayout.footer')

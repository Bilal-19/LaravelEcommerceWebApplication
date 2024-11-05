@include('UserLayout.header')

@yield('main-section')

<div class="container-fluid brand-bg-color">
    <div class="row mt-5">
        <div class="col-md-1 mt-5"></div>
        <div class="col-md-3 mt-5">
            <h5>ABOUT US</h5>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when
                looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
                of letters, as opposed to using 'Content here, content here', making it look like readable English.
            </p>
        </div>
        <div class="col-md-1 mt-5"></div>
        <div class="col-md-3 mt-5">
            <h5>NEED HELP</h5>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when
                looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
                of letters, as opposed to using 'Content here, content here', making it look like readable English.
            </p>
        </div>
        <div class="col-md-1 mt-5"></div>
        <div class="col-md-3 mt-5">
            <h5>CONTACT US</h5>
            <p><i class="fa-solid fa-location-dot"></i> Karachi, Pakistan</p>
            <p><i class="fa-solid fa-phone"></i> 03427634247</p>
            <p><i class="fa-solid fa-envelope"></i> smartmart@pk.com</p>
        </div>
    </div>
</div>
@include('UserLayout.footer')

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Font awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>SmartMart.pk</title>

    <style>
        /* Headings: Montserrat Semi-Bold, 24px - 48px
        Subheadings: Roboto Medium, 20px - 30px
        Body Text: Open Sans Regular, 14px - 18px
        Buttons: Lato Bold, 16px */


        body {
            font-family: "Open Sans", sans-serif;
            font-size: 15px;
            background-color: #f7f7f7;
            color: #333333
        }

        h1,
        h2,
        h3 {
            font-family: "Montserrat", sans-serif;
            font-size: 700;
        }

        h4,
        h5,
        h6 {
            font-family: "Roboto", serif;
        }

        .btn {
            font-family: "Lato", sans-serif;
            background-color: #333333;
            color: #f7f7f7;
        }

        .btn:hover {
            font-family: "Lato", sans-serif;
            background-color: #f7f7f7;
            color: #333333;
            border: 1px solid #333333;
        }

        nav {
            background-color: #f7f7f7;
            color: #219653;
        }

        .brand-text-color {
            color: #1458B3;
        }

        .brand-bg-color {
            background-color: #f7f7f7;
            /* color: white; */
        }

        i {
            height: 15px;
            width: 15px;
        }

        .brand-btn {
            background-color: white;
            color: #FF5722;
            border-radius: 6px;
            padding: 4px 6px;
        }

        .brand-btn:hover {
            font-weight: bold;
            color: #FF5722;
        }

        /* Home Page */
        #hero-section {
            background-image: url('https://53.fs1.hubspotusercontent-na1.net/hub/53/hubfs/ecommerce%20marketing.jpg?width=595&height=400&name=ecommerce%20marketing.jpg');
            height: 400px;
        }

        /* Products */
        .product-title {
            font-size: 24px;
            font-style: medium;
            color: #777777;
        }

        .product-description {
            color: #888888;
        }
    </style>
</head>

<body>

    <div class="container-fluid shadow">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-dark text-light">
                <div class="container-fluid">
                    <a class="navbar-brand text-light" href="{{ route('Home') }}">
                        <img src="{{ asset('Logo/brand_logo.png') }}" alt="" height="40">
                        <span class=fw-bold">NEXT </span>BUY
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon "></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mx-auto mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-light active" aria-current="page" href="{{ route('view.shop') }}">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light active" aria-current="page" href="{{route("contact-us")}}">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" aria-current="page" href="{{ route('view.cart') }}">
                                    <i class="fa fa-shopping-bag"></i>
                                    @isset($count)
                                        [{{ $count }}]
                                    @endisset
                                </a>
                            </li>
                            @if (Auth::check())
                                <li class="nav-item">
                                    <a class="nav-link text-light active" aria-current="page"
                                        href="{{ route('my.orders', Auth::user()->id) }}">My Orders</a>
                                </li>
                            @endif

                            @if (Auth::user())
                                <li class="nav-item dropdown">
                                    <a class="nav-link text-light dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Welcome {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('view.profile') }}">My Profile</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            @if (Auth::user())
                                                <a class="nav-link btn brand-btn dropdown-item" aria-current="page"
                                                    href="{{ route('logout.home') }}">
                                                    <i class="fa-solid fa-right-from-bracket mx-2"></i> Logout
                                                </a>
                                            @else
                                                <a class="nav-link btn brand-btn dropdown-item" aria-current="page"
                                                    href="{{ route('login') }}">
                                                    Login
                                                </a>
                                            @endif
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item mx-5">
                                    <a class="nav-link btn brand-btn" aria-current="page" href="{{ route('login') }}">
                                        Login
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </nav>

        </div>
    </div>

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
    <title>SmartMart.pk</title>

    <style>
        body {
            font-family: Montserrat;
        }

        .brand-text-color {
            color: #1458B3;
        }

        .brand-bg-color {
            background-color: #1458B3;
            color: white;
        }

        i {
            height: 15px;
            width: 15px;
        }

        .brand-btn {
            background-color: white;
            color: #1458B3;
            border-radius: 6px;
            padding: 4px 6px;
        }

        .brand-btn:hover {
            font-weight: bold;
            color: #1458B3;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light brand-bg-color">
                <div class="container-fluid">
                    <a class="navbar-brand text-light" href="{{ route('Home') }}">
                        <img src="{{ asset('Logo/brand_logo.png') }}" alt="" height="40">
                        <span class="text-light fw-bold">NEXT </span>BUY
                    </a>
                    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon "></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mx-auto mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page" href="#">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page" href="#">Testimonial</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page" href="#">Contact Us</a>
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
                                    <a class="nav-link active text-light" aria-current="page"
                                        href="{{ route('my.orders', Auth::user()->id) }}">My Orders</a>
                                </li>
                            @endif
                        </ul>

                        <form class="d-flex">
                            @if (Auth::user())
                                <a class="nav-link btn brand-btn" aria-current="page" href="{{ route('logout.home') }}">
                                    Logout
                                </a>
                            @else
                                <a class="nav-link btn brand-btn" aria-current="page" href="{{ route('login') }}">
                                    Login
                                </a>
                            @endif
                        </form>
                    </div>
                </div>
            </nav>

        </div>
    </div>

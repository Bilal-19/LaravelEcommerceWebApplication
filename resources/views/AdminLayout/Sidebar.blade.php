<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="{{ asset('assets/img/avatar-6.jpg') }}" alt="..."
                    class="img-fluid rounded-circle">
            </div>
            <div class="title">
                <h1 class="h5">Bilal</h1>
                <p>Web Developer</p>
            </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
            <li class="active">
                <a href="{{route('admin.home')}}"> <i class="icon-home"></i>Home </a>
            </li>
            <li>
                <a href="{{route('view.category')}}"> <i class="icon-grid"></i>Category </a>
            </li>
            <li>
                <a href="{{route('view.orders')}}"> <i class="icon-grid"></i>Orders </a>
            </li>
            <li>
                <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse">
                    <i class="icon-windows"></i>Products
                </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled">
                    <li><a href="{{route('add.product')}}">Add Products</a></li>
                    <li><a href="{{route('view.product')}}">View Products</a></li>
                    <li><a href="#">Edit Products</a></li>
                    <li><a href="#">Deleted Products (Trash)</a></li>
                </ul>
            </li>
            <li><a href="login.html"> <i class="icon-logout"></i>Login page </a></li>
        </ul>

    </nav>

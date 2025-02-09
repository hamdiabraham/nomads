<!-- Navbar -->
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ url('frontend/img/logo_nomads.png') }}" alt="">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a class="nav-link" href="#">Paket Travel</a>
                </li>
                <li class="nav-item mx-md-2 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        Services
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item mx-md-2">
                    <a class="nav-link" href="#">Testimonial</a>
                </li>
            </ul>

            @guest
                <!-- Mobile Button -->
                <form class="form-inline d-sm-block d-md-none">
                    <button class="btn btn-login text-white my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}';">Masuk</button>
                </form>
                <!-- Decktop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login text-white btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}';">Masuk</button>
                </form>
            @endguest

            @auth
                <!-- Mobile Button -->
                <form class="form-inline d-sm-block d-md-none" action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-login text-white my-2 my-sm-0 px-4" type="submit">Keluar</button>
                </form>
                <!-- Decktop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-login text-white btn-navbar-right my-2 my-sm-0 px-4" type="submit">Keluar</button>
                </form>
            @endauth

        </div>
    </nav>
</div>
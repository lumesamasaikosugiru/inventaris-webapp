<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Beranda</a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        {{-- <form action="/logout" method="POST"> --}}
            @csrf
            @method('post')

            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                data-target="#modal-logout">Keluar</button>
            {{--
        </form> --}}
    </ul>
</nav>

@include('pages.auth.out-confir')
<!-- /.navbar -->
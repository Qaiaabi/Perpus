<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container">
    <a style="font-weight: 600;" class="navbar-brand" href="#">𓍢ִ໋🀦 LibraryQ</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
        <li class="nav-item"><a class="nav-link" href="#buku">Buku</a></li>
        <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
        <li class="nav-item"><a class="nav-link" href="profile.html">Profile</a></li>
      </ul>
      <div class="d-flex align-items-center">
        <form class="d-flex me-2">
          <input class="form-control me-2" type="search" placeholder="Cari buku...">
          <button class="btn btn-outline-primary" type="submit">Cari</button>
        </form>

        @if (Route::has('login'))
                <div class="">
                    @auth
                    <x-app-layout></x-app-layout>
                    @else
                    <a href="{{route('login')}}" class="btn btn-primary me-2">Login</a>

                        @if (Route::has('register'))
                        <a href="{{route('register')}}" class="btn btn-outline-light">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


        
        
      </div>
    </div>
  </div>
</nav>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/">LPKA Pangkalpinang</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <!-- <li class="nav-item">
          <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" href="/home">Beranda</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">Tentang Kami</a>
        </li>

        @can('admin')        
        <li class="nav-item">
          <a class="nav-link {{ ($active === "posts") ? 'active' : '' }}" href="/posts">Pencatatan Keuangan</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link {{ ($active === "products") ? 'active' : '' }}" href="/products">Stock Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "products_masuk") ? 'active' : '' }}" href="/products_masuk">Barang Masuk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "products_keluar") ? 'active' : '' }}" href="/products_keluar">Barang Keluar</a>
        </li> -->
        @endcan
      </ul>

      <!-- <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"" ><i class="bi bi-box-arrow-in-right"></i>  Login</a>
        </li>
      </ul> -->

      <ul class="navbar-nav ms-auto">
      @auth
      </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Selamat Datang, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
              </form>  
            </li>
          </ul>
        </li>
      @else
      
        <li class="nav-item">
          <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}" href="/login"><i class="bi bi-box-arrow-in-right"></i>
           Login</a>
        </li>
      
      @endauth
      </ul>

    </div>
  </div>
</nav>
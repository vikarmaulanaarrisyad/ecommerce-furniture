  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <span class="nav-link">Selamat Datang Di Toko Online {{ config('app.name') }}</span>
          </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto mr-4">
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" aria-expanded="true" href="#">
                  <div class="image">
                      <img src="{{ asset('AdminLTE') }}/dist/img/user2-160x160.jpg" class="img-circle" width="30"
                          height="30" alt="User Image">
                      <span class="hidden-xs">{{ auth()->user()->name }}</span>
                  </div>
              </a>

              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                  
                  <a class="nav-link dropdown-item" href="#">
                      <i class="fas fa-user"></i>
                      Profil
                  </a>

                  <div class="dropdown-divider"></div>

                  <a class="nav-link dropdown-item" href="#"
                      onclick="document.querySelector('#form-logout').submit()">
                      <i class="fas fa-sign-out-alt"></i>
                      Keluar
                  </a>

                  <form method="post" action="{{ route('logout') }}" id="form-logout">
                      @csrf
                  </form>
                  <div class="dropdown-divider"></div>

              </div>
          </li>
      </ul>
  </nav>

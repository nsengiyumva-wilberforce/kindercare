<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start bg-dark">
      <div class="me-3">
        <button class="navbar-toggler bg-light navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>
      <div class="bg-light">
        <a class="navbar-brand brand-logo" href="/admin/pupil">
          <img src="{{asset('dash/logo2.png')}}" alt="logo" width="300" height="400">
        </a>
        <a class="navbar-brand brand-logo-mini" href="/admin/pupil">
          <img src="{{asset('dash/icon.png')}}" alt="logo" />
        </a>
      </div>
    </div>
    <div class="navbar-menu-wrapper navbar-dark d-flex align-items-top" style="background: green;">
      <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
          <h1 class="welcome-text text-light">KINDERCARE CHARACTER ASSIGNMENT SYSTEM</h1>
          <h3 class="welcome-sub-text"></h3>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
          <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="text-light fw-bold" style = "text-transform:capitalize";>{{Auth::user()->name}}</span>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              <img class="img-md rounded-circle" src="images/faces/face8.jpg" alt="Profile image">
              <p class="mb-1 mt-3 font-weight-semibold">{{Auth::user()->name}}</p>
              <p class="fw-light text-muted mb-0">{{Auth::user()->email}}</p>
            </div>

            <a class="dropdown-item" href="/logout"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
          </div>
          </a>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
        data-bs-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>


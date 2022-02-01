<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="bg-dar">
    <img src="{{ asset('dash/KINDERCARE_logo.png' ) }}" alt="KINDERCARE_logo" width="220" height="110"> 			
    </div>
    <div class="navbar-menu-wrapper navbar-dark d-flex align-items-top bg-light">
      <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
          <h1 class="welcome-text lead" style="color:blue">KINDERCARE CHARACTER ASSIGNMENT SYSTEM</h1>
          <h3 class="welcome-sub-text"></h3>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
          <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="text-light fw-bold" style = "text-transform:capitalize;";><i class="mdi mdi-account" style="color:blue"></i></span>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <a class="dropdown-item" href="{{route('logout')}}"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
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

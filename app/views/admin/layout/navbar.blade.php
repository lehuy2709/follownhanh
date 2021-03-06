<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
      <a class="sidebar-brand brand-logo" href="index.html"><img src="{{BASE_URL}}public/admin/assets/images/logo.svg" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img src="{{BASE_URL}}public/admin/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{IMG_URL}}{{$_SESSION['admin_avatar']}}" alt="profile" />
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column pr-3">
            <span class="font-weight-medium mb-2">{{$_SESSION['admin_username']}}</span>
            <span class="font-weight-normal">{{number_format($_SESSION["balance"])}} $</span>
          </div>
          <span class="badge badge-danger text-white ml-3 rounded">Admin</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{BASE_URL}}admin/dashboard">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
          <span class="menu-title">Basic UI Elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{BASE_URL}}admin/categories">
          <i class="mdi mdi-buffer menu-icon"></i>
          <span class="menu-title">Danh M???c</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{BASE_URL}}admin/services">
          <i class="mdi mdi-package-variant-closed menu-icon"></i>
          <span class="menu-title">D???ch V???</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{BASE_URL}}admin/packages">
          <i class="mdi mdi-chart-bar menu-icon"></i>
          <span class="menu-title">G??i d???ch v???</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <i class="mdi mdi-table-large menu-icon"></i>
          <span class="menu-title">Tables</span>
        </a>
      </li>
      <li class="nav-item">
        <span class="nav-link" href="#">
          <span class="menu-title">Docs</span>
        </span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.bootstrapdash.com/demo/breeze-free/documentation/documentation.html">
          <i class="mdi mdi-file-document-box menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
      <li class="nav-item sidebar-actions">
        <div class="nav-link">
          <div class="mt-4">
            <div class="border-none">
              <p class="text-black">Notification</p>
            </div>
            <ul class="mt-4 pl-0">
              <li><a href="dang-xuat">Sign Out</a> </li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
  </nav>
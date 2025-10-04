<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
    <a class="sidebar-brand brand-logo" href="{{ url('adminpanel/dashboard') }}">
      <img src="{{ asset('assetsbackend/images/logo.svg') }}" alt="logo" />
    </a>
    <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="{{ url('adminpanel/dashboard') }}">
      <img src="{{ asset('assetsbackend/images/logo-mini.svg') }}" alt="logo" />
    </a>
  </div>
  <ul class="nav">
    <li class="nav-item {{ Request::is('adminpanel/dashboard') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/dashboard') }}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item {{ Request::is('adminpanel/hero') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/hero') }}">
        <i class="mdi mdi-contacts menu-icon"></i>
        <span class="menu-title">Hero</span>
      </a>
    </li>

    <li class="nav-item {{ Request::is('adminpanel/forms*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/forms') }}">
        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
        <span class="menu-title">Forms</span>
      </a>
    </li>

    <li class="nav-item {{ Request::is('adminpanel/charts*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/charts') }}">
        <i class="mdi mdi-chart-bar menu-icon"></i>
        <span class="menu-title">Charts</span>
      </a>
    </li>

    <li class="nav-item {{ Request::is('adminpanel/tables*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/tables') }}">
        <i class="mdi mdi-table-large menu-icon"></i>
        <span class="menu-title">Tables</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('adminpanel/tables*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/tables') }}">
        <i class="mdi mdi-table-large menu-icon"></i>
        <span class="menu-title">Tables</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('adminpanel/tables*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/tables') }}">
        <i class="mdi mdi-table-large menu-icon"></i>
        <span class="menu-title">Tables</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('adminpanel/tables*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/tables') }}">
        <i class="mdi mdi-table-large menu-icon"></i>
        <span class="menu-title">Tables</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('adminpanel/tables*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/tables') }}">
        <i class="mdi mdi-table-large menu-icon"></i>
        <span class="menu-title">Tables</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('adminpanel/tables*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/tables') }}">
        <i class="mdi mdi-table-large menu-icon"></i>
        <span class="menu-title">Tables</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('adminpanel/tables*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/tables') }}">
        <i class="mdi mdi-table-large menu-icon"></i>
        <span class="menu-title">Tables</span>
      </a>
    </li>
  </ul>
</nav>

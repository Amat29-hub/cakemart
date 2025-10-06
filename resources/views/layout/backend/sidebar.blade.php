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
    {{-- Dashboard --}}
    <li class="nav-item {{ Request::is('adminpanel/dashboard*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/dashboard') }}">
        <i class="mdi mdi-view-dashboard menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    {{-- Hero --}}
    <li class="nav-item {{ Request::is('adminpanel/hero*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/hero') }}">
        <i class="mdi mdi-image-size-select-large menu-icon"></i>
        <span class="menu-title">Hero</span>
      </a>
    </li>

    {{-- About Us --}}
    <li class="nav-item {{ Request::is('adminpanel/aboutus*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/aboutus') }}">
        <i class="mdi mdi-information-outline menu-icon"></i>
        <span class="menu-title">About Us</span>
      </a>
    </li>

    {{-- Services --}}
    <li class="nav-item {{ Request::is('adminpanel/services*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/services') }}">
        <i class="mdi mdi-cogs menu-icon"></i>
        <span class="menu-title">Services</span>
      </a>
    </li>

    {{-- Gallery --}}
    <li class="nav-item {{ Request::is('adminpanel/gallery*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/gallery') }}">
        <i class="mdi mdi-image-album menu-icon"></i>
        <span class="menu-title">Gallery</span>
      </a>
    </li>

    {{-- Testimonials --}}
    <li class="nav-item {{ Request::is('adminpanel/testimonial*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/testimonial') }}">
        <i class="mdi mdi-comment-account menu-icon"></i>
        <span class="menu-title">Testimonials</span>
      </a>
    </li>

    {{-- Sejarah --}}
    <li class="nav-item {{ Request::is('adminpanel/sejarah*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/sejarah') }}">
        <i class="mdi mdi-history menu-icon"></i>
        <span class="menu-title">Sejarah</span>
      </a>
    </li>

    {{-- Tenaga Kerja --}}
    <li class="nav-item {{ Request::is('adminpanel/tenagakerja*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/tenagakerja') }}">
        <i class="mdi mdi-account-group menu-icon"></i>
        <span class="menu-title">Tenaga Kerja</span>
      </a>
    </li>

    {{-- Partners --}}
    <li class="nav-item {{ Request::is('adminpanel/partners*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/partners') }}">
        <i class="mdi mdi-domain menu-icon"></i>
        <span class="menu-title">Partners</span>
      </a>
    </li>

    {{-- Contact Us --}}
    <li class="nav-item {{ Request::is('adminpanel/contactus*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/contactus') }}">
        <i class="mdi mdi-phone menu-icon"></i>
        <span class="menu-title">Contact Us</span>
      </a>
    </li>

    {{-- Media Social --}}
    <li class="nav-item {{ Request::is('adminpanel/mediasocial*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('adminpanel/mediasocial') }}">
        <i class="mdi mdi-instagram menu-icon"></i>
        <span class="menu-title">Media Social</span>
      </a>
    </li>
  </ul>
</nav>

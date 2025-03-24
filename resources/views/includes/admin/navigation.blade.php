<!-- sidebar menu area start -->
<div class="d-flex flex-wrap1 sidebar">
  <div class="d-flex1 flex-column flex-shrink-0 py-4 sidebar-inner d-none d-md-flex" style="width: 256px;">
    {{-- <!-- <a href="{{ route('index') }}" class="d-flex align-items-center mb-3 mb-md-0 mx-auto"> --}}
        <img class="logo" src="{{ asset('frontend/img/logo.svg') }}" alt="Logo" width="170" height="46" loading="lazy" />
    </a> -->
    <div class="nav-wrapper">
      <ul class="nav nav-pills flex-column mb-auto">
        <li>
          <a class="nav-link text-white d-flex align-items-center has-submenu no-link" href="{{route('free-trial-dashboard')}}">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-dashboard.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a class="nav-link text-white d-flex align-items-center has-submenu no-link" data-bs-toggle="modal" href="#" data-bs-target="#upgradeModal">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-product.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>Product</span>
          </a>
        </li>
        <li>
          <a class="nav-link text-white d-flex align-items-center has-submenu no-link" data-bs-toggle="modal" href="#" data-bs-target="#upgradeModal">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-customers.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>Customers</span>
          </a>
        </li>
        <li>
          <a class="nav-link text-white d-flex align-items-center has-submenu no-link" data-bs-toggle="modal" href="#" data-bs-target="#upgradeModal">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-quotation.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>Quotations</span>
          </a>
        </li>
        <li class="active">
          <a class="nav-link text-white d-flex align-items-center has-submenu no-link" data-bs-toggle="modal" href="#" aria-expanded="false" data-bs-target="#upgradeModal">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-invoice.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>Invoices</span>
          </a>
          <ul class="collapse submenu show" id="collapseInvoice">
            <li>
                <a class="text-decoration-none text-white" href="#" data-bs-toggle="" data-bs-target="">All Invoices</a>
              </li>
            <li class="active">
              {{-- <a class="text-decoration-none text-white" href="{{ route('index') }}">New Invoice</a> --}}
            </li>
          </ul>
        </li>
        {{-- <li>
          <a class="nav-link text-white d-flex align-items-center has-submenu no-link" data-bs-toggle="modal" href="#" data-bs-target="#upgradeModal">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-report.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>Reports</span>
          </a>
        </li>
        <li>
          <a class="nav-link text-white d-flex align-items-center has-submenu no-link" data-bs-toggle="modal" href="#" data-bs-target="#upgradeModal">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-vat.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>VAT Calculate</span>
          </a>
        </li> --}}
      </ul>

      <ul class="nav nav-pills flex-column mb-auto border-top border-white">
        <li>
          <a class="nav-link text-white d-flex align-items-center has-submenu no-link" data-bs-toggle="modal" href="#" data-bs-target="#upgradeModal">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-setting.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>Settings</span>
          </a>
        </li>

        <li>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()" class="nav-link text-white d-flex align-items-center has-submenu no-link" data-bs-toggle="" href="#" data-bs-target="">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-logout.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>Logout</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </div>
  </div>

  <nav class="navbar navbar-expand-md position-fixed" aria-label="Navbar">
    <div class="container-fluid p-0">
      <a href="{{ config('app.demo_url') }}" class="d-flex align-items-center mx-auto1 logo-wrapper">
        <img class="logo" src="{{ env('COMMON_HOST') . 'assets/admin/img/logo.svg' }}" alt="Logo" width="170" height="46" loading="lazy" />
      </a>

      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
          <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-menu.svg' }}" alt="Icon" width="30" height="30" loading="lazy" />
      </button>

      <div class="collapse navbar-collapse" id="navbarMain">
        <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-md-between w-100">
          <form class="form-search">
            <div class="form-group position-relative">
                <input type="text" class="form-control w-10011" id="search" name="search" placeholder="Search some thing">
            </div>
          </form>

          <ul class="navbar-nav ms-md-auto mb-2 mb-md-0 align-items-center v2">
            <li class="nav-item me-md-4"><a href="{{ route('home') }}" class="nav-link text-white" aria-current="page">Home</a></li>
            <li class="nav-item mx-md-4"><a href="" class="nav-link text-white">Play App Video</a></li>
            <li class="nav-item mx-md-4"><a href="{{Auth::check() ?  route('pricing') : route('register') }}" class="nav-link text-white">Pricing</a></li>
            <li class="nav-item mt-2 mt-md-0 ms-md-5 me-md-3"><a href="{{ config('app.main_front_url') }}/login" class="nav-link btn btn-primary-app dark">Upgrade Now</a></li>
            {{-- <!-- <li class="nav-item mt-2 mt-md-0 "><a href="{{ route('index') }}" class="nav-link btn btn-outline btn-primary-app dark">Free Trial</a></li> --> --}}
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>
<!-- sidebar menu area end -->
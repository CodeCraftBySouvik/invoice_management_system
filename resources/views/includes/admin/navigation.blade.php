<!-- sidebar menu area start -->
<div class="d-flex flex-wrap1 sidebar">
<!-- <div class="collapse navbar-collapse" id="navbarMain"> -->
<div class="d-flex1 flex-column flex-shrink-0 py-4 sidebar-inner d-none d-md-flex" style="width: 256px;">
    <!-- <a href="{{ route('home') }}" class="d-flex align-items-center mb-3 mb-md-0 mx-auto">
        <img class="logo" src="{{ asset('frontend/img/logo.svg') }}" alt="Logo" width="170" height="46" loading="lazy" />
    </a> -->
    <div class="nav-wrapper">
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="@if( Route::is('admin.dashboard') ) active @endif">
          <a class="nav-link text-white d-flex align-items-center" href="{{ route('admin.dashboard') }}">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-dashboard.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>Dashboard</span>
          </a>
        </li>
        <li class="@if( Route::is('admin.product.list') || Route::is('admin.product.add') ) active @endif">
          <a class="nav-link text-white d-flex align-items-center has-submenu" data-bs-toggle="collapse" href="#collapseProduct" aria-expanded="false" aria-controls="collapseProduct">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-product.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>Product</span>
          </a>
          <ul class="collapse submenu @if( Route::is('admin.product.list') || Route::is('admin.product.add') ) show @endif" id="collapseProduct">
            <li class="@if( Route::is('admin.product.list') ) active @endif">
                <a class="text-decoration-none text-white" href="{{ route('admin.product.list') }}">All Products</a>
            </li>
            <li class="@if( Route::is('admin.product.add') ) active @endif">
              <a class="text-decoration-none text-white" href="{{ route('admin.product.add') }}">Add Product</a>
            </li>
          </ul>
        </li>
        <li class="@if( Route::is('admin.customer.list') || Route::is('admin.customer.add') ) active @endif">
          <a class="nav-link text-white d-flex align-items-center has-submenu" data-bs-toggle="collapse" href="#collapseCustomer" aria-expanded="false" aria-controls="collapseCustomer">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-customers.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>Customers</span>
          </a>
          <ul class="collapse submenu @if( Route::is('admin.customer.list') || Route::is('admin.customer.add') ) show @endif" id="collapseCustomer">
            <li class="@if( Route::is('admin.customer.list') ) active @endif">
                <a class="text-decoration-none text-white" href="{{ route('admin.customer.list') }}">All Customers</a>
            </li>
            <li class="@if( Route::is('admin.customer.add') ) active @endif">
              <a class="text-decoration-none text-white" href="{{ route('admin.customer.add') }}">Add Customer</a>
            </li>
          </ul>
        </li>
        <li class="@if( Route::is('admin.quotation.list') || Route::is('admin.quotation.add') ) active @endif">
          <a class="nav-link text-white d-flex align-items-center has-submenu" data-bs-toggle="collapse" href="#collapseQuotation" aria-expanded="false" aria-controls="collapseQuotation">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-quotation.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>Quotations</span>
          </a>
          <ul class="collapse submenu @if( Route::is('admin.quotation.list') || Route::is('admin.quotation.add') ) show @endif" id="collapseQuotation">
            <li class="@if( Route::is('admin.quotation.list') ) active @endif">
                <a class="text-decoration-none text-white" href="{{ route('admin.quotation.list') }}">All Quotations</a>
            </li>
            <li class="@if( Route::is('admin.quotation.add') ) active @endif">
              <a class="text-decoration-none text-white" href="{{ route('admin.quotation.add') }}">New Quotation</a>
            </li>
          </ul>
        </li>
        <li class="@if( Route::is('admin.invoice.list') || Route::is('admin.invoice.add') ) active @endif">
          <a class="nav-link text-white d-flex align-items-center has-submenu" data-bs-toggle="collapse" href="#collapseInvoice" aria-expanded="false" aria-controls="collapseInvoice">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-invoice.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>Invoices</span>
          </a>
          <ul class="collapse submenu @if( Route::is('admin.invoice.list') || Route::is('admin.invoice.add') ) show @endif" id="collapseInvoice">
            <li class="@if( Route::is('admin.invoice.list') ) active @endif">
                <a class="text-decoration-none text-white" href="{{ route('admin.invoice.list') }}">All Invoices</a>
            </li>
            <li class="@if( Route::is('admin.invoice.add') ) active @endif">
              <a class="text-decoration-none text-white" href="{{ route('admin.invoice.add') }}">New Invoice</a>
            </li>
          </ul>
        </li>
        <li class="@if( Route::is('admin.report.list') ) active @endif">
          <a class="nav-link text-white d-flex align-items-center" href="{{ route('admin.report.list') }}">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-report.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>Reports</span>
          </a>
        </li>
        <li class="@if( Route::is('admin.vat.list') ) active @endif">
          <a class="nav-link text-white d-flex align-items-center" href="{{ route('admin.vat.list') }}">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-vat.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>VAT Calculate</span>
          </a>
        </li>
      </ul>

      <ul class="nav nav-pills flex-column mb-auto border-top border-white">
        <li class="@if( Route::is('admin.settings') ) active @endif">
          <a class="nav-link text-white d-flex align-items-center" href="{{ route('admin.settings') }}">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-setting.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>Settings</span>
          </a>
        </li>

        <li>
          <a class="nav-link text-white d-flex align-items-center" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-logout.svg' }}" alt="icon" width="24" height="24" loading="lazy" />
            <span>Logout</span>
          </a>
        </li>
      </ul>
      </div>
    <!-- </div> -->
  </div>

  <nav class="navbar navbar-expand-md position-fixed" aria-label="Navbar">
    <div class="container-fluid p-0">
      <a href="{{ route('home') }}" class="d-flex align-items-center mx-auto1 logo-wrapper">
        <img class="logo" src="{{ env('COMMON_HOST') . 'assets/frontend/img/logo.svg' }}" alt="Logo" width="170" height="46" loading="lazy" />
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

          <ul class="navbar-nav ms-md-auto mb-2 mb-md-0 align-items-center">
            <li class="nav-item d-none d-md-block">
              <a class="nav-link text-decoration-underline color-primary-app" href="{{ config('app.main_front_url') }}/demo">Video Tutorial</a>
            </li>

            <li class="nav-item d-none d-md-block">
              <a class="nav-link"><img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-notification.svg' }}" alt="Icon" width="40" height="40" loading="lazy" /></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown" aria-expanded="false"><img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-avatar.svg' }}" alt="icon" width="40" height="40" loading="lazy" /> Mohammed</a>
              <ul class="dropdown-menu w-100 rounded-0 border border-0 p-0">
                <li><a class="dropdown-item py-2 px-4" href="#">Profile</a></li>
                <li><a class="dropdown-item py-2 px-4" href="#">Account</a></li>
                <li><a class="dropdown-item py-2 px-4" href="#">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>
<!-- sidebar menu area end -->
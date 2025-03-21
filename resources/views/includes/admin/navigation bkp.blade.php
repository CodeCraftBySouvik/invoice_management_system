{{-- <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-app-secondary fixed-top justify-content-between" id="mainNav">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}"> <img src="@if($site_meta && $site_meta->site_logo){{ asset('assets/uploads/company/'.$site_meta->site_logo) }} @else {{ asset('frontend/img/logo.png') }} @endif" data-retina="true" alt="" height="36" class="d-none1"> <span class="navbar-brand-text">{{-- $site_meta->site_name ?? '' --}} admin panel</span></a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <!-- <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">
                <span class="nav-link-text">{{ Auth::user()->fname ?? '' }} {{ Auth::user()->mname ?? '' }} {{ Auth::user()->lname ?? '' }}</span>
            </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link @if( Route::is('admin.dashboard')) active @endif" href="{{ route('admin.dashboard') }}">
            <!-- <i class="fa fa-fw fa-dashboard"></i> -->
            <img src="{{ asset('admin/img/dashboard-interface.svg') }}" width="20"/>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Products">
          <a class="nav-link nav-link-collapse @if( !Route::is('admin.product.add') && !Route::is('admin.product.list') && !Route::is('admin.product.edit') && !Route::is('admin.product.view')) collapsed @endif" data-toggle="collapse" href="#collapseProducts" data-parent="#products" @if( Route::is('admin.product.add') || Route::is('admin.product.list') || Route::is('admin.product.edit') || Route::is('admin.product.view')) aria-expanded="true" @endif>
            <!-- <i class="fa fa-fw fa-th-large"></i> -->
            <img src="{{ asset('admin/img/dress.svg') }}" width="20"/>
            <span class="nav-link-text">Products</span>
          </a>
          <ul class="sidenav-second-level collapse @if( Route::is('admin.product.add') || Route::is('admin.product.list') || Route::is('admin.product.edit') || Route::is('admin.product.view')) show @endif" id="collapseProducts">
            <li>
                <a class="@if( Route::is('admin.product.list') || Route::is('admin.product.edit') || Route::is('admin.product.view')) active @endif" href="{{ route('admin.product.list') }}"><i class="fa fa-fw fa-list"></i> All Products</a>
            </li>
            <li>
              <a class="@if( Route::is('admin.product.add')) active @endif" href="{{ route('admin.product.add') }}"><i class="fa fa-fw fa-plus-circle"></i> Add New</a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link @if( Route::is('admin.order.list')) active @endif" href="{{ route('admin.order.list') }}">
            <img src="{{ asset('admin/img/shopping-bag.svg') }}" width="20"/>
            <span class="nav-link-text">Orders</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link @if( Route::is('admin.form.list')) active @endif" href="{{ route('admin.form.list') }}">
            <img src="{{ asset('admin/img/management.svg') }}" width="20"/>
            <span class="nav-link-text">Form Entries</span>
          </a>
        </li>
        

        
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
    </div>

    <div class="dropdown">
      <a class="dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
      <img src="{{ asset('admin/img/user.webp') }}" class="rounded-circle" alt="banner" height="32" width="32"> {{ Auth::user()->fname ?? '' }} {{ Auth::user()->mname ?? '' }} {{ Auth::user()->lname ?? '' }}
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="{{ route('admin.account.edit') }}">Profile</a>
        <a class="dropdown-item" href="{{ route('admin.settings', ['name' => 'company']) }}">Settings</a>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">Logout</a>
      </div>
    </div>
  </nav>
  <!-- /Navigation--> --}}

  <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
              <svg class="bi"><use xlink:href="#house-fill"></use></svg>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
              <svg class="bi"><use xlink:href="#file-earmark"></use></svg>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
              <svg class="bi"><use xlink:href="#cart"></use></svg>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
              <svg class="bi"><use xlink:href="#people"></use></svg>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
              <svg class="bi"><use xlink:href="#graph-up"></use></svg>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
              <svg class="bi"><use xlink:href="#puzzle"></use></svg>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <svg class="bi"><use xlink:href="#plus-circle"></use></svg>
          </a>
        </h6>
        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
              <svg class="bi"><use xlink:href="#file-earmark-text"></use></svg>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
              <svg class="bi"><use xlink:href="#file-earmark-text"></use></svg>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
              <svg class="bi"><use xlink:href="#file-earmark-text"></use></svg>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
              <svg class="bi"><use xlink:href="#file-earmark-text"></use></svg>
              Year-end sale
            </a>
          </li>
        </ul>

        <hr class="my-3">

        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
              <svg class="bi"><use xlink:href="#gear-wide-connected"></use></svg>
              Settings
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="#">
              <svg class="bi"><use xlink:href="#door-closed"></use></svg>
              Sign out
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

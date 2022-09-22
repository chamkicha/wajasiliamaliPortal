
  <!--APP-SIDEBAR-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar ps ps--active-y is-expanded">
    <div class="side-header">
        <a class="header-brand1" href="{{ url('/dashboard') }}">
            <img src="{{ asset('assets/images/logo/logo2.png') }}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{ asset('assets/images/logo/logo.png') }}"  class="header-brand-img toggle-logo" alt="logo">
            <img src="{{ asset('assets/images/logo/logo.png') }}" class="header-brand-img light-logo" alt="logo">
            <img src="{{ asset('assets/images/logo/logo.png') }}" class="header-brand-img light-logo1" alt="logo">
        </a><!-- LOGO -->
        <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
    </div>
   <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="{{ asset('assets/images/logo/user.jpg') }}" alt="user-img" class="avatar-xl rounded-circle">
            </div>
            <div class="user-info">
                <h6 class=" mb-0 text-dark">{{ fullname() }}</h6>
                <span class="text-muted app-sidebar__user-name text-sm">Msimamizi</span>
            </div>
        </div>
    </div>

    <div class="sidebar-navs active">
        <ul class="nav  nav-pills-circle" style="padding-left: 17px;">
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Badili Nywila">
                <a class="nav-link text-center m-2">
                    <i class="fe fe-settings"></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Wasifu">
                <a class="nav-link text-center m-2">
                    <i class="fe fe-user"></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ondoka">
                <a class="nav-link text-center m-2" onclick="$('#logout').submit()">
                    <i class="fe fe-power"></i>
                </a>
            </li>

            
                <form action="{{ url('/logout') }}" method="post" id="logout">
  
                     {{ csrf_field() }}

                </form>

        </ul>
    </div>
    @include('layout.sidebar')
</aside>
<!--/APP-SIDEBAR-->

<!-- Mobile Header -->
<div class="mobile-header">
    <div class="container-fluid">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
            <a class="header-brand" href="{{ url('/dashboard') }}">
                <img src="{{ asset('assets/images/logo/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('assets/images/logo/logo.png') }}" class="header-brand-img desktop-logo mobile-light" alt="logo">
            </a>
            
        </div>
    </div>
</div>

<div class="mb-1 navbar navbar-expand-lg  responsive-navbar navbar-dark d-md-none bg-white">
    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
        <div class="d-flex order-lg-2 ml-auto">
            <div class="dropdown d-sm-flex">
                <a href="#" class="nav-link icon" data-toggle="dropdown">
                    <i class="fe fe-search"></i>
                </a>
                <div class="dropdown-menu header-search dropdown-menu-left">
                    <div class="input-group w-100 p-2">
                        <input type="text" class="form-control " placeholder="Search....">
                        <div class="input-group-append ">
                            <button type="button" class="btn btn-primary ">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div><!-- SEARCH -->
            
            
            
        </div>
    </div>
</div>
<!-- /Mobile Header -->
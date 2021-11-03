<div class="container-fluid">
    <div class="row">
      <!-- Left Sidebar start-->
      <div class="side-menu-fixed">
       <div class="scrollbar side-menu-bg">
        <ul class="nav navbar-nav side-menu" id="sidebarnav">
          <!-- menu item Dashboard-->
          <li>
            <a href="{{ route('home') }}" >
              <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ __('site.dashboard') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li>
            <a href="#" >
              <div class="pull-left"><span class="right-nav-text" style="color: rgb(236, 65, 65)">{{ __('site.wolf') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li>
            <a href="{{ route('users.index') }}">
              <div class="pull-left"><i class="fa fa-address-book"></i><span class="right-nav-text">{{ __('site.admins') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li>
            <a href="{{ route('roles.index') }}">
              <div class="pull-left"><i class="fa fa-times-rectangle"></i><span class="right-nav-text">{{ __('site.permissions') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements1">
              <div class="pull-left"><i class="fa fa-id-card-o"></i><span class="right-nav-text"></span> {{ __('site.component') }}</div>
              <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
            </a>
            <ul id="elements1" class="collapse" data-parent="#sidebarnav">
              <li><a href="{{ route('sections.index') }}"> {{ __('site.sections') }}</a></li>
              <li><a href="{{ route('products.index') }}"> {{ __('site.production') }}</a></li>
            </ul>
          </li>
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements2">
              <div class="pull-left"><i class="fa fa-free-code-camp"></i><span class="right-nav-text"></span> {{ __('site.invoices') }}</div>
              <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
            </a>
            <ul id="elements2" class="collapse" data-parent="#sidebarnav">
              <li><a href="{{ route('invoices.index') }}">{{ __('site.allinvoices') }}</a></li>
            </ul>
          </li>
        </ul>
    </div>
  </div>

@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="https://placehold.it/160x160/00a65a/ffffff/&text={{ mb_substr(Auth::user()->name, 0, 1) }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
           <li class="treeview">
              <a href="#"><i class="fa fa-newspaper-o"></i> <span>Product management</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                  <li><a href="{{ url(config('backpack.base.route_prefix').'/product') }}"><i class="fa fa-newspaper-o"></i> <span>Products</span></a></li>
                  <li><a href="{{ url(config('backpack.base.route_prefix').'/category') }}"><i class="fa fa-list"></i> <span>Categories</span></a></li>
              </ul>
          </li>
          <li class="treeview">
              <a href="{{ url(config('backpack.base.route_prefix').'/order') }}"><i class="fa fa-newspaper-o"></i> <span>Order management</span></i></a>
          </li>
          <li class="treeview">
            <a href="{{ url(config('backpack.base.route_prefix').'/user') }}"><i class="fa fa-newspaper-o"></i> <span>User management</span></a>
          </li>
  
          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif

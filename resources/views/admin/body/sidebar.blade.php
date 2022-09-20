@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();

@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="/admin/dashboard">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('backend/images/logo-shop.png')}}" alt="">
						  <h3><b>Ahlaou</b> Dashboard</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{($route == 'dashboard')? 'active' : ''}}">
          <a href="{{url('admin/dashboard')}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview {{($prefix == '/brand')? 'active' : ''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all.brands')? 'active' : ''}}"><a href="{{route('all.brands')}}"><i class="ti-more"></i>All Brands</a></li>
            
          </ul>
        </li> 
		  
        <li class="treeview {{($prefix == '/categories')? 'active' : ''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all.Categories')? 'active' : ''}}"><a href="{{route('all.Categories')}}"><i class="ti-more"></i>All Categories</a></li>
            <li class="{{($route == 'all.SubCategories')? 'active' : ''}}"><a href="{{route('all.SubCategories')}}"><i class="ti-more"></i>Sub Categories</a></li>
            <li class="{{($route == 'all.SubSubCategories')? 'active' : ''}}"><a href="{{route('all.SubSubCategories')}}"><i class="ti-more"></i>Sub Sub Categories</a></li>
            
          </ul>
        </li>
        <li class="treeview {{($prefix == '/products')? 'active' : ''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'add.product')? 'active' : ''}}"><a href="{{route('add.product')}}"><i class="ti-more"></i>Add Products</a></li>
            <li class="{{($route == 'manage.product')? 'active' : ''}}"><a href="{{route('manage.product')}}"><i class="ti-more"></i>Manage Products</a></li>
       
            
            
          </ul>
        </li>

        <li class="treeview {{($prefix == '/slider')? 'active' : ''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'slider.content')? 'active' : ''}}"><a href="{{route('slider.content')}}"><i class="ti-more"></i>All Sliders</a></li>
            
       
            
            
          </ul>
        </li>
		
        <li class="treeview {{($prefix == '/coupons')? 'active' : ''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Coupons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'manage.coupon')? 'active' : ''}}"><a href="{{route('manage.coupon')}}"><i class="ti-more"></i>Manage Coupon</a></li>
            
       
            
            
          </ul>
        </li>

        <li class="treeview {{($prefix == '/shipping')? 'active' : ''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Shipping Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'manage.division')? 'active' : ''}}"><a href="{{route('manage.division')}}"><i class="ti-more"></i>Shipping Division</a></li>
            <li class="{{($route == 'manage.district')? 'active' : ''}}"><a href="{{route('manage.district')}}"><i class="ti-more"></i>Shipping District</a></li>
            <li class="{{($route == 'manage.state')? 'active' : ''}}"><a href="{{route('manage.state')}}"><i class="ti-more"></i>Shipping State</a></li>
            
       
            
            
          </ul>
        </li>
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview {{($prefix == '/orders')? 'active' : ''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'view.pending')? 'active' : ''}}"><a href="{{route('view.pending')}}"><i class="ti-more"></i>Pending Orders</a></li>
            <li class="{{($route == 'view.confirmed')? 'active' : ''}}"><a href="{{route('view.confirmed')}}"><i class="ti-more"></i>Confirmed Orders</a></li>
            <li class="{{($route == 'view.processing')? 'active' : ''}}"><a href="{{route('view.processing')}}"><i class="ti-more"></i>Processing Orders</a></li>
            <li class="{{($route == 'view.shipped')? 'active' : ''}}"><a href="{{route('view.shipped')}}"><i class="ti-more"></i>Shipped Orders</a></li>
            <li class="{{($route == 'view.picked')? 'active' : ''}}"><a href="{{route('view.picked')}}"><i class="ti-more"></i>Picked Orders</a></li>
            
            <li class="{{($route == 'view.delivered')? 'active' : ''}}"><a href="{{route('view.delivered')}}"><i class="ti-more"></i>Delivered Orders</a></li>
            <li class="{{($route == 'view.canceled')? 'active' : ''}}"><a href="{{route('view.canceled')}}"><i class="ti-more"></i>Canceled Orders</a></li>
            
            
       
            
            
          </ul>
        </li>
		
		
        <li class="treeview {{($prefix == '/reports')? 'active' : ''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>All Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all.reports')? 'active' : ''}}"><a href="{{route('all.reports')}}"><i class="ti-more"></i>All Reports</a></li>
            
            
            
       
            
            
          </ul>
        </li>

        <li class="treeview {{($prefix == '/users')? 'active' : ''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>All Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all.users')? 'active' : ''}}"><a href="{{route('all.users')}}"><i class="ti-more"></i>All Users</a></li>
            
            
            
       
            
            
          </ul>
        </li>

        <li class="treeview {{($prefix == '/returns')? 'active' : ''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>All Returns</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'pending.returns')? 'active' : ''}}"><a href="{{route('pending.returns')}}"><i class="ti-more"></i>Pending Returns</a></li>
            <li class="{{($route == 'approved.returns')? 'active' : ''}}"><a href="{{route('approved.returns')}}"><i class="ti-more"></i>Approved Returns</a></li>
            <li class="{{($route == 'canceled.returns')? 'active' : ''}}"><a href="{{route('canceled.returns')}}"><i class="ti-more"></i>Canceled Returns</a></li>
            
            
            
       
            
            
          </ul>
        </li>
		  
         	  		  
		  
		 
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
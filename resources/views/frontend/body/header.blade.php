<header class="header-style-1"> 
  
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
            <li><a href="/dashboard"><i class="icon fa fa-user"></i>@if (session()->get('language') == 'frensh') Mon Compte @else My Account @endif </a></li>
            <li><a href="{{route('wishlist')}}"><i class="icon fa fa-heart"></i>@if (session()->get('language') == 'frensh') Favoris @else Wishlist @endif </a></li>
            <li><a href="{{route('cart')}}"><i class="icon fa fa-shopping-cart"></i>@if (session()->get('language') == 'frensh') Mon Panier @else My Cart @endif </a></li>
            <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>@if (session()->get('language') == 'frensh') Caisse @else Checkout @endif </a></li>
            
           
          </ul>
        </div>

       


        <!-- /.cnt-account -->
        
        <div class="cnt-block">
          <ul class="list-unstyled list-inline">
          
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">@if (session()->get('language') == 'frensh') EUR @else USD @endif  </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">USD</a></li>
                <li><a href="#">EUR</a></li>
                
              </ul>
            </li>
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">@if (session()->get('language') == 'frensh') Français @else English @endif </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <!-- condition to change language of app -->
                @if (session()->get('language') == 'frensh')
                    <li><a href="{{route('language.english')}}">English</a></li>
                @else
                    <li><a href="{{route('language.frensh')}}">Français</a></li>
                @endif
                
              </ul>
            </li>
            @auth
				 
				 <li><a  href="{{route('user.logout')}}"><span class="value"><i class="fa fa-sign-out" aria-hidden="true"></i> @if (session()->get('language') == 'frensh') Se déconnecter @else Logout @endif </span></a></li>
				 @else
         
         <li class="dropdown dropdown-small"><a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">@if (session()->get('language') == 'frensh') Se Connecter/ S'inscrire @else Login/Register @endif </span><b class="caret"></b></a>
         <ul class="dropdown-menu">
			  
         <li><a href="{{route('login')}}"> @if (session()->get('language') == 'frensh') Se Connecter @else Login @endif </a></li>
				 
				 <li><a  href="{{route('register')}}"> @if (session()->get('language') == 'frensh') S'inscrire @else Register @endif </a></li>
</ul>
</li>
			  @endauth
          </ul>
          <!-- /.list-unstyled --> 
        </div>
        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"> <a href="{{url('/')}}"> <img src="{{asset('frontend/assets/images/logo-shop-header.png')}}" alt="logo"> </a> </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area" >
          <form method="get" action="{{ route('product.search') }}">
              
              <div class="control-group">
                <ul class="categories-filter animate-dropdown">
                  <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" >
                      <li class="menu-header">Computer</li>
                      @php
                if (session()->get('language') == 'english'){
                    $categories = App\Models\Category::orderBy('category_name_en' , 'ASC')->get();
                }
                  else{
                    $categories = App\Models\Category::orderBy('category_name_fr' , 'ASC')->get();
                  }
                     
                @endphp

                @foreach ($categories as $category)
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- @if (session()->get('language') == 'english'){{$category->category_name_en}} @else {{$category->category_name_fr}} @endif</a></li>
                      @endforeach
                    </ul>
                  </li>
                </ul>
                <input class="search-field" name="search" placeholder="Search here..." />
                <a class="search-button" href="#" ></a> </div>
            </form>
          </div>
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count" id="cartcount"></span></div>
              <div class="total-price-basket"> <span class="lbl">cart-</span> 
              <span class="total-price"> <span class="sign">$</span>
              <span class="value" id="carttotal"></span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>
                
              <div id="miniCart">

              </div>
              
                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">Sub Total :</span><span class='price' id="carttotal"></span> </div>
                  <div class="clearfix"></div>
                  <a href="{{ route('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                <!-- /.cart-total--> 
                
              </li>
            </ul>
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart --> 
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active dropdown yamm-fw"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a> </li>
                @php
                if (session()->get('language') == 'english'){
                    $categories = App\Models\Category::orderBy('category_name_en' , 'ASC')->get();
                }
                  else{
                    $categories = App\Models\Category::orderBy('category_name_fr' , 'ASC')->get();
                  }
                     
                @endphp

                @foreach ($categories as $category)
                <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">@if (session()->get('language') == 'english'){{$category->category_name_en}} @else {{$category->category_name_fr}} @endif</a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content ">
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                          @php
                  if (session()->get('language') == 'english'){
                    $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('sub_category_name_en' , 'ASC')->get();
                  }
                  else{
                    $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('sub_category_name_fr' , 'ASC')->get();
                  }
                  
                @endphp

                @foreach($subcategories as $subcategory)
               
                            <h2 class="title"> @if (session()->get('language') == 'english'){{$subcategory->sub_category_name_en}} @else {{$subcategory->sub_category_name_fr}} @endif</h2>
                            <ul class="links">
                            @php
                  if (session()->get('language') == 'english'){
                    $subsubcategories = App\Models\SubSubCategory::where('sub_category_id', $subcategory->id)->orderBy('sub_sub_category_name_en' , 'ASC')->get();
                  }
                  else{
                    $subsubcategories = App\Models\SubSubCategory::where('sub_category_id', $subcategory->id)->orderBy('sub_sub_category_name_fr' , 'ASC')->get();
                  }   
                @endphp

                @foreach ($subsubcategories as $subsubcategory)
                @if (session()->get('language') == 'english')
                              <li><a href="{{url('products/subsubcategory/'. $subsubcategory->id . '/' . $subsubcategory->sub_sub_category_slug_en)}}">@if (session()->get('language') == 'english'){{$subsubcategory->sub_sub_category_name_en}} @else {{$subsubcategory->sub_sub_category_name_fr}} @endif</a></li>
                              @else
                              <li><a href="{{url('products/subsubcategory/'. $subsubcategory->id . '/' . $subsubcategory->sub_sub_category_slug_fr)}}">@if (session()->get('language') == 'english'){{$subsubcategory->sub_sub_category_name_en}} @else {{$subsubcategory->sub_sub_category_name_fr}} @endif</a></li>
                              @endif
                              @endforeach
                            </ul>
                            @endforeach
                          </div>
                          <!-- /.col -->
                          
                          
                          <!-- /.col -->
                         
                          <!-- /.col -->
                        
                          <!-- /.col -->
                          
                          <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="{{asset('frontend/assets/images/banners/top-menu-banner.jpg')}}" alt=""> </div>
                          <!-- /.yamm-content --> 
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                @endforeach
                
                <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  
</header>
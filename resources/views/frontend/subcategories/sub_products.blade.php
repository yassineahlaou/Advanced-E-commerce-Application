@extends('frontend.main_master')
@section('content')

<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="#">Home</a></li>
       

       
        <li class='active'><a href="{{url('products/category/'. $breadsubcat['category']['id'] . '/' . $breadsubcat['category']['category_slug_en'])}}">{{ $breadsubcat['category']['category_name_en']}}</a></li>
       

        
        <li class='active'><a style="color:#0f6cb2" href="{{url('products/subcategory/'. $breadsubcat->id . '/' . $breadsubcat->sub_category_slug_en)}}">{{ $breadsubcat->sub_category_name_en }}</a></li>
       
      </ul>
    </div>
    <!-- /.breadcrumb-inner --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-md-3 sidebar'> 
        <!-- ================================== TOP NAVIGATION ================================== -->
        @include('frontend.commun.vertical_menu')
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== -->
        <div class="sidebar-module-container">
          <div class="sidebar-filter"> 
            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <h3 class="section-title">shop by</h3>
              <div class="widget-header">
                <h4 class="widget-title">Category</h4>
              </div>
              <div class="sidebar-widget-body">
                <div class="accordion">
                    @foreach($categories as $category)
                  <div class="accordion-group">
                    @if (session()->get('language') == 'english')
                    <div class="accordion-heading"> <a href="#category{{$category->id}}" data-toggle="collapse" class="accordion-toggle collapsed">{{$category->category_name_en}} </a> </div>
                    @else
                    <div class="accordion-heading"> <a href="#category{{$category->id}}" data-toggle="collapse" class="accordion-toggle collapsed">{{$category->category_name_fr}} </a> </div>
                    @endif
                    <!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="category{{$category->id}}" style="height: 0px;">
                      <div class="accordion-inner">
                      @php
                      if (session()->get('language') == 'english'){
                        $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('sub_category_name_en' , 'ASC')->get();
                     }
                     else{
                        $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('sub_category_name_fr' , 'ASC')->get();
                        }
                     
                        @endphp
                        <ul>
                            @foreach($subcategories as $subcategory)
                            @if (session()->get('language') == 'english')
                                    <li><a href="{{url('products/subcategory/'. $subcategory->id . '/' . $subcategory->sub_category_slug_en)}}">{{$subcategory->sub_category_name_en}}</a></li>
                            @else
                                <li><a href="{{url('products/subcategory/'. $subcategory->id . '/' . $subcategory->sub_category_slug_fr)}}">{{$subcategory->sub_category_name_fr}}</a></li>
                            @endif
                            @endforeach
                          
                        </ul>
                      </div>
                      <!-- /.accordion-inner --> 
                    </div>
                    <!-- /.accordion-body --> 
                  </div>
                  @endforeach
                  <!-- /.accordion-group -->
                  
                 
                  
                  
                  <!-- /.accordion-group --> 
                  
                </div>

                <!-- /.accordion --> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== --> 
            
            <!-- ============================================== PRICE SILDER============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">Price Slider</h4>
              </div>
              <div class="sidebar-widget-body m-t-10">
                <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                  <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                  <input type="text" class="price-slider" value="" >
                </div>
                <!-- /.price-range-holder --> 
                <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== PRICE SILDER : END ============================================== --> 
            <!-- ============================================== MANUFACTURES============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">Manufactures</h4>
              </div>
              <div class="sidebar-widget-body">
                <ul class="list">
                  <li><a href="#">Forever 18</a></li>
                  <li><a href="#">Nike</a></li>
                  <li><a href="#">Dolce & Gabbana</a></li>
                  <li><a href="#">Alluare</a></li>
                  <li><a href="#">Chanel</a></li>
                  <li><a href="#">Other Brand</a></li>
                </ul>
                <!--<a href="#" class="lnk btn btn-primary">Show Now</a>--> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== MANUFACTURES: END ============================================== --> 
            <!-- ============================================== COLOR============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">Colors</h4>
              </div>
              <div class="sidebar-widget-body">
                <ul class="list">
                  <li><a href="#">Red</a></li>
                  <li><a href="#">Blue</a></li>
                  <li><a href="#">Yellow</a></li>
                  <li><a href="#">Pink</a></li>
                  <li><a href="#">Brown</a></li>
                  <li><a href="#">Teal</a></li>
                </ul>
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== COLOR: END ============================================== --> 
            <!-- ============================================== COMPARE============================================== -->
            <div class="sidebar-widget wow fadeInUp outer-top-vs">
              <h3 class="section-title">Compare products</h3>
              <div class="sidebar-widget-body">
                <div class="compare-report">
                  <p>You have no <span>item(s)</span> to compare</p>
                </div>
                <!-- /.compare-report --> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== COMPARE: END ============================================== --> 
            <!-- ============================================== PRODUCT TAGS ============================================== -->
            <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
              <h3 class="section-title">Product tags</h3>
              <div class="sidebar-widget-body outer-top-xs">
                <div class="tag-list"> 

                @php
                  if (session()->get('language') == 'english'){
                    $products = App\Models\Product::orderBy('product_name_en' , 'ASC')->get();
                  }
                  else{
                    $products = App\Models\Product::orderBy('product_name_fr' , 'ASC')->get();
                  }   

                   $l = 0;
                @endphp


                <!-- eliminate repitation -->  
          @if (session()->get('language') == 'english')
                @php  
                $size = 0;
                $tagsenglish =array();
                @endphp
            
                
            @foreach($products as $product)

                
              
              @php
              
                 $tags = $product->product_tags_en;
                 

                    
                 $pattern = '/,|\[[^]]+\](*SKIP)(*FAIL)/';
                
                $wordsenglish = preg_split($pattern, $tags); 
                $size = count($wordsenglish);
                $sizetab = count($tagsenglish);
                $check = 0;
                

                  for($i = 0; $i< $size ; $i++){
                    for($j = 0; $j< $sizetab ; $j++) {
                      if (strcmp($wordsenglish[$i] , $tagsenglish[$j]) == 0){
                        $check = $check +1;
                      }
                    }

                    if ($check == 0)
                    {
                      
                      array_push($tagsenglish,$wordsenglish[$i]);
                    }
                    
                  }

                
              @endphp
              
            @endforeach

              

               

          @else
              @php  
                $size = 0;
                $tagsfrensh=array();
               
                
              @endphp

            @foreach($products as $product)

                
              
              @php
              $tags = $product->product_tags_fr;

      
              $pattern = '/,|\[[^]]+\](*SKIP)(*FAIL)/';
  
              $wordsfrensh = preg_split($pattern, $tags);
              
              $size = count($wordsfrensh);
              
              $sizetabf = count($tagsfrensh);
              
              
              $check = 0;
             
                

              for($i = 0; $i< $size ; $i++){
                  for($j = 0; $j< $sizetabf ; $j++){
                    
                      if (strcmp($wordsfrensh[$i] , $tagsfrensh[$j]) == 0){
                        $check = $check +1;
                      }
                  }
                    if ($check == 0)
                    {
                      
                      array_push($tagsfrensh,$wordsfrensh[$i]);
                    }
              }
              @endphp



            @endforeach
             

                

          @endif


              
                
             
               
                
            
                <!-- end elimination -->

                @if (session()->get('language') == 'english')

               
@foreach ( $tagsenglish as $tage)

  

      
      <a class="item" title="{{$tage}}" href="{{url('/products/tag/'. $tage)}}">{{$tage}}</a>
   


    @endforeach


    @else
    

@foreach ($tagsfrensh as $tagf)
@if ($tag == $tagf)

      <a class="item active" title="{{$tagf}}" href="{{url('/products/tag/'. $tagf)}}">{{$tagf}}</a>
      @else
      <a class="item" title="{{$tagf}}" href="{{url('/products/tag/'. $tagf)}}">{{$tagf}}</a>
      @endif
    
    @endforeach
    @endif
                </div>
                <!-- /.tag-list --> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
          <!----------- Testimonials------------->
            <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
              <div id="advertisement" class="advertisement">
                <div class="item">
                  <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
                  <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                  <div class="clients_author">John Doe <span>Abc Company</span> </div>
                  <!-- /.container-fluid --> 
                </div>
                <!-- /.item -->
                
                <div class="item">
                  <div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
                  <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                  <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                </div>
                <!-- /.item -->
                
                <div class="item">
                  <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
                  <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                  <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                  <!-- /.container-fluid --> 
                </div>
                <!-- /.item --> 
                
              </div>
              <!-- /.owl-carousel --> 
            </div>
            
            <!-- ============================================== Testimonials: END ============================================== -->
            
            <div class="home-banner"> <img src="assets/images/banners/LHS-banner.jpg" alt="Image"> </div>
          </div>
          <!-- /.sidebar-filter --> 
        </div>
        <!-- /.sidebar-module-container --> 
      </div>
      <!-- /.sidebar -->
      <div class='col-md-9'> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
       
        
     
        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <div class="col col-sm-6 col-md-2">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                </ul>
              </div>
              <!-- /.filter-tabs --> 
            </div>
            <!-- /.col -->
            <div class="col col-sm-12 col-md-6">
              <div class="col col-sm-3 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">position</a></li>
                        <li role="presentation"><a href="#">Price:Lowest first</a></li>
                        <li role="presentation"><a href="#">Price:HIghest first</a></li>
                        <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld --> 
                </div>
                <!-- /.lbl-cnt --> 
              </div>
              <!-- /.col -->
              <div class="col col-sm-3 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Show</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">1</a></li>
                        <li role="presentation"><a href="#">2</a></li>
                        <li role="presentation"><a href="#">3</a></li>
                        <li role="presentation"><a href="#">4</a></li>
                        <li role="presentation"><a href="#">5</a></li>
                        <li role="presentation"><a href="#">6</a></li>
                        <li role="presentation"><a href="#">7</a></li>
                        <li role="presentation"><a href="#">8</a></li>
                        <li role="presentation"><a href="#">9</a></li>
                        <li role="presentation"><a href="#">10</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld --> 
                </div>
                <!-- /.lbl-cnt --> 
              </div>
              <!-- /.col --> 
            </div>
            <!-- /.col -->
            <div class="col col-sm-6 col-md-4 text-right">
              
             
                <!-- /.list-inline --> 
              
              <!-- /.pagination-container --> </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                    @foreach ($listpros as $product)
                    @php  
                     $amount = $product->selling_price - $product->discount_price;
                        $discount = ($amount/$product->selling_price) * 100;
                        @endphp
                  <div class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                        @if (session()->get('language') == 'english')
                          <div class="image"> <a href="{{url('product/details/'. $product->id . '/' . $product->product_slug_en)}}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                          @else
                          <div class="image"> <a href="{{url('product/details/'. $product->id . '/' . $product->product_slug_fr)}}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                          @endif
                          <!-- /.image -->
                          @if ($product->discount_price == 0)
                          <div class="tag new"><span>new</span></div>
                          @else
                          <div class="tag hot"><span>hot</span></div>
                          @endif
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                        @if (session()->get('language') == 'english')
                          <h3 class="name"><a href="{{url('product/details/'. $product->id) . '/' . $product->product_slug_en}}">@if (session()->get('language') == 'english'){{$product->product_name_en}} @else {{$product->product_name_fr}} @endif</a></h3>
                          @else
                          <h3 class="name"><a href="{{url('product/details/'. $product->id) . '/' . $product->product_slug_fr}}">@if (session()->get('language') == 'english'){{$product->product_name_en}} @else {{$product->product_name_fr}} @endif</a></h3>
                          @endif
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> 
                          @if ($product->discount_price == 0)
                            <span class="price"> ${{$product->selling_price}} </span> 
                            @else
                            <span class="price"> ${{$product->discount_price}} </span> <span class="price-before-discount">${{$product->selling_price}}</span> 
                            @endif
                        </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="tooltip" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
                  @endforeach
                  
                
              
                  <!-- /.item --> 
                </div>
                <!-- /.row --> 
              </div>
              <!-- /.category-product --> 
              
            </div>
            <!-- /.tab-pane -->
            
            <div class="tab-pane "  id="list-container">
            <div class="category-product">

              @foreach ($listpros as $product)
                    @php  
                $amount = $product->selling_price - $product->discount_price;
                $discount = ($amount/$product->selling_price) * 100;
                @endphp
                <div class="category-product-inner wow fadeInUp">
                  <div class="products">
                    <div class="product-list product">
                      <div class="row product-list-row">
                        <div class="col col-sm-4 col-lg-4">
                          <div class="product-image">
                            <div class="image"> <img src="{{asset($product->product_thumbnail)}}" alt=""> </div>
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-8 col-lg-8">
                          <div class="product-info">
                          @if (session()->get('language') == 'english')
                          <h3 class="name"><a href="{{url('product/details/'. $product->id) . '/' . $product->product_slug_en}}">@if (session()->get('language') == 'english'){{$product->product_name_en}} @else {{$product->product_name_fr}} @endif</a></h3>
                          @else
                          <h3 class="name"><a href="{{url('product/details/'. $product->id) . '/' . $product->product_slug_fr}}">@if (session()->get('language') == 'english'){{$product->product_name_en}} @else {{$product->product_name_fr}} @endif</a></h3>
                          @endif
                            
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> 
                            @if ($product->discount_price == 0)
                            <span class="price"> ${{$product->selling_price}} </span> 
                            @else
                            <span class="price"> ${{$product->discount_price}} </span> <span class="price-before-discount">${{$product->selling_price}}</span> 
                            @endif
                             </div> 
                            
                            <!-- /.product-price -->
                            @if (session()->get('language') == 'english')
                            <div class="description m-t-10"> {{$product->short_desc_en}}</div>
                            @else
                            <div class="description m-t-10"> {{$product->short_desc_fr}}</div>
                            @endif
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="tooltip" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                  </li>
                                  <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                  <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                </ul>
                              </div>
                              <!-- /.action --> 
                            </div>
                            <!-- /.cart --> 
                            
                          </div>
                          <!-- /.product-info --> 
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-list-row -->
                     
                      @if ($product->discount_price == 0)
                          <div class="tag new"><span>new</span></div>
                          @else
                          <div class="tag hot"><span>hot</span></div>
                          @endif
                    </div>
                    <!-- /.product-list --> 
                  </div>
                  <!-- /.products --> 
                </div>
               
                <!-- /.category-product-inner -->
                
                
                
                @endforeach
                
              </div>
              <!-- /.category-product --> 
             
            </div>
            <!-- /.tab-pane #list-container --> 
          </div>
          <!-- /.tab-content -->
         
                  
               
          {{$listpros->links('vendor.pagination.costum')}}
            
              
          <!-- /.filters-container --> 
          
        </div>
        <!-- /.search-result-container --> 
        
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
          <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item--> 
        </div>
        <!-- /.owl-carousel #logo-slider --> 
      </div>
      <!-- /.logo-slider-inner --> 
      
    </div>
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
  <!-- /.container --> 
  
</div>

@endsection
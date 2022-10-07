@extends('frontend.main_master')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'><a style="color:#0f6cb2" href="{{route('blog.posts')}}" >Blog</a></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9" >
					<div id="list-posts">
				@include('frontend.blog.list_posts')
</div>

				<div class="ajax-loadmore-posts text-center" style="display:none" >
      <img src="{{ asset('frontend/assets/images/loader.svg') }}" style="width: 120px; height: 120px;">
    </div>
			
</div>
				<div class="col-md-3 sidebar">
                
                
                
					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small">
				<form method="get" action="{{ route('post.search') }}">
        <div class="control-group">
		<input class="search-field"  name="search_post" id="search_post" placeholder="Type to search" />
		<button ><a class="search-button" type="submit"></a></button>
                
           
        </div>
    </form>
</div>	



				<!-- ==============================================CATEGORY============================================== -->
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title">Category</h3>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">

        @foreach($allBlogCategories as $category)
        <ul class="list-group">
        <a href="{{url('/blog/category/'.$category->category_slug_en)}}"><li  class="list-group-item">  {{$category->category_name_en}}</li></a>
	               
            </ul>
	           
	       
            @endforeach

	       

	    </div><!-- /.accordion -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
	<!-- ============================================== CATEGORY : END ============================================== -->						<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
    <h3 class="section-title">tab widget</h3>
	<ul class="nav nav-tabs">
	  <li class="active"><a href="#popular" data-toggle="tab">popular post</a></li>
	  <li><a href="#recent" data-toggle="tab">recent post</a></li>
	</ul>
	<div class="tab-content" style="padding-left:0">
	   <div class="tab-pane active m-t-20" id="popular">
		<div class="blog-post inner-bottom-30 " >
			<img class="img-responsive" src="assets/images/blog-post/blog_big_01.jpg" alt="">
			<h4><a href="blog-details.html">Simple Blog Post</a></h4>
				<span class="review">6 Comments</span>
			<span class="date-time">12/06/16</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
			
		</div>
		<div class="blog-post" >
			<img class="img-responsive" src="assets/images/blog-post/blog_big_02.jpg" alt="">
			<h4><a href="blog-details.html">Simple Blog Post</a></h4>
			<span class="review">6 Comments</span>
			<span class="date-time">23/06/16</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
			
		</div>
	</div>

	<div class="tab-pane m-t-20" id="recent">
		<div class="blog-post inner-bottom-30" >
			<img class="img-responsive" src="assets/images/blog-post/blog_big_03.jpg" alt="">
			<h4><a href="blog-details.html">Simple Blog Post</a></h4>
			<span class="review">6 Comments</span>
			<span class="date-time">5/06/16</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
			
		</div>
		<div class="blog-post">
			<img class="img-responsive" src="assets/images/blog-post/blog_big_01.jpg" alt="">
			<h4><a href="blog-details.html">Simple Blog Post</a></h4>
			<span class="review">6 Comments</span>
			<span class="date-time">10/07/16</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
			
		</div>
	</div>
	</div>
</div>
						<!-- ============================================== PRODUCT TAGS ============================================== -->
						<div class="sidebar-widget product-tag wow fadeInUp">
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
             
                    <a class="item" title="{{$tagf}}" href="{{url('/products/tag/'. $tagf)}}">{{$tagf}}</a>
                  
                  @endforeach
                  @endif
                  
                </div>
            <!-- /.tag-list --> 
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
<!-- ============================================== PRODUCT TAGS : END ============================================== -->					</div>
				</div>
			</div>
		</div>
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div>
</div>

<script>
    function loadmorePosts(page){
      $.ajax({
        type: "get",
        url: "?page="+page,
        beforeSend: function(response){
          $('.ajax-loadmore-posts').show();
        }
      })

	  .done(function(data){
        if (data.posts_ajax == " " ) {
			
          return;
        }
         $('.ajax-loadmore-posts').hide();
         $('#list-posts').append(data.posts_ajax);
		
        
      })
      .fail(function(){
        alert('Something Went Wrong');
      })
    }
    var page = 1;
    $(window).scroll(function (){
		//The window height is what I see, but the document height includes everything below or above.
      if ($(window).scrollTop() +$(window).height() >= $(document).height()){
        page ++;
		loadmorePosts(page);
      }
    });
</script>

@endsection
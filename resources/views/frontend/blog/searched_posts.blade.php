@extends('frontend.main_master')
@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Blog</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
					@php  
					$count = 0;
					@endphp
    @foreach ($allPosts as $post)
	@php 
	$count = $count +1;
	@endphp 
	@if ($count <= 1)
<div class="blog-post   wow fadeInUp">
	<a href="blog-details.html"><img class="img-responsive" src="{{asset($post->post_image)}}"  alt=""></a>
	<h1><a href="blog-details.html">{{$post->post_title_en}}</a></h1>
	<span class="author">{{$post->post_author}}</span>
	<!--<span class="review">6 Comments</span>-->
	<span class="date-time">{{$post->created_at}}</span>
	<p>{!! Str::limit($post->post_details_en, 200 ) !!}</p><!-- truncate with STR-->
	<a href="{{route('post.details', $post->id)}}" class="btn btn-upper btn-primary read-more">read more</a>
</div>
@else
<div class="blog-post  outer-top-bd wow fadeInUp">
	<a href="blog-details.html"><img class="img-responsive" src="{{asset($post->post_image)}}"  alt=""></a>
	<h1><a href="blog-details.html">{{$post->post_title_en}}</a></h1>
	<span class="author">{{$post->post_author}}</span>
	<!--<span class="review">6 Comments</span>-->
	<span class="date-time">{{$post->created_at}}</span>
	<p>{!! Str::limit($post->post_details_en, 200 ) !!}</p><!-- truncate with STR-->
	<a href="{{route('post.details', $post->id)}}" class="btn btn-upper btn-primary read-more">read more</a>
</div>
@endif

@endforeach

<div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">
						
	<div class="text-right">
         <div class="pagination-container">
	<ul class="list-inline list-unstyled">
		<li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
		<li><a href="#">1</a></li>	
		<li class="active"><a href="#">2</a></li>	
		<li><a href="#">3</a></li>	
		<li><a href="#">4</a></li>	
		<li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
	</ul><!-- /.list-inline -->
</div><!-- /.pagination-container -->    </div><!-- /.text-right -->

</div><!-- /.filters-container -->				
			
</div>
				<div class="col-md-3 sidebar">
                
                
                
					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small">
				<form method="get" action="{{ route('post.search') }}">
        <div class="control-group">
		<input class="search-field"  name="search_post" id="search_post" placeholder="Type to search" />
                <button class="search-button" type="submit"></button> 
               
           
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
@endsection
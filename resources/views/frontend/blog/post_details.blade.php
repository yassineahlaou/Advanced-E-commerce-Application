@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="/">Home</a></li>
				<li class='active'><a  href="{{route('blog.posts')}}" >Blog</a></li>
                <li class='active'><a  href="{{url('/blog/category/'.$postClicked['category']['category_slug_en'])}}">{{ $postClicked['category']['category_name_en']}}</a></li>
                <li class='active'><a style="color:#0f6cb2" href="{{route('post.details', $postClicked->id)}}">{{ $postClicked->post_title_en}}</a></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
                <div class="blog-post wow fadeInUp">
	<img class="img-responsive" src="{{asset($postClicked->post_image)}}" alt="">
	<h1>{{$postClicked->post_title}}</h1>
	<span class="author">{{$postClicked->post_author}}</span>
	<span class="review" id="total_comments"></span>
	<span class="date-time">{{$postClicked->created_at}}</span>
	
	<p>{!! $postClicked->post_details_en !!}</p>
	<div class="social-media">
		<span>share post:</span>
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<a href=""><i class="fa fa-rss"></i></a>
		<a href="" class="hidden-xs"><i class="fa fa-pinterest"></i></a>
	</div>
</div>

					<div class="blog-review wow fadeInUp">
	<div class="row">
		<div class="col-md-12">
			<h3 class="title-review-comments" id="total_comments_h3"></h3>
		</div>
        <p hidden id="postid">{{$postClicked->id}}</p>
		<div id="comments"></div>
       
       
        <div class="post-load-more col-md-12"><a class="btn btn-upper btn-primary" id="loadmore">Load more</a></div>
		<div class="ajax-loadmore-comments text-center" style="display:none" >
      <img src="{{ asset('frontend/assets/images/loader.svg') }}" style="width: 120px; height: 120px;">
    </div>
		
	
		
	</div>
</div>					<div class="blog-write-comment outer-bottom-xs outer-top-xs">
	<div class="row">
		<div class="col-md-12">
			<h4>Leave A Comment</h4>
		</div>
		
		@guest  
        <div class="col-md-12">
        <p>  Please , Login In First <b> <a href="{{ route('login') }}">Login Here</a> </b> </p>
        </div>
        @else
		<div class="col-md-12">
			
				<div class="form-group">
                <input type="hidden"  name="post_id" id="post_id" value="{{$postClicked->id}}">
			    <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
			    <textarea class="form-control unicase-form-control" id="comment_details"  name="comment_details"></textarea>
			  </div>
			
		</div>
		<div class="col-md-12 outer-bottom-small m-t-20">
			<button id="save_comment" class="btn-upper btn btn-primary checkout-page-button">Submit Comment</button>
		</div>
        @endguest
	</div>
</div>
				</div>
				<div class="col-md-3 sidebar">
                
                
                
					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small">
				<form method="get" action="{{ route('post.search') }}">
        <div class="control-group">
		<input class="search-field"  name="search_post" id="search_post" placeholder="Type to search" required="" />
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
    
    var limit = 0;
   var totalDisplayed = 0;
    function loadComments(){
        var idPost = $('#postid').text();
        limit = limit + 2;
        //totalDisplayed = totalDisplayed + 1;
        
        
        $.ajax({
            type: 'GET',
            url: '/comments/post/'+idPost+'/'+limit,
            dataType:'json',
            beforeSend: function(response){
          $('.ajax-loadmore-comments').show();
        }
    })
            .done(function(response){
                $('.ajax-loadmore-comments').hide();

                var list = ""
                var listreplies = ""
                var checkk = 0;
                $.each(response.comments, function(key,value){
                  
                 
                   
                    
                    function addZero(i) {
						if (i < 10) {i = "0" + i}
						return i;
					}
					var getDate = new Date(value.created_at);
					var day =  addZero(getDate.getDate());
					var month =   getDate.getMonth();
					month =  addZero(month+1);  // JavaScript months are 0-11
					var year =  addZero(getDate.getFullYear());
					var hour = addZero(getDate.getHours());
					var min = addZero(getDate.getMinutes());
					var sec = addZero(getDate.getSeconds());
					var formatedDate = day + "." + month + "." + year + "\t" + "at" + "\t" +hour + ":" + min + ":" + sec;
					
                    list += `
                   <div class="comment" name=${value.id}> 
                    <div class="col-md-2 col-sm-2">
                        <img src="/upload/user_images/${value.user.profile_photo_path}" alt="Responsive image" class="img-rounded img-responsive">
                    </div>
                    <p hidden id="commentid">${value.id}</p>
                    <p hidden id="postid">${value.post_id}</p>
                    <div class="col-md-10 col-sm-10 blog-comments outer-bottom-xs">
                        <div class=" inner-bottom-xs sel">
                            <h4>${value.user.name}</h4>
                            <span class="review-action pull-right">
                               ${formatedDate} &sol;   
                             
                                <a style="cursor:pointer" id="addreply" name=${value.id} class="hiddenitem"> ${value.replies_total} Replies</a>
                            </span>
                            <p>${value.comment_details}</p>
                        </div>
                   
                    <div class="blog-comments-responce outer-top-xs ">
				<div class="row">
                <div  style="display: none" id="show-replies" name=${value.id}>
                `
                $.each(response.replies, function(key,val){
                        
                        if (val.comment_id == value.id){
                           //console.log('yesyys');
                            
                            function addZero(i) {
                                        if (i < 10) {i = "0" + i}
                                        return i;
                                    }
                                    var getDate = new Date(val.created_at);
                                    var day =  addZero(getDate.getDate());
                                    var month =   getDate.getMonth();
                                    month =  addZero(month+1);  // JavaScript months are 0-11
                                    var year =  addZero(getDate.getFullYear());
                                    var hour = addZero(getDate.getHours());
                                    var min = addZero(getDate.getMinutes());
                                    var sec = addZero(getDate.getSeconds());
                                    var formatedDate = day + "." + month + "." + year + "\t" + "at" + "\t" +hour + ":" + min + ":" + sec;
                            list += `
                            
                            <div class="col-md-2 col-sm-2">
                                        <img src="/upload/user_images/${val.user.profile_photo_path}" alt="Responsive image" class="img-rounded img-responsive">
                                    </div>
                                    <div class="col-md-10 col-sm-10 outer-bottom-xs">
                                        <div class="blog-sub-comments inner-bottom-xs">
                                            <h4>${val.user.name}</h4>
                                            <span class="review-action pull-right">
                                            ${formatedDate} 
                                               
                                            </span>
                                            <p>${val.reply_details}</p>
                                        </div>
                                    </div>
                                   
                            `  
                                                 
                         }
                        
                    });
                    list += ` </div>
                    `
                
                    list += `<div  style="display: none" id="form_reply" name=${value.id}>
                   
		<div class="col-md-10 col-sm-10 outer-bottom-xs">
			<h4>Leave A Reply</h4>
		</div>
		
		@guest  
        <div class="col-md-10 col-sm-10 outer-bottom-xs">
        <p>  Please , Login In First <b> <a href="/login">Login Here</a> </b> </p>
        </div>
        @else
		<div class="col-md-12 col-sm-10 outer-bottom-xs">
			
				<div class="form-group">
                
			    <label class="info-title" for="exampleInputComments">Your Reply <span>*</span></label>
			    <textarea class="form-control unicase-form-control" id="reply_details"  name="reply_details"></textarea>
			  </div>
			
		</div>
		<div class="col-md-10 col-sm-10 outer-bottom-xs outer-bottom-small m-t-20">
			<button id="save_reply" class="btn-upper btn btn-primary checkout-page-button">Submit Reply</button>
		</div>
        @endguest
	</div>
                   
                    </div>
                    </div>
                    </div>
                    </div>
                    <p hidden id="total"><p>
                    
                    `
                   
                    
                    
                });
  
                
                $('#comments').html(list);//jquery function
                
                //$('.comment').find('#show-replies').html(listreplies);
               // console.log($('.comment').length)
              
                $('#total').text($('.comment').length)
                var tot = $('#total_comments').text();
                
                var newto=tot.substring(0,tot.indexOf(' '));
               // console.log($('#total').text());
               //console.log(loadtotalcommentsformore())
                   
                if ( loadtotalcommentsformore() ==  $('#total').text()){
                    
                    $('#loadmore').text('No more Results');
                    $('#loadmore').attr('disabled', true);
                }
               
            
               
                $('.comment').each(function(){
   
                               // var rate = $(this).find('#addreply').text();
								//console.log(rate);
                               // console.log($(this).find('#commentid').text());
                               // console.log($(this).find('#form_reply').attr('name'));
                              $(this).find('#addreply').click(function(){
                                    
                                      // console.log( $(this).attr('name'));
                                       //console.log($(this).closest('.comment').find('#form_reply').attr('name'));
                                if ( $(this).attr('class') == "hiddenitem")
                                       {
                                        if ($(this).closest('.comment').find('#form_reply').attr('name') == $(this).attr('name') && $(this).closest('.comment').find('#show-replies').attr('name') == $(this).attr('name'))
                                     {
                                        $(this).removeClass('hiddenitem');
									    $(this).addClass('shownitem');
                                        //we used .closest to  travel up the DOM
                                        $(this).closest('.comment').find('#form_reply').show();
                                        $(this).closest('.comment').find('#show-replies').show();
                                    }
                                }
                                else{
                                    if ($(this).closest('.comment').find('#form_reply').attr('name') == $(this).attr('name') && $(this).closest('.comment').find('#show-replies').attr('name') == $(this).attr('name'))
                                            {
                                            $(this).removeClass('shownitem');
                                            $(this).addClass('hiddenitem');
                                            //we used .closest to  travel up the DOM
                                            $(this).closest('.comment').find('#form_reply').hide();
                                            $(this).closest('.comment').find('#show-replies').hide();
                                            }
                                }
                                });
                               
                                    
                                   
                           // $(this).find('#form_reply').show();
                    
                           // $(this).find('#show-replys').show();
                           
                
                        
                                   
                       
                        //submit reply
                        $(this).find('#save_reply').click(function(){
                            var reply_details = $(this).closest('.comment').find('#reply_details').val();
                            var idComment =  $(this).closest('.comment').find('#commentid').text();
                         var idPost = $(this).closest('.comment').find('#postid').text();
                        // console.log(idComment);
                                $.ajax({
                                    
                                    type: "POST",
                                    data:{reply_details:reply_details},
                                    dataType: 'json',
                                    url:'/reply/store/post/'+idPost+'/comment/'+idComment,
                                
                                    success:function(data)
                                    {
                                        
                                      
                                            $.ajax({
                                                type: 'GET',
                                                url: '/replies/comment/'+idComment+'/post/'+idPost,
                                                dataType:'json',
                                                success:function(response){
                                                   
                                                    var list = ""
                                                    var idComment = response.idComment
                                                    $.each(response.replies, function(key,value){
                                                        if (response.idComment == value.comment.id){
                                                           
                                                                $('.comment').find(`#addreply[name='${response.idComment}']`).text(response.total + ' Replies')
                                                            
                                                        function addZero(i) {
                                                            if (i < 10) {i = "0" + i}
                                                            return i;
                                                        }
                                                        var getDate = new Date(value.created_at);
                                                        var day =  addZero(getDate.getDate());
                                                        var month =   getDate.getMonth();
                                                        month =  addZero(month+1);  // JavaScript months are 0-11
                                                        var year =  addZero(getDate.getFullYear());
                                                        var hour = addZero(getDate.getHours());
                                                        var min = addZero(getDate.getMinutes());
                                                        var sec = addZero(getDate.getSeconds());
                                                        var formatedDate = day + "." + month + "." + year + "\t" + "at" + "\t" +hour + ":" + min + ":" + sec;
                                                        list += `
                                                        <div class="col-md-2 col-sm-2">
                                                            <img src="/upload/user_images/${value.user.profile_photo_path}" alt="Responsive image" class="img-rounded img-responsive">
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 outer-bottom-xs">
                                                            <div class="blog-sub-comments inner-bottom-xs">
                                                                <h4>${value.user.name}</h4>
                                                                <span class="review-action pull-right">
                                                                ${formatedDate}  
                                                                
                                                                </span>
                                                                <p>${value.reply_details}</p>
                                                            </div>
                                                        </div>
                                                        `
                                                    }
                                                    });
                                                   
                                                    $(`.comment[name="${idComment}"]`).find('#show-replies').html(list);
                                                }
                                            });
                                       
                                    
                                        
                                        const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        icon: 'success',
                                        //title: 'Product Added To Cart',
                                        showConfirmButton: false,
                                        timer: 3000
                                        })
                                    if ($.isEmptyObject(data.error)) {
                                    //if there is no error
                                    $('.comment').find('#reply_details').val('');
                                    
                                        Toast.fire({
                                            icon: 'success',
                                            title: data.success
                                        })
                                    }else{
                                    //if there is an error
                                        Toast.fire({
                                            icon: 'error',
                                            title: data.error
                                        })
                                    }
                                    // End Message 
                                    
                                    
                                }
                            });
                            });
                    });
                        
                    
            })
            .fail(function(){
        alert('Something Went Wrong');
      })

       
        
    }
    loadComments();
    
    
    $('#save_comment').click(function(){
var comment_details = $('#comment_details').val();
var idPost = $('#post_id').val();
    $.ajax({
        
        type: "POST",
        data:{comment_details:comment_details},
        dataType: 'json',
        url:'/comment/store/'+idPost,
      
        success:function(data)
        {
            
            loadComments();
            loadtotalcomments();
          
            
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              icon: 'success',
              //title: 'Product Added To Cart',
              showConfirmButton: false,
              timer: 3000
            })
        if ($.isEmptyObject(data.error)) {
          //if there is no error
          $('#comment_details').val('');
         
            Toast.fire({
                icon: 'success',
                title: data.success
            })
        }else{
          //if there is an error
            Toast.fire({
                icon: 'error',
                title: data.error
            })
        }
        // End Message 
           
        
    }
});
});
function loadtotalcomments()
{
	var idPost = $('#postid').text();
	
	$.ajax({
		type: 'GET',
		
		url:'/post/totalcomments/'+idPost,
		
		//data:{action:'load_data'},
		dataType:"JSON",
		success:function(data)
		{
			//$('#average_rating').text(data.average_rating);
			$('#total_comments').text(data.total_comments+" comments");
            $('#total_comments_h3').html(data.total_comments+" comments");
		
		}
	}
	)
}
loadtotalcomments()
//console.log(limit);
    //console.log($('#total').text());
   // console.log($('.comment').length);
$('.post-load-more').find('#loadmore').click(function(){
    loadComments();
    
    
   // console.log(limit);
    //console.log($('#total').text());
    
});
function loadtotalcommentsformore()
{
	var idPost = $('#postid').text();
    var result=0;
	
	$.ajax({
		type: 'GET',
		 
		url:'/post/totalcomments/'+idPost,
        async: false,  //Making the request synchronous means that browser will pause program execution (freeze all UI too) until the request is done
		//for a solution for async we can use the pagination in laravel + ajax + loader svg , likee in blog posts view
		dataType:"JSON",
        
		success:function(data)
		{
            result = data.total_comments;
			
		
		}
	}
	);
    return result;
}
</script>
@endsection
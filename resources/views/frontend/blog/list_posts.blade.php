

@if ($addClass == false)
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

@else  
@foreach ($allPosts as $post)
<div class="blog-post  outer-top-bd wow fadeInUp">
	<a href="blog-details.html"><img class="img-responsive" src="{{asset($post->post_image)}}"  alt=""></a>
	<h1><a href="blog-details.html">{{$post->post_title_en}}</a></h1>
	<span class="author">{{$post->post_author}}</span>
	<!--<span class="review">6 Comments</span>-->
	<span class="date-time">{{$post->created_at}}</span>
	<p>{!! Str::limit($post->post_details_en, 200 ) !!}</p><!-- truncate with STR-->
	<a href="{{route('post.details', $post->id)}}" class="btn btn-upper btn-primary read-more">read more</a>
</div>
@endforeach
@endif




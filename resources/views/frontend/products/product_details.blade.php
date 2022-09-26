
@extends('frontend.main_master')
@section('content')
<link rel="stylesheet" href="{{asset('frontend/assets/js/dateFormat.js')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
.star-warning
{
	color:#ffff00;
}
</style>


<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
		
  
    
    
    	<!-- ============================================== HOT DEALS ============================================== -->
		@include('frontend.commun.hot_deals')
<!-- ============================================== HOT DEALS: END ============================================== -->					

<!-- ============================================== NEWSLETTER ============================================== -->
<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
	<h3 class="section-title">Newsletters</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<p>Sign Up for Our Newsletter!</p>
        <form>
        	 <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
			  </div>
			<button class="btn btn-primary">Subscribe</button>
		</form>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== NEWSLETTER: END ============================================== -->

<!-- ============================================== Testimonials============================================== -->
<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
	<div id="advertisement" class="advertisement">
        <div class="item">
            <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
		<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">John Doe	<span>Abc Company</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->

         <div class="item">
         	<div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
		<div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>    
        </div><!-- /.item -->

        <div class="item">
            <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
		<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->

    </div><!-- /.owl-carousel -->
</div>
    
<!-- ============================================== Testimonials: END ============================================== -->

 

				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">

        @php
       
                    $images = App\Models\MultiImage::where('product_id', $productData->id)->get();
             
                
        @endphp

        @foreach($images as $img)
            <div class="single-product-gallery-item" id="slide{{$img->id}}">
                <a data-lightbox="image-1" data-title="Gallery" href="{{asset($img->photo_name)}}">
                    <img class="img-responsive" alt="" src="{{asset('frontend/assets/images/blank.gif')}}" data-echo="{{asset($img->photo_name)}}" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            @endforeach
        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">
                @foreach ($images as $img)
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{$img->id}}">
                        <img class="img-responsive" width="85" alt="" src="{{asset($img->photo_name)}}" data-echo="{{asset($img->photo_name)}}" />
                    </a>
                </div>
                @endforeach

                
            </div><!-- /#owl-single-product-thumbnails -->

            

        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name" id="productname">@if (session()->get('language') == 'english'){{$productData->product_name_en}} @else {{$productData->product_name_fr}} @endif</h1>
							
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
									<div class="mb-3">
										<i class="fa fa-star star-light mr-1 main_star" ></i>
										<i class="fa fa-star star-light mr-1 main_star" ></i>
										<i class="fa fa-star star-light mr-1 main_star" ></i>
										<i class="fa fa-star star-light mr-1 main_star" ></i>
										<i class="fa fa-star star-light mr-1 main_star"></i>
									</div>
									</div>
									<p hidden id="productid">{{$productData->id}}</p>
									<div class="col-sm-8">
										<div class="reviews">
										
											<a href="#" class="lnk" > <span id="total_review"></span> Reviews</a>
										</div>
									</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
                                            @if ($productData->product_qty == 0)
											@if (session()->get('language') == 'english')
											<span class="value">Out Of Stock</span>
											@else
											<span class="value">Non Valable</span>
											@endif

                                            @else
											@if (session()->get('language') == 'english')
                                            <span class="value">In Stock</span>
											@else
											<span class="value">Valable</span>
											@endif
                                            @endif
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
                            @if (session()->get('language') == 'english'){{$productData->short_desc_en}} @else {{$productData->short_desc_fr}} @endif
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									
                                	@php  
                						$amount = $productData->selling_price - $productData->discount_price;
                						$discount = ($amount/$productData->selling_price) * 100;
                					@endphp

									<div class="col-sm-6">
										<div class="price-box">
                                        @if ($productData->discount_price == 0)
											<span class="price">${{$productData->selling_price}}</span>
                                        @else
                                            <span class="price">${{$productData->discount_price}}</span>
											<span class="price-strike">${{$productData->selling_price}}</span>
                                        @endif
										</div>
									</div>

									<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
											    <i class="fa fa-heart"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
											   <i class="fa fa-signal"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
											    <i class="fa fa-envelope"></i>
											</a>
										</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->


							<div class="row">
									
                                	
							@if ($productData->	product_size_en != null && $productData->product_size_fr != null && $productData->	product_color_en == null && $productData->	product_color_fr == null )
									<div class="col-sm-6">
										
										
									<div class="form-group">
							<label class="info-title control-label" for="size">Size <span>*</span></label>
							<select class="form-control unicase-form-control selectpicker" id="size" style="display: none;">
								<option disabled="">--Select options--</option>
								@foreach($listsize as $siz)
								<option>{{$siz}}</option>
								@endforeach
								
							</select>
						</div>
						</div>
						
						@elseif($productData->product_size_en == null && $productData->product_size_fr == null && $productData->	product_color_en != null && $productData->	product_color_fr != null )
									

									<div class="col-sm-6">
										
									<div class="form-group">
							<label class="info-title control-label" for="color">Color <span>*</span></label>
							<select class="form-control unicase-form-control selectpicker" id="color" style="display: none;">
								<option disabled="">--Select options--</option>
								@foreach($listcolor as $col)
								<option>{{$col}}</option>
								@endforeach
							</select>
						</div>
						</div>
						@elseif($productData->	product_size_en != null && $productData->product_size_fr != null && $productData->	product_color_en != null && $productData->	product_color_fr != null )
										
						<div class="col-sm-6">
										
										
										<div class="form-group">
								<label class="info-title control-label" for="size">Size <span>*</span></label>
								<select class="form-control unicase-form-control selectpicker" id="size" style="display: none;">
									<option disabled="">--Select options--</option>
									@foreach($listsize as $siz)
									<option>{{$siz}}</option>
									@endforeach
									
								</select>
							</div>
							</div>
							<div class="col-sm-6">
										
									<div class="form-group">
							<label class="info-title control-label" for="color">Color <span>*</span></label>
							<select class="form-control unicase-form-control selectpicker" id="color" style="display: none;">
								<option disabled="">--Select options--</option>
								@foreach($listcolor as $col)
								<option>{{$col}}</option>
								@endforeach
							</select>
						</div>
						</div>
						
						@endif

							</div><!-- /.row -->

							<div class="quantity-container info-container">
								<div class="row">
									
									<div class="col-sm-2">
										<span class="label" for="qty">Qty :</span>
									</div>
									
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								                <div class="arrows">
								                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
								                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								                </div>
								                <input type="text" id="qty" value="1"  min="1">
							              </div>
							            </div>
									</div>

									<input type="hidden" id="product_id" value="{{$productData->id}}">
									<p hidden id="productnameenglish">{{$productData->product_name_en}}</p>
									<p hidden id="productnamefrensh">{{$productData->product_name_fr}}</p>


									<div class="col-sm-7">
                                        @if ($productData->product_qty == 0)
										<button type="submit" onclick="addToCart()" class="btn btn-primary disabled"><i class="fa fa-shopping-cart inner-right-vs"></i> @if(session()->get('language') == 'english') ADD TO CART @else AJOUTER AU PANIER @endif</button>
										
                                        @else
                                        <button type="submit" onclick="addToCart()" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> @if(session()->get('language') == 'english') ADD TO CART @else AJOUTER AU PANIER @endif</button>
                                        @endif
									</div>

									
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->

							

							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
								<li><a data-toggle="tab" href="#tags">TAGS</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text"> @if (session()->get('language') == 'english'){!! $productData->long_desc_en !!} @else {!! $productData->long_desc_fr !!} @endif</p>
									</div>	
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">
																				
										<div class="product-reviews">
											<h4 class="title">Customer Reviews</h4>

											<div class="reviews">
												<div id="reviewsList"></div>
											
											</div><!-- /.reviews -->
										</div><!-- /.product-reviews -->
										

										
										<div class="product-add-review">
											
											
											<div class="review-form">
											@guest
													<p> <b> Please , Login In First <a href="{{ route('login') }}">Login Here</a> </b> </p>
													@else
													@php
													$check = 0;
													
													@endphp
													@foreach($orders as $order)
														@foreach ($orderitems as $item)	
															@if($item->product_id == $productData->id)
																@php
																	 $check = $check + 1
																@endphp
															@endif
														@endforeach
													@endforeach

													@if ($check != 0)

													
													
												<div class="form-container">
												
													
													<input type="hidden"  name="product_id" id="product_id" value="{{$productData->id}}">
													<h4 class="title">Write your own review</h4>
											<h4 class="text-center mt-2 mb-4">
												<i class="fa fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
												<i class="fa fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
												<i class="fa fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
												<i class="fa fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
												<i class="fa fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
											</h4>
														
														<div class="row">
															<div class="col-sm-6">
																
																<div class="form-group">
																	<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="summary"  name="summary" placeholder="">
																</div><!-- /.form-group -->
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Review <span class="astk">*</span></label>
																	<textarea class="form-control txt txt-review" id="comment" name="comment" rows="4" style="resize:none" placeholder=""></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->
														<div class="row">
														<div class="col-md-12">	
														<div class="form-group">
																<label for="label">Add Images</label>
																	
																		<input type="file" name="review_image[]"  id="review_images"  class="form-control" multiple="" > 
																	
																		<div  id="preview_img"></div>

																
																	</div>
																</div>
														</div>
														
														<div class="action text-right">
															<button class="btn btn-primary btn-upper" id="save_review">SUBMIT REVIEW</button>
														</div><!-- /.action -->

												<!-- /.cnt-form -->
												</div><!-- /.form-container -->
												@endif
												@endguest
											</div><!-- /.review-form -->

										</div><!-- /.product-add-review -->										
										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

								<div id="tags" class="tab-pane">
									<div class="product-tag">
										
										<h4 class="title">Product Tags</h4>
										<form role="form" class="form-inline form-cnt">
											<div class="form-container">
									
												<div class="form-group">
													<label for="exampleInputTag">Add Your Tags: </label>
													<input type="email" id="exampleInputTag" class="form-control txt">
													

												</div>

												<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
											</div><!-- /.form-container -->
										</form><!-- /.form-cnt -->

										<form role="form" class="form-inline form-cnt">
											<div class="form-group">
												<label>&nbsp;</label>
												<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
											</div>
										</form><!-- /.form-cnt -->

									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">upsell products</h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

	@foreach($related as $rel)
	    	
		<div class="item item-carousel">
			<div class="products">
				
				<div class="product">		
					<div class="product-image">
						<div class="image">
							@if (session()->get('language') == 'english')
								<a href="{{url('product/details/'. $rel->id . '/' . $rel->product_slug_en)}}"><img  src="{{asset($rel->product_thumbnail)}}" alt=""></a>
							@else
							<a href="{{url('product/details/'. $rel->id . '/' . $rel->product_slug_fr)}}"><img  src="{{asset($rel->product_thumbnail)}}" alt=""></a>
							@endif
						</div><!-- /.image -->		
						
						@php  
               				$amount = $rel->selling_price - $rel->discount_price;
               				 $discount = ($amount/$rel->selling_price) * 100;
               			 @endphp
						@if($rel->discount_price != 0)
						<div class="tag hot"><span>{{round($discount)}}%</span></div>
						@else
			            	<div class="tag sale"><span>sale</span></div>   
						@endif         		   
					</div><!-- /.product-image -->
			
		
					<div class="product-info text-left">
					@if (session()->get('language') == 'english')

						<h3 class="name"><a href="{{url('product/details/'. $rel->id . '/' . $rel->product_slug_en)}}">@if (session()->get('language') == 'english'){{ $rel->product_name_en }} @else {{ $rel->product_name_fr }} @endif</a></h3>
						@else
						<h3 class="name"><a href="{{url('product/details/'. $rel->id . '/' . $rel->product_slug_fr)}}">@if (session()->get('language') == 'english'){{ $rel->product_name_en }} @else {{ $rel->product_name_fr }} @endif</a></h3>
						@endif
						<div class="rating rateit-small"></div>
						<div class="description"></div>

						@if ($rel->discount_price == 0)
                  <div class="product-price"> <span class="price">${{$rel->selling_price}}</span></div>
                 @else
                  <div class="product-price"> <span class="price">${{$rel->discount_price}}</span> <span class="price-before-discount">${{$rel->selling_price}}</span> </div>
										
                    @endif

						
			
					</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
							<div class="action">
								<ul class="list-unstyled">
									<li class="add-cart-button btn-group"><button class="btn btn-primary icon" data-toggle="modal" data-target="#exampleModal" type="button" title="Add Cart" id="{{ $rel->id }}"><i class="fa fa-shopping-cart"></i></button><button class="btn btn-primary cart-btn" type="button">Add to cart</button></li>
	                   
		                			<button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $rel->id }}" > <i class="fa fa-heart"></i> </button>

									<li class="lnk">
										<a class="add-to-cart" href="detail.html" title="Compare">
							   			 	<i class="fa fa-signal"></i>
										</a>
									</li>
								</ul>
							</div><!-- /.action -->
						</div><!-- /.cart -->
				</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
		@endforeach
	
		
	
		
	
		
	
		
		
				
	
			</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->

























		<!-- ==== ================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- == = BRANDS CAROUSEL : END = -->	</div><!-- /.container -->
</div><!-- /.body-content -->  

<script> 

var myarray = [];
$(document).ready(function(){

	var rating_data = 0;

    

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('star-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('star-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('star-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

		var comment = $('#comment').val();
		var idPro = $('#product_id').val();
		var postimages = myarray; 
        var summary = $('#summary').val();
		

		var dt = new FormData();
		for (var i=0; i<postimages.length;i++){
			console.log(postimages[i]);
			dt.append('postimages[]',postimages[i]);
		}
		
		dt.append( 'comment', comment); 
		dt.append( 'summary', summary);  
		dt.append( 'rating', rating_data); 
		//we used FormData because postimages is a ajavascript object so it should be serialize to string
       
            $.ajax({
		
                
                type: "POST",
                data:dt,
				dataType: 'json',
				url:'/review/store/'+idPro,
				processData: false,
				contentType: false,
                success:function(data)
                {
                    

                    load_rating_data();
					reviewsList();
					
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
				  $('#comment').val('');
				  $('#summary').val('');
				  reset_background();
				  $('#preview_img').empty();
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
            })
        });

    });

	function reviewsList(){
		var idProduct = $('#productid').text();
        $.ajax({
            type: 'GET',
            url: '/reviews/list/'+idProduct,
            dataType:'json',
            success:function(response){
                //console.log(response)
               // $('span[id="carttotal"]').text(response.cartTotal);//Having 2 elements with the same ID is not valid html according to the W3C specification. thats's why we use this syntax cause we have 2 elements with the same id in our headr, span(carttotal)
               // $('#cartcount').text(response.cartQty);
                var list = ""
                $.each(response.reviews, function(key,value){
					var check = 0;
					function addZero(i) {
						if (i < 10) {i = "0" + i}
						return i;
					}

					var getDate = new Date(value.created_at);

					var day = getDate.getDate();
					var month =  getDate.getMonth();
					month += 1;  // JavaScript months are 0-11
					var year = getDate.getFullYear();

					var hour = addZero(getDate.getHours());
					var min = addZero(getDate.getMinutes());
					var sec = addZero(getDate.getSeconds());
					var formatedDate = day + "." + month + "." + year + "\t" + "at" + "\t" +hour + ":" + min + ":" + sec;
					
					
					

                    list += `
                    
                   
								<div class="review">
								<p hidden id="reviewid">${value.id}</p>

						<div class="row">
							<div class="col-md-3">
							<img style="border-radius: 50%" src="/upload/user_images/${value.user.profile_photo_path}" width="40px;" height="40px;"><b> ${value.user.name}</b>
							</div>
						<p hidden id="userrating">${value.rating}</p>
							<div class="mb-3">
										<i class="fa fa-star star-light mr-1 user_star"></i>
										<i class="fa fa-star star-light mr-1 user_star"></i>
										<i class="fa fa-star star-light mr-1 user_star"></i>
										<i class="fa fa-star star-light mr-1 user_star"></i>
										<i class="fa fa-star star-light mr-1 user_star"></i>
									</div>

							<div class="col-md-9">

							</div>			
						</div> <!-- // end row -->



							<div class="review-title">
								<span class="summary">${value.summary}</span>
								<span class="date">
									<i class="fa fa-calendar"></i>
									<span>
										${formatedDate}
									</span>
								</span>
							</div>
							<div class="text">"${value.comment}"</div>
							
						`
						$.each(response.review_images, function(key,vall){
							if (vall.review_id == value.id){check = check + 1;}

						});
						if (check != 0){list += `<div> <strong>Additional Pictures:</strong></div>`}
						$.each(response.review_images, function(key,val){
							
							
							
							if (val.review_id == value.id)
							{list += `
							
							<img src="/${val.photo_name}" alt="" width="80px;" height="80px;"></img>
							

							`}
						});

						list += `</div>`
						
						
                });
                
                $('#reviewsList').html(list);//jquery function

				
				$('.review').each(function(){
								var rate = $(this).find('#userrating').text();
								//console.log(rate);
								var count_star = 0;
								$(this).find('.user_star').each(function(){
								count_star++;

								
								
								if(rate >= count_star)
								{
									$(this).removeClass('star-light');
									$(this).addClass('star-warning');
								}
							});
							});
							
				

            }
       
            
          
          })
        }
		
        reviewsList();//we should run the function

		

	
	

function load_rating_data(idProduct)
{
	var idProduct = $('#productid').text();
	
	$.ajax({
		type: 'GET',
		
		url:'/totalreviews/'+idProduct,
		
		//data:{action:'load_data'},
		dataType:"JSON",
		success:function(data)
		{
			//$('#average_rating').text(data.average_rating);
			$('#total_review').text(data.total_review);

			var count_star = 0;

			$('.main_star').each(function(){
				count_star++;

				
				console.log($(this).text());
				if(Math.ceil(data.average_rating) >= count_star)
				{
					$(this).removeClass('star-light');
					$(this).addClass('star-warning');
				}
			});

		}
	}
	)
}
load_rating_data()





  /* jQuery(document).ready(function() {
	$('.date').find()
     $("abbr.timeago").timeago();
   });*/
   
 
  $(document).ready(function(){
   $('#review_images').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
		 myarray = data;
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80).css("padding-right", "7px").css("padding-top", "5px")
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                     
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>

@endsection
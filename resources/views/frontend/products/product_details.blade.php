
@extends('frontend.main_master')
@section('content')


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
										<div class="rating rateit-small"></div>
									</div>
									<div class="col-sm-8">
										<div class="reviews">
											<a href="#" class="lnk">(13 Reviews)</a>
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
						
						@elseif($productData->	product_size_en == null && $productData->product_size_fr == null && $productData->	product_color_en != null && $productData->	product_color_fr != null )
									

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
								                <input type="text" is="qty" value="1"  min="1">
							              </div>
							            </div>
									</div>

									<input type="hidden" id="product_id" value="{{$productData->id}}">


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
												<div class="review">
													<div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
													<div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
																										</div>
											
											</div><!-- /.reviews -->
										</div><!-- /.product-reviews -->
										

										
										<div class="product-add-review">
											<h4 class="title">Write your own review</h4>
											<div class="review-table">
												<div class="table-responsive">
													<table class="table">	
														<thead>
															<tr>
																<th class="cell-label">&nbsp;</th>
																<th>1 star</th>
																<th>2 stars</th>
																<th>3 stars</th>
																<th>4 stars</th>
																<th>5 stars</th>
															</tr>
														</thead>	
														<tbody>
															<tr>
																<td class="cell-label">Quality</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Price</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Value</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
														</tbody>
													</table><!-- /.table .table-bordered -->
												</div><!-- /.table-responsive -->
											</div><!-- /.review-table -->
											
											<div class="review-form">
												<div class="form-container">
													<form role="form" class="cnt-form">
														
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="exampleInputName">Your Name <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputName" placeholder="">
																</div><!-- /.form-group -->
																<div class="form-group">
																	<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
																</div><!-- /.form-group -->
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Review <span class="astk">*</span></label>
																	<textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->
														
														<div class="action text-right">
															<button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
														</div><!-- /.action -->

													</form><!-- /.cnt-form -->
												</div><!-- /.form-container -->
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
									<li class="add-cart-button btn-group"><button class="btn btn-primary icon" data-toggle="dropdown" type="button"><i class="fa fa-shopping-cart"></i></button><button class="btn btn-primary cart-btn" type="button">Add to cart</button></li>
	                   
		                			<li class="lnk wishlist">
										<a class="add-to-cart" href="detail.html" title="Wishlist">
											 <i class="icon fa fa-heart"></i>
										</a>
									</li>

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

@endsection
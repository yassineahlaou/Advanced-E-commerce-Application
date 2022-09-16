
@extends('frontend.main_master')
@section('content')

<link rel="stylesheet" href="{{asset('css/over.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
					
                    <h4 class="checkout-subtitle"><strong>Shipping Info</strong></h4>
					
					<form class="register-form"  action="{{ route('checkout.store') }}" method="POST">
                    @csrf
						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Shipping Name <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{ Auth::user()->name }}" name="shipping_name" required="">
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Email <span>*</span></label>
					    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="Email" name="shipping_email" value="{{ Auth::user()->email }}" required="" >
					  
					  </div>
                      <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Phone <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="Phone"  name="shipping_phone"  required="" >
					  
					  </div>
                      <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Post Code <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="Post Code" name="post_code"  required="" >
					  
					  </div>
                      <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Address <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="Street Address" name="adrress"  required="" >
					  
					  </div>
					 
					
				</div>	
				<!-- already-registered-login -->
                
                <div class="col-md-6 col-sm-6 already-registered-login">
					
                    <h4 class="checkout-subtitle"><strong>&nbsp;</strong></h4>
					
					
						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Choose Division <span>*</span></label>
					    <select class="form-control unicase-form-control text-input" name="division_id" id="division_id"   required="">
                                    <option value="" disabled="" selected="">Select  Division</option>
                                        @foreach($divisions as $division)
										<option value="{{$division->id}}">{{$division->division_name}}</option>
										@endforeach
							</select>
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Choose District <span>*</span></label>
					    <select class="form-control unicase-form-control text-input" name="district_id" id="district_id"  required="" >
                        <option value="" disabled="" selected="">Select  District</option>
                                        
                                        </select>
					  
					  </div>
                      <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Choose State <span>*</span></label>
					    <select name="state_id" id ="state_id" class="form-control unicase-form-control text-input"  required="" >
                        <option value="" disabled="" selected="">Select  State</option>
                                        
                                        </select>
					  
					  </div>
                      <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Notes <span>*</span></label>
					    <textarea type="text" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="Add A Note" name="notes"  required="" cols="30" rows="5" style="resize:none"></textarea>
					  
					  </div>
					
				</div>	

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->

<div class="panel panel-default checkout-step-01">

	

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
					
                    <h4 class="checkout-subtitle" ><strong>Select Payment Method</strong></h4>


                    
                    <div class="form-group" style="padding-top : 5px">	
		                    <label for="">Stripe</label> 		
                            <input type="radio" name="payment_method" value="stripe" required="">
                            <img src="{{ asset('frontend/assets/images/payments/4.png') }}">		    		
		    	    </div> <!-- end col md 4 -->

		    	    <div class="form-group">
		    		        <label for="">Card</label> 		
                            <input type="radio" name="payment_method" value="card">	
		                    <img src="{{ asset('frontend/assets/images/payments/3.png') }}">    		
		    	    </div> <!-- end col md 4 -->
                </div>
                <div class="col-md-6 col-sm-6 already-registered-login">
                <h4 class="checkout-subtitle"><strong>&nbsp;</strong></h4>
                    <div class="form-group" style="padding-top : 5px">
		    		    <label for="">Cash On Delivery</label> 		
                        <input type="radio" name="payment_method" value="cash">	
                            <img src="{{ asset('frontend/assets/images/payments/6.png') }}">  		
		    	    </div> <!-- end col md 4 -->

                    <div class="form-group">
		    		    <label for="">Paypal</label> 		
                        <input type="radio" name="payment_method" value="paypal">	
                            <img src="{{ asset('frontend/assets/images/payments/1.png') }}">  		
		    	    </div> <!-- end col md 4 -->
                   

			    </div>
					
						
					  
                  
					 
					
				
                
                
			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
					  
					  	
					</div><!-- /.checkout-steps -->
                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button"  style="float:right">Complete Payment</button>

</form>
				</div>
                
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled" >
                                            @foreach ($carts as $item)
                                            <li class="listflex">
                                            
                                            <a href="/product/details/{{$item->id}}/{{$item->options->slugname}}"> <img src="/{{$item->options->image}}" alt=""  style="height: 70px; width: 70px;"></img></a>
                                            
                                            
                                            <div class="list">

                                            
                                            <p><strong>Quantity: </strong> {{ $item->qty }}</p>
                                                
                                                
                                                <p><strong>Color: </strong>{{ $item->options->color }}</p>
                                                
                                                
                                                <p><strong>Size: </strong> {{ $item->options->size }}</p>
                                                
                                                <div>
                                            </div>
                                        

                                            </li>

                                            <hr>

                                            
                                            @endforeach

                                            <li >

                                            @if (Session::has('coupon'))

                                    
                                                <p>  <strong>Subtotal:</strong><span  class="total">$ {{$cartTotal}}</span><p>
                                                
                                                <p>  <strong>Coupon:</strong><span class="total">{{session()->get('coupon')['coupon_name']}}</span></p>
                                                
                                
                                            
                                                <p> <strong>Discount:</strong><span class="total" >$ {{session()->get('coupon')['discount_amount']}}</span></p>
                                                
                                                
                                                <p> <strong>Grand Total:</strong><span class="total">$ {{session()->get('coupon')['total_amount']}}</span></p>
                                                @else

                                            
                                                <p><strong>Subtotal:</strong><span class="total">${{$cartTotal}}</span></p>
                                        
                                                <p><strong>Grand Total:</strong><span class="total">${{$cartTotal}}</span></p>
                                            

                                                @endif

                                                </li>
                                        </ul>		
                                    </div>
                                </div>
                            </div>
                        </div> 
<!-- checkout-progress-sidebar -->				
                </div>


			</div><!-- /.row -->
            </div><!-- /.checkout-box -->

            <br>
 @include('frontend.body.brands')
 </div><!-- /.body-content -->
		

 <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{  url('/user/district/ajax') }}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="district_id"]').empty();
                       $('select[name="district_id"]').append('<option value="" disabled="" selected="">Select District</option>');
                          $.each(data, function(key, value){
                              $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
    </script>


<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{  url('/user/state/ajax') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="state_id"]').empty();
                       $('select[name="state_id"]').append('<option value="" disabled="" selected="">Select State</option>');
                          $.each(data, function(key, value){
                              $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
    </script>


        @endsection
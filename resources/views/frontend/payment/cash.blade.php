@extends('frontend.main_master')
@section('content')

<link rel="stylesheet" href="{{asset('css/over.css')}}">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Cash On Delivery</li>
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
				<div class="col-md-12 col-sm-10 already-registered-login">
					
                    <h4 class="unicase-checkout-title"><strong>You have selected Cash On delivery!</strong></h4>
                    <h4 class="unicase-checkout-title">You Will Pay After You Get The Order</h4>


                    <form action="{{ route('cash') }}" method="post" id="payment-form">
                            @csrf
                        <div class="form-row">
                            <label for="card-element">
                          
                            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                            <input type="hidden" name="adrress" value="{{ $data['adrress'] }}"> 
                            <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                            <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                            <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                            <input type="hidden" name="notes" value="{{ $data['notes'] }}"> 
                            </label>
                             
                            <img  style="float:right" src="{{ asset('frontend/assets/images/payments/cash.png') }}">

                            <h3><h3>
                           
                        </div>
                        <br>
                        <button class="btn btn-primary">Submit Order</button>
                        </form>

					
					
					
				</div>	
				<!-- already-registered-login -->
                
                

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->


					  
					  	
					</div><!-- /.checkout-steps -->
                   
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
		

 
 


        @endsection
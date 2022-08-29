@extends('frontend.main_master')
@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="/">Home</a></li>
				<li class='active'>Register</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			

<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">Create a new account</h4>
	<p class="text title-tag-line">Create your new account.</p>
	
    
    <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
		    <input type="text" class="form-control unicase-form-control text-input" id="name" name="name" >
            @error('name')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
		</div>
		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	<input type="email" class="form-control unicase-form-control text-input" id="email" name="email" >
            @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror
	  	</div>
         
        
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
		    <input type="text" class="form-control unicase-form-control text-input" id="phone" name="phone" >
            @error('phone')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror
		</div>
        
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" id="password" name="password" >
            @error('password')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
         @enderror
		</div>
       
         <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation" name="password_confirmation" >
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror
		</div>
       
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Register</button>
	</form>
	
	
</div>	
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
@include('frontend.body.brands')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->


@endsection
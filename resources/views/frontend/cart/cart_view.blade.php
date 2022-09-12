@extends('frontend.main_master')
@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="/">Home</a></li>
				<li class='active'>Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
	<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
	<div class="table-responsive">
		<table class="table">
			<thead>
			<tr>
					<th colspan="7" class="heading-title">My Cart</th>
				</tr>
				<tr>
					
				<th class="cart-romove item">Image</th>
					<th class="cart-description item">Name</th>
					<th class="cart-product-name item">Color</th>
					<th class="cart-edit item">Size</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Subtotal</th>
					<th class="cart-total last-item">Remove</th>
				</tr>
			</thead><!-- /thead -->

			
			<tbody id="cart">
              
				
			</tbody>
		</table>
	</div>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->



<br>
 @include('frontend.body.brands')
</div>
@endsection
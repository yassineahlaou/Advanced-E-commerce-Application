@extends('admin.admin_master')
@section('admin')



	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			

			
			<!-- /.col -->

            <!-- form add brand-->
            <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Coupon</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body"  >
					<div class="table-responsive"  > 
                    <form method = "POST" class="noover" action ="{{route('coupon.store', $couponData->id)}}"  >
                        @csrf
					  	
                            
                        <!-- Id of inputs should be respects , same as Jetstream mention it in user -->
                        
                            <div class="form-group">
								<h5>Coupon Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="coupon_name" id ="coupon_name" class="form-control" value=" {{$couponData->coupon_name}}" required=""  >
									@error('coupon_name')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            <div class="form-group">
								<h5>Coupon Discount <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="coupon_discount" id ="coupon_discount" class="form-control" required="" value="{{$couponData->coupon_discount}}" >
									@error('coupon_discount')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                           
                            <div class="form-group">
								
                                <h5>Coupon Validity <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="date" name="coupon_validity" class="form-control"  id="coupon_validity"  min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{$couponData->coupon_validity}}">
									@error('coupon_validity')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                        </div>

                       
                      


                            
                        
					
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Coupon">
                            <a href="{{route('manage.coupon')}}" class="btn btn-rounded btn-danger mb-5">Cancel</a>
						</div>
					</form>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			  
			  <!-- /.box -->          
			</div>
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>

      <!-- show uploaded photo -->


 
      
@endsection 
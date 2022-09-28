@extends('admin.admin_master')
@section('admin')
<link rel="stylesheet" href="{{asset('css/over.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


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
				  <h3 class="box-title">Add New Admin</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body"  >
					<div class="table-responsive"  > 
                    <form method = "POST" class="noover" action ="{{route('admin.store')}}" enctype="multipart/form-data" >
                        @csrf
					  	
                            
                        <!-- Id of inputs should be respects , same as Jetstream mention it in user -->
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" id ="name" class="form-control" required=""  >
									@error('name')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Email <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="email" name="email" id ="email" class="form-control" required=""  >
									@error('email')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            </div>
                            </div> <!-- end row -->

                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Phone <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="phone" id ="phone" class="form-control" required=""  >
									@error('phone')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Password <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="password" id ="password" class="form-control" required=""  >
									@error('password')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            </div>
                            </div> <!-- end row -->
                           
                            <div class="row">

                        <div class="col-md-5">
                            <div class="form-group">
								
                                <h5> Image <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="file" name="profile_photo_path" class="form-control"  id="profile_photo_path">
									@error('profile_photo_path')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                        </div>

                        <div class="col-md-5">
                        <img id="showImage" src="{{ url('upload/no_image.jpg') }}"  style="width: 100px; heigth: 100px">
                                
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-4">
								<div class="form-group">
									
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="brand"  name="brand"  value="access">
											<label for="brand">Manage Brands</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="categories" name="categories" value="access">
											<label for="categories">Manage Categories</label>
										</fieldset>
                                        <fieldset>
											<input type="checkbox" id="products" name="products" value="access">
											<label for="products">Manage Products</label>
										</fieldset>
                                        <fieldset>
											<input type="checkbox" id="slider"  name="slider"  value="access">
											<label for="slider">Manage Sliders</label>
										</fieldset>
									</div>
								</div>
							</div>
                            <div class="col-md-4">
								<div class="form-group">
									
									<div class="controls">
										
										<fieldset>
											<input type="checkbox" id="coupons" name="coupons" value="access">
											<label for="coupons">Manage Coupons</label>
										</fieldset>
                                        <fieldset>
											<input type="checkbox" id="shipping" name="shipping" value="access">
											<label for="shipping">Manage Shipping</label>
										</fieldset>
                                        <fieldset>
											<input type="checkbox" id="orders" name="orders" value="access">
											<label for="orders">Manage Orders</label>
										</fieldset>
                                        <fieldset>
											<input type="checkbox" id="reports" name="reports" value="access">
											<label for="reports">Manage Reports</label>
										</fieldset>

									</div>
								</div>
							</div>
                            <div class="col-md-4">
								<div class="form-group">
									
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="users"  name="users"  value="access">
											<label for="users">Manage Users</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="returns" name="returns" value="access">
											<label for="returns">Manage Returns</label>
										</fieldset>
                                        <fieldset>
											<input type="checkbox" id="reviews" name="reviews" value="access">
											<label for="reviews">Manage Reviews</label>
										</fieldset>
                                        <fieldset>
											<input type="checkbox" id="adminuserrole" name="adminuserrole" value="access">
											<label for="adminuserrole">Manage Admins</label>
										</fieldset>
									</div>
								</div>
							</div>
                        </div>


                            
                        
					
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add">
                            <a href="{{route('manage.admins')}}" class="btn btn-rounded btn-danger mb-5">Cancel</a>
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

<script type="text/javascript">

$(document).ready(function(){
    $('#profile_photo_path').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });

});
</script>
 
      
@endsection 
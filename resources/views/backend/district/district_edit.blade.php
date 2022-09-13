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
				  <h3 class="box-title">Edit District</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body"  >
					<div class="table-responsive"  > 
                    <form method = "POST"  action ="{{route('district.store', $districtData->id)}}"  >
                        @csrf
					  	
                            
                        <!-- Id of inputs should be respects , same as Jetstream mention it in user -->
                        <div class="form-group">
								
                                <h5>Choose Division  <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="division_id" id="division_id"  required="" class="form-control">
										<option value="" selected ="" disabled="">Select a Division</option>
                                        @foreach($divisions as $division)
										<option value="{{$division->id}}" {{ $division->id == $districtData->division_id ? 'selected' : '' }}>{{$division->division_name}}</option>
										@endforeach
									</select>
									@error('division_id')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            <div class="form-group">
								<h5>District Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="district_name" id ="district_name" class="form-control" value=" {{$districtData->district_name}}" required=""  >
									@error('district_name')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                           
                           
                            
                      

                       
                      


                            
                        
					
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                            <a href="{{route('manage.district')}}" class="btn btn-rounded btn-danger mb-5">Cancel</a>
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
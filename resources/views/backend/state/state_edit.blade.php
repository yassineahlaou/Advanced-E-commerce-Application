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
				  <h3 class="box-title">Edit State</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body"  >
					<div class="table-responsive"  > 
                    <form method = "POST"  action ="{{route('state.store', $state->id)}}"  >
                        @csrf
					  	
                            
                        <!-- Id of inputs should be respects , same as Jetstream mention it in user -->
                        <div class="form-group">
								
                                <h5>Choose Division  <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="division_id" id="division_id"  required="" class="form-control">
										<option value="" selected ="" disabled="">Select a Division</option>
                                        @foreach($divisions as $division)
										<option value="{{$division->id}}" {{ $division->id == $state->division_id ? 'selected' : '' }}>{{$division->division_name}}</option>
										@endforeach
									</select>
									@error('division_id')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            <div class="form-group">
								
                                <h5>Choose District <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="district_id" id="district_id"  required="" class="form-control">
										<option value="" disabled="" selected="">Select  District</option>

                                        @foreach($districts as $district)
										    <option value="{{$district->id}}" {{ $district->id == $state->district_id ? 'selected' : '' }}>{{$district->district_name}}</option>
										@endforeach
                                        
									</select>
									@error('district_id')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            <div class="form-group">
								<h5>State Name<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="state_name" id ="state_name" class="form-control" value=" {{$state->state_name}}" required=""  >
									@error('state_name')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            
                           
                            
                      

                       
                      


                            
                        
					
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                            <a href="{{route('manage.state')}}" class="btn btn-rounded btn-danger mb-5">Cancel</a>
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



<!-- the code below will help us to load subcategories of the category selected-->
<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{  url('/shipping/district/ajax') }}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="district_id"]').empty();
                       $('select[name="district_id"]').append('<option value="" disabled="" selected="">Select District</option>');
                          $.each(data, function(key, value){
                           
                              $('select[name="district_id"]').append('<option value="'+ value.id +'" >' + value.district_name + '</option>');
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
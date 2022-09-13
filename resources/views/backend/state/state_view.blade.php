@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">States List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>Division Name</th>
                                <th>District Name</th>
								<th>State Name</th>
								
								
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($states as $state)
							<tr>
                                <td>{{$state['shippingDivision']['division_name']}}</td>
                                <td>{{$state['shippingDistrict']['district_name']}}</td>
								<td>{{$state->state_name}}</td>
								
								
								<td >
                                    <a href="{{route('state.edit', $state->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('state.delete',$state->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                 </td>
								
							</tr>
                            @endforeach
							
						</tbody>
						
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			  
			  <!-- /.box -->          
			</div>
			<!-- /.col -->

            <!-- form add brand-->
            <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add New State</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form method = "POST"  action ="{{route('state.add')}}"  >
                        @csrf
					  	
                            
                        <!-- Id of inputs should be respects , same as Jetstream mention it in user -->
                        <div class="form-group">
								
                                <h5>Choose Category <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="division_id" id="division_id"  required="" class="form-control">
										<option value="" disabled="" selected="">Select  Division</option>
                                        @foreach($divisions as $division)
										<option value="{{$division->id}}">{{$division->division_name}}</option>
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
                                        
									</select>
									@error('district_id')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            <div class="form-group">
								<h5>State Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="state_name" id ="state_name" class="form-control" required=""  >
									@error('state_name')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                           

                            
                        
					
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add State">
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

      
@endsection 
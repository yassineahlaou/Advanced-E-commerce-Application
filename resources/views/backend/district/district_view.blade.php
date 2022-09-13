@extends('admin.admin_master')
@section('admin')



	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Districts List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>Division Name</th>
								<th>District Name</th>
								
								
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($districts as $item)
							<tr>
                                <td>{{$item['shippingDivision']['division_name']}}</td>
								<td>{{$item->district_name}}</td>
								
								
								<td width="30%">
                                    <a href="{{route('district.edit', $item->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('district.delete',$item->id)}}" class="btn btn-danger" id="delete">Delete</a>
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
				  <h3 class="box-title">Add New District</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form method = "POST"  action ="{{route('district.add')}}"  >
                        @csrf
					  	
                            
                        <!-- Id of inputs should be respects , same as Jetstream mention it in user -->
                        <div class="form-group">
								
                                <h5>Choose Category <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="division_id" id="division_id"  required="" class="form-control">
										<option value="" disabled="" selected="">Select Your Division</option>
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
								<h5>District Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="district_name" id ="district_name" class="form-control" required=""  >
									@error('district_name')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                           
                            

                            
                        
					
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add District">
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
 
      
@endsection 
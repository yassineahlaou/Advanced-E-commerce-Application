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
				  <h3 class="box-title">Sliders</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Title</th>
								<th>Description</th>
								<th>Image</th>
								<th>Status</th>
                                <th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($sliderData as $item)
							<tr>
								<td>{{$item->title}}</td>
								<td>{{$item->description}}</td>
								<td><img  src="{{asset($item->slider_image)}}"  style="width:70px;heigth:40px"></td>
                                <td>
                                @if($item->status == 1) 
                                        <span class="badge badge-pill badge-success">Active</span> 
                                    @else
                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                     @endif
                                </td>
								<td width="30%">
                                    <a href="{{route('slider.edit', $item->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('slider.delete',$item->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                    @if ($item->status == 1)
                                    <a href="{{route('slider.down',$item->id)}}" class="btn btn-danger" title="Disactivate"><i class="fa fa-arrow-down"></i></a>
                                @else
                                    <a href="{{route('slider.up',$item->id)}}" class="btn btn-success" title="Activate"><i class="fa fa-arrow-up"></i></a>
                                @endif
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
				  <h3 class="box-title">Add New Slider</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form method = "POST"  action ="{{route('slider.add')}}" enctype="multipart/form-data" >
                        @csrf
					  	
                            
                        <!-- Id of inputs should be respects , same as Jetstream mention it in user -->
                        
                            <div class="form-group">
								<h5>Slider Title <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="title" id ="title" class="form-control" required=""  >
									@error('title')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            <div class="form-group">
								<h5>Slider Description<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="description" id ="description" class="form-control" required=""  >
									@error('description')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            <div class="form-group">
								
								
                                <h5>Slider Image <span class="text-danger">*</span></h5>
								<div class="controls">
								<div class="custom-file">
								<input type="file" name ="slider_image" class="custom-file-input" id="customFile">
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
									@error('slider_image')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>

                            
                        
					
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Slider">
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
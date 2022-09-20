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
				  <h3 class="box-title">Brands <span class="badge badge-pill badge-danger"> {{ count($brandData) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Brand Name En</th>
								<th>Brand Name Fr</th>
								<th>Image</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($brandData as $item)
							<tr>
								<td>{{$item->brand_name_en}}</td>
								<td>{{$item->brand_name_fr}}</td>
								<td><img  src="{{asset($item->brand_image)}}"  style="width:70px;heigth:40px"></td>
								<td width="30%">
                                    <a href="{{route('brand.edit', $item->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('brand.delete',$item->id)}}" class="btn btn-danger" id="delete">Delete</a>
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
				  <h3 class="box-title">Add New Brand</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form method = "POST"  action ="{{route('brand.add')}}" enctype="multipart/form-data" >
                        @csrf
					  	
                            
                        <!-- Id of inputs should be respects , same as Jetstream mention it in user -->
                        
                            <div class="form-group">
								<h5>Brand Name English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="brand_name_en" id ="brand_name_en" class="form-control" required=""  >
									@error('brand_name_en')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            <div class="form-group">
								<h5>Brand Name Frensh <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="brand_name_fr" id ="brand_name_fr" class="form-control" required=""  >
									@error('brand_name_fr')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            <div class="form-group">
								
								
                                <h5>Brand Image <span class="text-danger">*</span></h5>
								<div class="controls">
								<div class="custom-file">
								<input type="file" name ="brand_image" class="custom-file-input" id="customFile">
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
									@error('brand_image')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>

                            
                        
					
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Brand">
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
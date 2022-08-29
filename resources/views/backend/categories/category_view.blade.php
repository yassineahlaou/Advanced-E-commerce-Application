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
				  <h3 class="box-title">Categories List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category Name En</th>
								<th>Category Name Fr</th>
								<th>Icon</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($categoryData as $item)
							<tr>
								<td>{{$item->category_name_en}}</td>
								<td>{{$item->category_name_fr}}</td>
								<td><span><i  class="{{$item->category_icon}}" ></i></span></td>
								<td width="30%">
								<a href="{{route('category.edit',$item->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('category.delete',$item->id)}}" class="btn btn-danger" id="delete">Delete</a>
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
				  <h3 class="box-title">Add New Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form method = "POST"  action ="{{route('category.add')}}"  >
                        @csrf
					  	
                            
                        <!-- Id of inputs should be respects , same as Jetstream mention it in user -->
                        
                            <div class="form-group">
								<h5>Category Name English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="category_name_en" id ="category_name_en" class="form-control" required=""  >
									@error('category_name_en')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            <div class="form-group">
								<h5>Category Name Frensh <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="category_name_fr" id ="category_name_fr" class="form-control" required=""  >
									@error('category_name_en')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            <div class="form-group">
								
                                <h5>Category Icon <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text" name="category_icon" class="form-control" required="" id="category_icon">
									@error('category_icon')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>

                            
                        
					
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Category">
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
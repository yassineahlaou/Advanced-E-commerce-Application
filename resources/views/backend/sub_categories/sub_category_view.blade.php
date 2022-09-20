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
				  <h3 class="box-title">Sub Categories List <span class="badge badge-pill badge-danger"> {{ count($subcategoryData) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>Category Name</th>
								<th>Sub-Category Name English</th>
								<th>Sub-Category Name Frensh</th>
								
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($subcategoryData as $item)
							<tr>
                                <td>{{$item['category']['category_name_en']}}</td>
								<td>{{$item->sub_category_name_en}}</td>
								<td>{{$item->sub_category_name_fr}}</td>
								
								<td width="30%">
                                    <a href="{{route('sub_category.edit', $item->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('sub_category.delete',$item->id)}}" class="btn btn-danger" id="delete">Delete</a>
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
				  <h3 class="box-title">Add New SubCategory</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form method = "POST"  action ="{{route('sub_category.add')}}"  >
                        @csrf
					  	
                            
                        <!-- Id of inputs should be respects , same as Jetstream mention it in user -->
                        <div class="form-group">
								
                                <h5>Choose Category <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="category_id" id="category_id"  required="" class="form-control">
										<option value="" disabled="" selected="">Select Your Category</option>
                                        @foreach($categories as $item)
										<option value="{{$item->id}}">{{$item->category_name_en}}</option>
										@endforeach
									</select>
									@error('category_id')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            <div class="form-group">
								<h5>Sub Category Name English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="sub_category_name_en" id ="sub_category_name_en" class="form-control" required=""  >
									@error('sub_category_name_en')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            <div class="form-group">
								<h5>Sub Category Name Frensh <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="sub_category_name_fr" id ="sub_category_name_fr" class="form-control" required=""  >
									@error('sub_category_name_fr')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            

                            
                        
					
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Sub Category">
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
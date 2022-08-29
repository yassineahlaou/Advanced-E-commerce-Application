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
				  <h3 class="box-title">Edit SubCategory</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body"  >
					<div class="table-responsive"  > 
                    <form method = "POST"  action ="{{route('sub_category.store', $subcategoryData->id)}}"  >
                        @csrf
					  	
                            
                        <!-- Id of inputs should be respects , same as Jetstream mention it in user -->
                        <div class="form-group">
								
                                <h5>Choose Category  <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="category_id" id="category_id"  required="" class="form-control">
										<option value="" selected ="" disabled="">Select a Category</option>
                                        @foreach($categories as $item)
										<option value="{{$item->id}}" {{ $item->id == $subcategoryData->category_id ? 'selected' : '' }}>{{$item->category_name_en}}</option>
										@endforeach
									</select>
									@error('category_id')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            <div class="form-group">
								<h5>SubCategory Name English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="sub_category_name_en" id ="sub_category_name_en" class="form-control" value=" {{$subcategoryData->sub_category_name_en}}" required=""  >
									@error('sub_category_name_en')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            <div class="form-group">
								<h5>Sub Category Name Frensh <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="sub_category_name_fr" id ="sub_category_name_fr" class="form-control" required="" value="{{$subcategoryData->sub_category_name_fr}}" >
									@error('category_name_fr')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                           
                            
                      

                       
                      


                            
                        
					
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                            <a href="{{route('all.SubCategories')}}" class="btn btn-rounded btn-danger mb-5">Cancel</a>
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
    $('#brand_image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });

});
</script>
 
      
@endsection 
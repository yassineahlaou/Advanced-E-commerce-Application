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
				  <h3 class="box-title">Edit SubSubCategory</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body"  >
					<div class="table-responsive"  > 
                    <form method = "POST"  action ="{{route('subsub_category.store', $subsubcategoryData->id)}}"  >
                        @csrf
					  	
                            
                        <!-- Id of inputs should be respects , same as Jetstream mention it in user -->
                        <div class="form-group">
								
                                <h5>Choose Category  <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="category_id" id="category_id"  required="" class="form-control">
										<option value="" selected ="" disabled="">Select a Category</option>
                                        @foreach($categories as $category)
										<option value="{{$category->id}}" {{ $category->id == $subsubcategoryData->category_id ? 'selected' : '' }}>{{$category->category_name_en}}</option>
										@endforeach
									</select>
									@error('category_id')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            <div class="form-group">
								
                                <h5>Choose Sub Category <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="sub_category_id" id="sub_category_id"  required="" class="form-control">
										<option value="" disabled="" selected="">Select Your SubCategory</option>

                                        @foreach($subcategories as $subcategory)
										<option value="{{$subcategory->id}}" {{ $subcategory->id == $subsubcategoryData->sub_category_id ? 'selected' : '' }}>{{$subcategory->sub_category_name_en}}</option>
										@endforeach
                                        
									</select>
									@error('sub_category_id')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            <div class="form-group">
								<h5>Sub Sub Category Name English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="sub_sub_category_name_en" id ="sub_sub_category_name_en" class="form-control" value=" {{$subsubcategoryData->sub_sub_category_name_en}}" required=""  >
									@error('sub_sub_category_name_en')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            <div class="form-group">
								<h5>Sub Sub Category Name Frensh <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="sub_sub_category_name_fr" id ="sub_sub_category_name_fr" class="form-control" required="" value="{{$subsubcategoryData->sub_sub_category_name_fr}}" >
									@error('sub_sub_category_name_fr')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                           
                            
                      

                       
                      


                            
                        
					
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                            <a href="{{route('all.SubSubCategories')}}" class="btn btn-rounded btn-danger mb-5">Cancel</a>
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

<!-- the code below will help us to load subcategories of the category selected-->
<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/categories/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="sub_category_id"]').empty();
                       $('select[name="sub_category_id"]').append('<option value="" disabled="" selected="">Select Your SubCategory</option>');
                          $.each(data, function(key, value){
                           
                              $('select[name="sub_category_id"]').append('<option value="'+ value.id +'" >' + value.sub_category_name_en + '</option>');
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
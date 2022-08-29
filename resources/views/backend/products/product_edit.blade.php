@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Product</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method = "POST"  action ="{{route('product.update', $productData->id)}}" enctype="multipart/form-data">
                    @csrf
					  <div class="row">
						<div class="col-12">	
                            <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
								
                                <h5>Choose Brand  <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="brand_id" id="brand_id"  required="" class="form-control">
										<option value="" selected ="" disabled="">Select a Brand</option>
                                        @foreach($brandData as $brand)
										<option value="{{$brand->id}}" {{ $brand->id == $productData->brand_id ? 'selected' : '' }}>{{$brand->brand_name_en}}</option>
										@endforeach
									</select>
									@error('brand_id')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
								
                                <h5>Choose Category  <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="category_id" id="category_id"  required="" class="form-control">
										<option value="" selected ="" disabled="">Select a Category</option>
                                        @foreach($categories as $category)
										<option value="{{$category->id}}" {{ $category->id == $productData->category_id ? 'selected' : '' }}>{{$category->category_name_en}}</option>
										@endforeach
									</select>
									@error('category_id')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
								
                                <h5>Choose Sub Category  <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="sub_category_id" id="sub_category_id"  required="" class="form-control">
										<option value="" selected ="" disabled="">Select a SubCategory</option>
                                        @foreach($subcategories as $subcategory)
										<option value="{{$subcategory->id}}" {{ $subcategory->id == $productData->sub_category_id ? 'selected' : '' }}>{{$subcategory->sub_category_name_en}}</option>
										@endforeach
                                        
									</select>
									@error('sub_category_id')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
								
                                <h5>Choose Sub Sub Category  <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="sub_sub_category_id" id="sub_sub_category_id"  required="" class="form-control">
										<option value="" selected ="" disabled="">Select a SubSubCategory</option>
                                        @foreach($subsubcategories as $subsubcategory)
										<option value="{{$subsubcategory->id}}" {{ $subsubcategory->id == $productData->sub_sub_category_id ? 'selected' : '' }}>{{$subsubcategory->sub_sub_category_name_en}}</option>
										@endforeach
                                       
									</select>
									@error('sub_sub_category_id')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                                </div>
                            					
                                <div class="col-md-6">
							<div class="form-group">
								<h5>Product Name English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_name_en" id="product_name_en" required="" class="form-control" value="{{$productData->product_name_en}}" > 
                                    @error('product_name_en')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            </div>
                            <div class="col-md-6">

                            <div class="form-group">
								<h5>Product Name Frensh<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_name_fr" id="product_name_fr" required="" class="form-control" value="{{$productData->product_name_fr}}"> 
                                    @error('product_name_fr')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Product Code<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_code" id="product_code" required="" class="form-control" value="{{$productData->product_code}}"> 
                                    @error('product_code')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Product Quantity<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_qty" id="product_qty"  class="form-control" value="{{$productData->product_qty}}"> 
                                    @error('product_qty')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Product Tags English<span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" value="{{$productData->product_tags_en}}" name="product_tags_en" id="product_tags_en" data-role="tagsinput" required="" placeholder="add tags" /> 
                                    @error('product_tags_en')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                                </div>

                                <div class="col-md-6">
                            <div class="form-group">
								<h5>Product Tags Frensh<span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" value="{{$productData->product_tags_fr}}" name="product_tags_fr" id="product_tags_fr"  required="" data-role="tagsinput" placeholder="add tags" /> 
                                    @error('product_tags_fr')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                                </div>
                                <div class="col-md-6">
                            <div class="form-group">
								<h5>Product Size English<span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" value="{{$productData->product_size_en}}" name="product_size_en" id="product_size_en"  data-role="tagsinput" placeholder="add tags" /> 
                                    @error('product_size_en')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                                </div>
                                <div class="col-md-6">
                            <div class="form-group">
								<h5>Product Size Frensh<span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" value="{{$productData->product_size_fr}}" name="product_size_fr"  id="product_size_fr" data-role="tagsinput" placeholder="add tags" /> 
                                    @error('product_size_fr')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                                </div>
                                <div class="col-md-6">
                            <div class="form-group">
								<h5>Product Color English<span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" value="{{$productData->product_color_en}}" name="product_color_en" id="product_color_en" data-role="tagsinput"  placeholder="add tags" /> 
                                    @error('product_color_en')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                                </div>
                                <div class="col-md-6">
                            <div class="form-group">
								<h5>Product Color Frensh<span class="text-danger">*</span></h5>
								<div class="controls">
                                <input type="text" value="{{$productData->product_color_fr}}" name="product_color_fr" id="product_color_fr"  data-role="tagsinput" placeholder="add tags" /> 
                                    @error('product_color_fr')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                                </div>
                                <div class="col-md-6">
                            <div class="form-group">
								<h5>Product Selling Price<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="selling_price" id="selling_price"  class="form-control" value="{{$productData->selling_price}}"> 
                                    @error('selling_price')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            </div>

                            

                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Product Discount Price<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="discount_price" id="discount_price"  class="form-control" value="{{$productData->discount_price}}"> 
                                    @error('discount_price')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            </div>
							
                                <div class="col-md-12">
							<div class="form-group">
								<h5>Main Thumbnail<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="product_thumbnail" id="product_thumbnail" class="form-control" onChange="mainThamUrl(this)" >
                                    <img id="mainThum" src="{{ (!empty($productData->product_thumbnail)) ? url($productData->product_thumbnail) : url('upload/no_image.jpg')}}"   style="width: 80px; heigth: 80px"></img>
                                    @error('product_thumbnail')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror  
                                </div>
							</div>
							
						</div>

                        

                        
						

                        <div class="col-md-6">
							<div class="form-group">
								<h5>Short Description English <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="short_desc_en" id="short_desc_en" class="form-control" required="">{{$productData->short_desc_en}}</textarea>
                                    @error('short_desc_en')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
								</div>
							</div>
						</div>
                        <div class="col-md-6">
							<div class="form-group">
								<h5>Short Description Frensh <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="short_desc_fr" id="short_desc_fr" class="form-control" required="" >{{$productData->short_desc_fr}}</textarea>
                                    @error('short_desc_fr')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
								</div>
							</div>
						</div>
                        <div class="col-md-6">
							<div class="form-group">
								<h5>Long Description English <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="long_desc_en" id="editor1" class="form-control" rows="10" cols="80" required="" >{{$productData->long_desc_en}}</textarea>
                                    @error('long_desc_en')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
								</div>
							</div>
						</div>
                        <div class="col-md-6">
							<div class="form-group">
								<h5>Long Description Frensh <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="long_desc_fr" id="editor2" class="form-control" rows="10" cols="80" required="" >{{$productData->long_desc_fr}}</textarea>
                                    @error('long_desc_fr')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
								</div>
							</div>
						</div>
                     
						
                       
						
							<div class="col-md-6">
								<div class="form-group">
									
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_1" name="hot_deal"  value="1" {{($productData->hot_deal == 1 ) ? 'checked' : ''}}>
											<label for="checkbox_1">Hot Deals</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_2" name="featured" value="1" {{($productData->featured == 1 ) ? 'checked' : ''}}>
											<label for="checkbox_2">Featured</label>
										</fieldset>
									</div>
								</div>
							</div>

                            <div class="col-md-6">
								<div class="form-group">
									
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_3"  name="sprecial_offer"  value="1"  {{($productData->sprecial_offer == 1 ) ? 'checked' : ''}}>
											<label for="checkbox_3">Special Offer</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_4" name="speacial_deal" value="1" {{($productData->speacial_deal == 1 ) ? 'checked' : ''}}>
											<label for="checkbox_4">Special Deal</label>
										</fieldset>
									</div>
								</div>
							</div>
						</div>
						
						
						<div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
                        <a href="{{route('manage.product')}}" class="btn btn-rounded btn-danger mb-5">Cancel</a>
						</div>
</div>
</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->

        <!-- mulimage update/delete -->
        <section class="content">
            <div class="row">
            <div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
					<h4 class="box-title">Multiple Images <strong>Update</strong></h4>
				  </div>

				 <form method = "POST"  action ="{{route('mulimage.update' )}}" enctype="multipart/form-data">
                 @csrf

                    <div class="row row-sm">
                    @foreach($multiimages as $img)
                        <div class="col-md-3" style="justify-content: space-around;">
                        <div class="card" style="width: 18rem;">
                        <img  src="{{ (!empty($img->photo_name)) ? url($img->photo_name) : url('upload/no_image.jpg')}}" ></img>
  <div class="card-body">
    <h5 class="card-title"><a href="{{route('mulimage.delete', $img->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete Image"> <i class="fa fa-trash"></i></a></h5>
    <p class="card-text">
        <div class="form-group">
        <label class="form-control-label">Update Image <span class="text-danger">*</span></label>
    		<input class="form-control" type="file" name="multi_image[ {{$img->id}} ]">
        </div></p>
    
  </div>
</div>

                       
                       
                        


</div>
@endforeach
</div>

<div class="text-xs-right" style="margin:12px">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Multiple Images">
		 </div>
</form>
				</div>
			  </div>

            </div>
</section>

		<!-- Insert New Images -->
		<section class="content">
            <div class="row">
            <div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
					<h4 class="box-title">Add More Images </h4>
				  </div>

				 <form method = "POST"  action ="{{route('mulimage.add' ,  $productData->id)}}" enctype="multipart/form-data">
                 @csrf
				 <div class="col-md-12">
				 <div class="form-group">
								<h5>Multiple Image<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="multi_image[]"  id="multiImg"  class="form-control" multiple="" required=""> 
                                    @error('multi_image')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror  
                                    <div class="row" id="preview_img"></div>

	 		                  </div>
                                </div>
</div>

<div class="text-xs-right" style="margin:12px">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add These Images">
		 </div>
</form>
				</div>
			  </div>

            </div>
</section>


	  </div>

      <!-- the code below will help us to load subcategories of the category selected-->
      <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/products/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="sub_category_id"]').empty();
                       $('select[name="sub_category_id"]').append('<option value="" disabled="" selected="">Select Your SubCategory</option>');
                          $.each(data, function(key, value){
                              $('select[name="sub_category_id"]').append('<option value="'+ value.id +'">' + value.sub_category_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
    </script>

    <!-- the code below will help us to load subsubcategories of the subcategory selected-->

<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="sub_category_id"]').on('change', function(){
            var sub_category_id = $(this).val();
            if(sub_category_id) {
                $.ajax({
                    url: "{{  url('/products/subsubcategory/ajax') }}/"+sub_category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="sub_sub_category_id"]').empty();
                       $('select[name="sub_sub_category_id"]').append('<option value="" disabled="" selected="">Select Your SubSubCategory</option>');
                          $.each(data, function(key, value){
                              $('select[name="sub_sub_category_id"]').append('<option value="'+ value.id +'">' + value.sub_sub_category_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
    </script>
<!-- script to show the main image-->
<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThum').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
    //input.files checkes if there is an input
    //input.files[0] means the first index i only want the first image to be shown
</script>

<!-- script to show all the images -->

<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>









 
      
@endsection 
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
					<form method = "POST"  action ="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
                    @csrf
					  <div class="row">
						<div class="col-12">	
                            <div class="row">

                          
                                <div class="col-md-6">
                                <div class="form-group">
								
                                <h5>Choose Category  <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="category_id" id="category_id"  required="" class="form-control">
										<option value="" selected ="" disabled="">Select a Category</option>
                                        @foreach($categories as $category)
										<option value="{{$category->id}}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{$category->category_name_en}}</option>
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
								<h5>Post Title English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="post_title_en" id="post_title_en" required="" class="form-control" value="{{$post->post_title_en}}" > 
                                    @error('post_title_en')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            </div>
                            <div class="col-md-6">

                            <div class="form-group">
								<h5>Post Title Frensh<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="post_title_fr" id="post_title_fr" required="" class="form-control" value="{{$post->post_title_fr}}"> 
                                    @error('post_title_fr')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            </div>
							<div class="col-md-6">

                            <div class="form-group">
								<h5>Post Author<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="post_author" id="post_author" required="" class="form-control" value="{{$post->post_author}}"> 
                                    @error('post_author')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            </div>
                           
                           

                             
                              
                               
                               

                            

                           
							
                                <div class="col-md-12">
							<div class="form-group">
								<h5>Post Image<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="post_image" id="post_image" class="form-control" onChange="postimageUrl(this)" >
                                    <img id="postimage" src="{{ (!empty($post->post_image)) ? url($post->post_image) : url('upload/no_image.jpg')}}"   style="width: 80px; heigth: 80px"></img>
                                    @error('post_image')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror  
                                </div>
							</div>
							
						</div>

                        

                        
						

                       
                       
                        <div class="col-md-6">
							<div class="form-group">
								<h5>Post Details English <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="post_details_en" id="editor1" class="form-control" rows="10" cols="80" required="" >{{$post->post_details_en}}</textarea>
                                    @error('post_details_en')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
								</div>
							</div>
						</div>
                        <div class="col-md-6">
							<div class="form-group">
								<h5>Post Details Frensh <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="post_details_fr" id="editor2" class="form-control" rows="10" cols="80" required="" >{{$post->post_details_fr}}</textarea>
                                    @error('post_details_fr')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
								</div>
							</div>
						</div>
                     
						
                       
						
							

                           
						</div>
						
						
						<div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Post">
                        <a href="{{route('view.posts')}}" class="btn btn-rounded btn-danger mb-5">Cancel</a>
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
       

		


	  </div>

     
   
<!-- script to show the main image-->
<script type="text/javascript">
	function postimageUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#postimage').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
    //input.files checkes if there is an input
    //input.files[0] means the first index i only want the first image to be shown
</script>











 
      
@endsection 
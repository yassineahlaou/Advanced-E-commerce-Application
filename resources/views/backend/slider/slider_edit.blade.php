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
				  <h3 class="box-title">Edit Slider</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body"  >
					<div class="table-responsive"  > 
                    <form method = "POST" class="noover" action ="{{route('slider.store', $sliderData->id)}}" enctype="multipart/form-data" >
                        @csrf
					  	
                            
                        <!-- Id of inputs should be respects , same as Jetstream mention it in user -->
                        
                            <div class="form-group">
								<h5>Title <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="title" id ="title" class="form-control" value=" {{$sliderData->title}}" required=""  >
									@error('title')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            <div class="form-group">
								<h5>Description <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="description" id ="description" class="form-control" required="" value="{{$sliderData->description}}" >
									@error('description')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            <div class="row">

                        <div class="col-md-5">
                            <div class="form-group">
								
                                <h5>Slider Image <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="file" name="slider_image" class="form-control"  id="slider_image" value="{{$sliderData->slider_image}}">
									@error('slider_image')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                        </div>

                        <div class="col-md-5">

                                <img id="showImage" src="{{ (!empty($sliderData->slider_image)) ? url($sliderData->slider_image) : url('upload/no_image.jpg')}}"  style="width: 100px; heigth: 100px">
                        </div>
                        </div>


                            
                        
					
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Slider">
                            <a href="{{route('slider.content')}}" class="btn btn-rounded btn-danger mb-5">Cancel</a>
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
    $('#slider_image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });

});
</script>
 
      
@endsection 
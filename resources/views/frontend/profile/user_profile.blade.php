@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">

                    <img class="card-img-top"  style="padding-top: 3mm" style="border-radius: 50%"  src="{{ (!empty($userData->profile_photo_path)) ? url('upload/user_images/'.$userData->profile_photo_path) : url('upload/no_image.jpg')}}" width =  100%; heigth = 100%>

                    <ul  class="list-group  list-group-flush " style="padding-top: 3mm">

                        <a href="/" class="btn btn-sm btn-primary mb-5 btn-block">Home</a>
                        <a href="{{route('user.profile')}}" class="btn btn-sm btn-primary mb-5 btn-block">Edit Profile</a>
                        <a href="{{ route('user.change.password')}}" class="btn btn-sm btn-primary mb-5 btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-sm btn-danger mb-5 btn-block">Logout</a>
                

                    </ul>

                </div>

                <div class="col-md-2">

                </div>

                <div class="col-md-6">
                    <div class="card">
                     <h3 class="text-center">
                            <span class="text-danger"> Hi.....</span><strong>{{ Auth::user()->name }}</strong> , Update your Profile!
                     </h3>
                     <div class="card-body">

                        <form method="POST" action ="{{route('user.profile.store')}}" enctype="multipart/form-data">
                        @csrf
                       
		                    <div class="form-group">
		                        <label class="info-title" for="name">Name<span>*</span></label>
		                        <input type="text" class="form-control" id="name" name="name" value="{{$userData->name}}">
			                    @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                @enderror
		                    </div>

                            <div class="form-group">
		                        <label class="info-title" for="email">Email<span>*</span></label>
		                        <input type="email" class="form-control" id="name" name="email" value="{{$userData->email}}">
			                    @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                 @enderror
		                    </div>
                            <div class="form-group">
		                        <label class="info-title" for="phone">Phone<span>*</span></label>
		                        <input type="text" class="form-control" id="phone" name="phone" value="{{$userData->phone}}">
			                    @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                @enderror
		                    </div>
        
                            <div class="form-group">
                                <label class="info-title" for="profile_photo_path">Profile Image<span>*</span></label>
								
			                    <div class="controls">
				                    <input  type="file" name="profile_photo_path" class="form-control" required="" id="image"> 
                                </div>
		                    </div>


       

                            <div style="padding-bottom: 3mm;">
                                <button  type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button>

                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
       

    <script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });

    });
    </script>

@endsection
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
                        <a href="{{route('user.orders')}}" class="btn btn-sm btn-primary mb-5 btn-block">My Orders</a>
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
                            <span class="text-danger"> Hi.....</span><strong>{{ Auth::user()->name }}</strong> , Update your Password!
                     </h3>
                     <div class="card-body">

                        <form method="POST" action ="{{route('user.update.password')}}" >
                        @csrf
                       
		                    <div class="form-group">
		                        <label class="info-title" for="name">Current Password<span>*</span></label>
		                        <input type="password" class="form-control" id="current_password" name="oldpassword" >
			                    @error('oldpassword')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                @enderror
		                    </div>

                            <div class="form-group">
		                        <label class="info-title" for="email">New Password<span>*</span></label>
		                        <input type="password" class="form-control" id="password" name="password" >
			                    @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                 @enderror
		                    </div>
                            <div class="form-group">
		                        <label class="info-title" for="phone">Confirm New Password<span>*</span></label>
		                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" >
			                    @error('password_confirmation')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                @enderror
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
       

    

@endsection
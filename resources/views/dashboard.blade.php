@extends('frontend.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">

                <img class="card-img-top"  style="padding-top: 3mm" style="border-radius: 50%"  src="{{ (!empty($userData->profile_photo_path)) ? url('upload/user_images/'.$userData->profile_photo_path) : url('upload/no_image.jpg')}}" width =  100%; heigth = 100%>

                <ul  class="list-group  list-group-flush " style="padding-top: 3mm">

                <a href="/" class="btn btn-sm btn-primary mb-5 btn-block">Home</a>
                <a href="{{route('user.orders')}}" class="btn btn-sm btn-primary mb-5 btn-block">My Orders</a>
                <a href="{{route('user.canceled')}}" class="btn btn-sm btn-primary mb-5 btn-block">Canceld Orders</a>
                <a href="{{route('user.returns')}}" class="btn btn-sm btn-primary mb-5 btn-block">Returnes</a>
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
                            <span class="text-danger"> Hi.....</span><strong>{{ Auth::user()->name }}</strong> Welcome to Ahlaou Shop
</h3>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
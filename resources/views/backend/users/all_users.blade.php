@extends('admin.admin_master')
@section('admin')



	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Users List <span class="badge badge-pill badge-danger"> {{ count($users) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
								<th>Name</th>
								<th>Email</th>
                                <th>Phone</th>
                               
                                <th>Status</th>

								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($users as $user)
							<tr>
							@if ($user->avatar == NULL)
                                @if ($user->profile_photo_path == NULL)
                                <td><img  src="{{asset('upload/no_image.jpg')}}"  style="width:70px;heigth:40px"></td>
                                @else
                                <td><img  src="{{asset('upload/user_images/'. $user->profile_photo_path)}}"  style="width:70px;heigth:40px"></td>
								@endif
								
								@else
								<td><img  src="{{$user->avatar}}"  style="width:70px;heigth:40px"></td>
								@endif

                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                @if ($user->UserIsOnline())

                                    <td><span class="badge badge-pill badge-success">Online</span></td>
                                @else

                                 <td>Last Seen :<span class="badge badge-pill badge-danger">{{$user->last_seen}}</span></td>

                               @endif

								
								<td width="20%">
								<a href="" class="btn btn-info">Edit</a>
                                <a href="" class="btn btn-danger" id="delete">Delete</a>
                               
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
            
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
 
      
@endsection 
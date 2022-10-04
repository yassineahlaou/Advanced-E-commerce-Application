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
				  <h3 class="box-title">Admins List <span class="badge badge-pill badge-danger"> {{ count($admins) }} </span></h3>
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
                                <th>Previliges</th>
                              

								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($admins as $admin)
							<tr>
                           
                                <td><img  src="{{ (!empty($admin->profile_photo_path)) ? url($admin->profile_photo_path) : url('upload/no_image.jpg')}}"  style="width:70px;heigth:40px"></td>
								<td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->phone}}</td>
                                <td>
                                @if($admin->brand == "access")
                                    <span style="margin:7px" class="badge btn-primary">Manage Brands</span>
                                @endif
                                @if($admin->categories == "access")
                                    <span style="margin:7px" class="badge btn-secondary">Manage Categories</span>
                                @endif
                                @if($admin->products == "access")
                                    <span style="margin:7px" class="badge btn-success">Manage Products</span>
                                @endif
                                @if($admin->slider == "access")
                                    <span style="margin:7px" class="badge btn-danger">Manage Sliders</span>
                                @endif
                                @if($admin->coupons == "access")
                                    <span style="margin:7px" class="badge btn-warning">Manage Coupons</span>
                                @endif
                                @if($admin->shipping == "access")
                                    <span style="margin:7px" class="badge btn-info">Manage Shipping</span>
                                @endif
                                @if($admin->orders == "access")
                                    <span style="margin:7px" class="badge btn-light">Manage Orders</span>
                                @endif
                                @if($admin->reports == "access")
                                    <span style="margin:7px" class="badge btn-dark">Manage Reports</span>
                                @endif
                                @if($admin->users == "access")
                                    <span style="margin:7px" class="badge btn-primary">Manage Users</span>
                                @endif
                                @if($admin->returns == "access")
                                    <span style="margin:7px" class="badge btn-success">Manage Returns</span>
                                @endif
                                @if($admin->reviews == "access")
                                    <span style="margin:7px" class="badge btn-warning">Manage Reviews</span>
                                @endif
                                @if($admin->adminuserrole == "access")
                                    <span style="margin:7px" class="badge btn-info">Manage Admins</span>
                                @endif
                                @if($admin->blog == "access")
                                    <span style="margin:7px" class="badge btn-success">Manage Admins</span>
                                @endif
                                </td>
                              
                                

								
								<td width="20%">
								<a href="{{route('admin.edit',$admin->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('admin.delete',$admin->id)}}" class="btn btn-danger" id="deleteadmin">Delete</a>
                               
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
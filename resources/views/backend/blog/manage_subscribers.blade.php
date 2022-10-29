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
				  <h3 class="box-title">Manage Subscribers <span class="badge badge-pill badge-danger"> {{ count($subscribers) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Subscriber Email</th>
								<th>Subscription Date</th>
								
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($subscribers as $subscriber)
							<tr>
								<td>{{$subscriber->email}}</td>
								<td>{{$subscriber->created_at}}</td>
								
								<td >
                                    
                                    <a href="{{route('delete.subscriber',$subscriber->id)}}" class="btn btn-danger" id="delete">Delete</a>
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
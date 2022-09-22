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
				  <h3 class="box-title">Pending Reveiws List <span class="badge badge-pill badge-danger"> {{ count($reviews) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>Review Date </th>
								<th>Product Image </th>
								<th>Product Code </th>
								<th>Product Name </th>
								<th>User ID </th>
                                <th>User Name </th>
								<th>Review Status </th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($reviews as $review)
							<tr>
								
                                
								<td>{{$review->created_at}}</td>
								<td><img  src="{{asset($review['product']['product_thumbnail'])}}"  style="width:70px;heigth:40px"></td>
                                <td>{{$review['product']['product_code']}}</td>
                                <td>{{$review['product']['product_name_en']}}</td>
                                <td>{{$review->user_id}}</td>
                                <td>{{$review['user']['name']}}</td>

                                <td>
                                   
		 	                            <span class="badge badge-pill badge-danger">Canceled</span>

		 	                     
                                 </td>
                              

								
								<td width="20%">
								<a href="{{route('review.details',$review->id)}}" class="btn btn-info"><i style="margin-right:7px" class="fa fa-eye"></i>View</a>
                              
                               
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
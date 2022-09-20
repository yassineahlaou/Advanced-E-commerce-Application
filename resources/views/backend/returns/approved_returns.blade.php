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
				  <h3 class="box-title">Pending Orders  List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>Return Date </th>
								<th>Invoice </th>
								<th>Amount </th>
								<th>Payment </th>
								<th>Return Status </th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($returns as $return)
							<tr>
								
                                
								<td>{{$return->return_date}}</td>
                                <td>{{$return->invoice_no}}</td>
                                <td>{{$return->amount_after}}</td>
                                <td>{{$return->payment_method}}</td>
                                <td>
                                   
		 	                            <span class="badge badge-pill badge-primary">Approved</span>

		 	                     
                                 </td>
                              

								
								<td width="20%">
								<a href="{{route('return.details',$return->id)}}" class="btn btn-info"><i style="margin-right:7px" class="fa fa-eye"></i>View</a>
                              
                               
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
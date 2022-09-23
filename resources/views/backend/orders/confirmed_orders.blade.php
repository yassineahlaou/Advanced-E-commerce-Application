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
				  <h3 class="box-title">Confirmed Orders List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>Date </th>
								<th>Order Number</th>
								<th>Invoice </th>
								<th>Amount </th>
								<th>Payment </th>
								<th>Status </th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($orders as $order)
							<tr>
								
                                
								<td>{{$order->order_date}}</td>
								<td>{{$order->order_number}}</td>
                                <td>{{$order->invoice_no}}</td>
                                <td>{{$order->amount_after}}</td>
                                <td>{{$order->payment_method}}</td>
                                <td>
                                   
		 	                            <span class="badge badge-pill badge-primary">Confirmed</span>
											
		 	                     
                                 </td>
                              

								
								<td width="25%">
								<a href="{{route('order.details',$order->id)}}" class="btn btn-info"><i style="margin-right:7px" class="fa fa-eye"></i>View</a>
                                <a target="_blank" href="{{route('admin.invoice', $order->id)}}"  class="btn btn-danger" ><i class="fa fa-download" style="color: white;margin-right:7px"></i>Invoice</a>
                               
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
@extends('admin.admin_master')
@section('admin')

<div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Coupons List <span class="badge badge-pill badge-danger"> {{ count($coupons) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Coupon Name</th>
								<th>Coupon Discount</th>
								<th>Coupon Validity</th>
								<th>Status </th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($coupons as $item)
							<tr>
								<td>{{$item->coupon_name}}</td>
								<td>{{$item->coupon_discount}}%</td>
                                <td >
                                    {{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }}
                                </td>
                                <td >
                                @if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                  
                                    @if ($item->status == 1)
		 	                            <span class="badge badge-pill badge-success"> Valid </span> 
                                    @else
                                    <span class="badge badge-pill badge-danger">Invalide</span>
                                    @endif

                                @else
                                        <span class="badge badge-pill badge-danger">Invalide</span>
                                 @endif
                                </td>

                                <td width="30%">
								<a href="{{route('coupon.edit',$item->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('coupon.delete',$item->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                @if ($item->status == 1)
                                    <a href="{{route('coupon.down',$item->id)}}" class="btn btn-danger" title="Disactivate"><i class="fa fa-arrow-down"></i></a>
                                @else
                                    <a href="{{route('coupon.up',$item->id)}}" class="btn btn-success" title="Activate"><i class="fa fa-arrow-up"></i></a>
                                @endif
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
            <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add New Coupon</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form method = "POST"  action ="{{route('coupon.add')}}"  >
                        @csrf
					  	
                            
                        <!-- Id of inputs should be respects , same as Jetstream mention it in user -->
                        
                            <div class="form-group">
								<h5>Coupon Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="coupon_name" id ="coupon_name" class="form-control" required=""  >
									@error('coupon_name')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            <div class="form-group">
								<h5>Coupon Discount (%) <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="coupon_discount" id ="coupon_discount" class="form-control" required=""  >
									@error('coupon_discount')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror
                                </div>
							</div>
                            <div class="form-group">
								
                                <h5>Coupon Validity <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="date" name="coupon_validity" class="form-control" required="" id="coupon_validity" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
									@error('coupon_validity')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>

                            
                        
					
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Coupon">
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
 
      
@endsection
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
				  <h3 class="box-title">Products List <span class="badge badge-pill badge-danger"> {{ count($productsData) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
								<th>Product Name English</th>
								<th>Product Name Frensh</th>
                                <th>Product Price</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th>Status</th>

								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($productsData as $product)
							<tr>
								
                                <td><img  src="{{asset($product->product_thumbnail)}}"  style="width:70px;heigth:40px"></td>
								<td>{{$product->product_name_en}}</td>
                                <td>{{$product->product_name_fr}}</td>
                                <td>{{$product->selling_price}}</td>
                                <td>{{$product->product_qty}}</td>
                                <td>
                                    @if($product->discount_price == NULL)
		 	                            <span class="badge badge-pill badge-danger">No Discount</span>

		 	                        @else
		 	                            @php
		 	                                $amount = $product->selling_price - $product->discount_price;
		 	                                $discount = ($amount/$product->selling_price) * 100;
		 	                            @endphp
                                        <span class="badge badge-pill badge-danger">{{ round($discount)  }} %</span>

		 	                        @endif
                                 </td>
                                <td>
                                    @if($product->status == 1) 
                                        <span class="badge badge-pill badge-success">Active</span> 
                                    @else
                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                     @endif
                                </td>

								
								<td width="20%">
								<a href="{{route('product.edit',$product->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('product.delete',$product->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                @if ($product->status == 1)
                                    <a href="{{route('status.down',$product->id)}}" class="btn btn-danger" title="Disactivate"><i class="fa fa-arrow-down"></i></a>
                                @else
                                    <a href="{{route('status.up',$product->id)}}" class="btn btn-success" title="Activate"><i class="fa fa-arrow-up"></i></a>
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
            
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
 
      
@endsection 
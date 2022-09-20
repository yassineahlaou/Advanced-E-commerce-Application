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
				  <h3 class="box-title">Order Details</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                    <div class="row">
                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>Shipping Details</strong> </h4>
                    </div>
                   
                    <table class="table">
            <tr>
              <th> Shipping Name : </th>
               <th> {{ $order->name }} </th>
            </tr>

             <tr>
              <th> Shipping Phone : </th>
               <th> {{ $order->phone }} </th>
            </tr>

             <tr>
              <th> Shipping Email : </th>
               <th> {{ $order->email }} </th>
            </tr>
            <tr>
              <th> Shipping Address : </th>
               <th> {{ $order->adrress }} </th>
            </tr>

             <tr>
              <th> Division : </th>
               <th> {{$order['division']['division_name']}} </th>
            </tr>

             <tr>
              <th> District : </th>
               <th> {{$order['district']['district_name']}} </th>
            </tr>

             <tr>
              <th> State : </th>
               <th>{{$order['state']['state_name']}}</th>
            </tr>

            <tr>
              <th> Post Code : </th>
               <th> {{ $order->post_code }} </th>
            </tr>
            <tr>
              <th> Order Notes : </th>
               <th> {{ $order->notes }} </th>
            </tr>


            <tr>
              <th> Order Date : </th>
               <th> {{ $order->order_date }} </th>
            </tr>

           </table>

                    
                    </div>
			    </div>
                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>Order Details</strong> <span class="text-danger"> Invoice : {{ $order->invoice_no }}</span></h4>
                    </div>
                    <table class="table">
            <tr>
              <th>  Name : </th>
               <th> {{ $order['user']['name']}} </th>
            </tr>

             <tr>
              <th>  Phone : </th>
               <th> {{ $order['user']['phone'] }} </th>
            </tr>

             <tr>
              <th> Payment Type : </th>
               <th> {{ $order->payment_method }} </th>
            </tr>

             <tr>
              <th> Tranx ID : </th>
               <th> {{ $order->transaction_id }} </th>
            </tr>

             <tr>
              <th> Invoice  : </th>
               <th class="text-danger"> {{ $order->invoice_no }} </th>
            </tr>
            <tr>
              <th> Total Before Coupon : </th>
               <th>${{ $order->amount_before }} </th>
            </tr>
            <tr>
              <th> Coupon Used : </th>
               <th>{{ $order->coupon_name }} </th>
            </tr>

             <tr>
              <th> Total After Coupon : </th>
               <th> <strong>${{ $order->amount_after }} </strong></th>
            </tr>

            <tr>
              <th> Order Status : </th>
               <th>   
               @if($order->status == 'Pending')
               	<a href="{{ route('pending.confirm',$order->id) }}" class="btn btn-block btn-success" id="confirm">Confirm Order</a>
                 <a href="{{ route('cancel.order',$order->id) }}" class="btn btn-block btn-danger" id="cancel">Cancel Order</a>
                @elseif ($order->status == 'Confirmed')
                <a href="{{ route('confirmed.process',$order->id) }}" class="btn btn-block btn-success" id="process">Process Order</a>
                <a href="{{ route('cancel.order',$order->id) }}" class="btn btn-block btn-danger" id="cancel">Cancel Order</a>
                @elseif ($order->status == 'Processing')
                <a href="{{ route('processing.ship',$order->id) }}" class="btn btn-block btn-success" id="ship">Ship Order</a>
                <a href="{{ route('cancel.order',$order->id) }}" class="btn btn-block btn-danger" id="cancel">Cancel Order</a>
                @elseif ($order->status == 'Shipped')
                <a href="{{ route('picked.shipped',$order->id) }}" class="btn btn-block btn-success" id="picked">Picked Order</a>
                
                @elseif ($order->status == 'Picked')
                <a href="{{ route('delivered.picked',$order->id) }}" class="btn btn-block btn-success" id="deliver">Deliver Order</a>
                @elseif ($order->status == 'Delivered')
                <span class="badge badge-pill badge-primary">Delivered</span>

                @else
                  <span class="badge badge-pill badge-primary">Canceled</span>
                

               	@endif
              </th>
            </tr>



           </table>
                    </div>
			    </div>
</div>
<div class="row">
                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>Order Items</strong> </h4>
                    </div>
                    <table class="table">
            <tbody>

              <tr>
                <td width="10%">
                  <label for=""> Image</label>
                </td>

                 <td width="20%">
                  <label for=""> Product Name </label>
                </td>

             <td width="10%">
                  <label for=""> Product Code</label>
                </td>


               <td width="10%">
                  <label for=""> Color </label>
                </td>

                <td width="10%">
                  <label for=""> Size </label>
                </td>

                  <td width="10%">
                  <label for=""> Quantity </label>
                </td>

               <td width="10%">
                  <label for=""> Price </label>
                </td>
                <td width="10%">
                  <label for=""> Return Requested </label>
                </td>

              </tr>


              @foreach($orderItems as $item)
       <tr>
               <td width="10%">
                  <label for=""><img src="{{ asset($item['product']['product_thumbnail']) }}" height="50px;" width="50px;"> </label>
                </td>

               <td width="20%">
                  <label for=""> {{ $item['product']['product_name_en']}}</label>
                </td>


                <td width="10%">
                  <label for=""> {{ $item['product']['product_code'] }}</label>
                </td>

               <td width="10%">
                  <label for=""> {{ $item->color }}</label>
                </td>

               <td width="10%">
                  <label for=""> {{ $item->size }}</label>
                </td>

                <td width="10%">
                  <label for=""> {{ $item->qty }}</label>
                </td>

         <td width="10%">
                  <label for=""> ${{ $item->price }}  </label>
                </td>
                <td width="10%">
                  @if ($item->returned == "YES")
                  <label for=""> <span class="badge badge-pill badge-danger">YES</span>  </label>
                  @else
                  <label for=""> <span class="badge badge-pill badge-success">NO</span>   </label>
                  @endif
                </td>

              </tr>
              @endforeach





            </tbody>

          </table>
                    </div>
			    </div>
</div>
<div class="row">
          <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>Return Request Details</strong> </h4>
                    </div>
                    <table class="table">
                    <tr>
              <th> Return Date : </th>
               <th> {{ $order->return_date }} </th>
            </tr>
            <tr>
              <th> Return Reason : </th>
               <th> {{ $order->return_reason }} </th>
            </tr>

             <tr>
              <th>Return Images : </th>
              
               <th> 
                @foreach ($images as $pic) 
                <img src="{{asset($pic->photo_name)}}" alt="" width="100px" height="100px">
                @endforeach

               </th>
            </tr>
            <tr>
              <th> Order Status : </th>
               <th >   
               @if($order->return_status == 'Pending')
               	<a  href="{{ route('return.confirm',$order->id) }}" class="btn btn-block btn-success" id="approvereturn">Confirm Return</a>
                 <a href="{{ route('return.cancel',$order->id) }}" class="btn btn-block btn-danger" id="cancelreturn">Cancel Return</a>
                @elseif ($order->return_status == 'Approved')
                <span class="badge badge-pill badge-success">Approved</span>

                @else
                  <span class="badge badge-pill badge-danger">Canceled</span>
                

               	@endif
              </th>
            </tr>
</table>
                    
</div>
</div>
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
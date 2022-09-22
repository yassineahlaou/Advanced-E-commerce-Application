@extends('admin.admin_master')
@section('admin')
@php
	$date = Carbon\Carbon::now()->format('d F Y');
	$todaySales = App\Models\Order::where('order_date',$date)->sum('amount_after');
	$month = Carbon\Carbon::now()->format('F');
	$monthSales = App\Models\Order::where('order_month',$month)->sum('amount_after');
    $year = Carbon\Carbon::now()->format('Y');
	$yearSales = App\Models\Order::where('order_year',$year)->sum('amount_after');
    $allOrders = App\Models\Order::get();
@endphp
<div class="container-full">

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
							<div class="icon bg-primary-light rounded w-60 h-60">
								<i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Today's sales</p>
								<h3 class="text-white mb-0 font-weight-500">{{$todaySales}} <small class="text-success">USD</small></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
							<div class="icon bg-warning-light rounded w-60 h-60">
								<i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Month's sales</p>
								<h3 class="text-white mb-0 font-weight-500">{{$monthSales}} <small class="text-success">USD</small></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
							<div class="icon bg-info-light rounded w-60 h-60">
								<i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Years's sales</p>
								<h3 class="text-white mb-0 font-weight-500">{{$yearSales}} <small class="text-success">USD</small></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
							<div class="icon bg-danger-light rounded w-60 h-60">
								<i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Total Orders</p>
								<h3 class="text-white mb-0 font-weight-500">{{count($allOrders)}} <small class="text-success">Orders</small></h3>
							</div>
						</div>
					</div>
				</div>
				
				
				
				
				
				
				<div class="col-12">
					<div class="box">
						<div class="box-header">
							<h4 class="box-title align-items-start flex-column">
								Last Pending Orders
								<small class="subtitle"></small>
							</h4>
						</div>
						@php
							$orders = App\Models\Order::where('status','Pending')->limit(7)->orderBy('id','DESC')->get();
						@endphp
						<div class="box-body">
							<div class="table-responsive">
								<table class="table no-border">
									<thead>
										<tr class="text-uppercase bg-lightest">
											<th style="min-width: 200px"><span class="text-white">Order Date</span></th>
											<th style="min-width: 100px"><span class="text-fade">Invouce No</span></th>
											<th style="min-width: 100px"><span class="text-fade">Amount</span></th>
											<th style="min-width: 150px"><span class="text-fade">Payment Method</span></th>
											<th style="min-width: 130px"><span class="text-fade">Status</span></th>
											<th style="min-width: 130px"><span class="text-fade">Action</span></th>
											
										</tr>
									</thead>
									<tbody>
										@foreach ($orders as $order)
										<tr>										
											<td >
											<span class="text-white font-weight-600 d-block font-size-16">
													{{$order->order_date}}
											</span>
											<span class="text-fade d-block">{{ Carbon\Carbon::parse($order->created_at)->format('H:i:s')  }}</span>
											
											</td>
											<td>
											<span class="text-white font-weight-600 d-block font-size-16">
											{{$order->invoice_no}}
											</span>
											</td>
											<td>
											<span class="text-white font-weight-600 d-block font-size-16">
											{{$order->amount_after}} $
											</span>
											</td>
											<td>
											<span class="text-white font-weight-600 d-block font-size-16">
											{{$order->payment_method}}
												</span>
											</td>
											<td>
												<span class="badge badge-primary-light badge-lg">Pending</span>
											</td>
											<td class="text-right">
											<a href="{{route('order.details',$order->id)}}" class="btn btn-info"><i style="margin-right:7px" class="fa fa-eye"></i>View</a>
											</td>
										</tr>
										@endforeach
									
									</tbody>
								</table>
							</div>
						</div>
					</div>  
				</div>
			</div>
		</section>
		<!-- /.content -->
</div>

      @endsection
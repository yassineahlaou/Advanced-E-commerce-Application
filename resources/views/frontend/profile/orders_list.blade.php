@extends('frontend.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">

                <img class="card-img-top"  style="padding-top: 3mm" style="border-radius: 50%"  src="{{ (!empty($userData->profile_photo_path)) ? url('upload/user_images/'.$userData->profile_photo_path) : url('upload/no_image.jpg')}}" width =  100%; heigth = 100%>

                <ul  class="list-group  list-group-flush " style="padding-top: 3mm">

                <a href="/" class="btn btn-sm btn-primary mb-5 btn-block">Home</a>
                <a href="{{route('user.orders')}}" class="btn btn-sm btn-primary mb-5 btn-block">My Orders</a>
                <a href="{{route('user.canceled')}}" class="btn btn-sm btn-primary mb-5 btn-block">Canceld Orders</a>
                <a href="{{route('user.returns')}}" class="btn btn-sm btn-primary mb-5 btn-block">Returnes</a>
                <a href="{{route('user.profile')}}" class="btn btn-sm btn-primary mb-5 btn-block">Edit Profile</a>
                <a href="{{ route('user.change.password')}}" class="btn btn-sm btn-primary mb-5 btn-block">Change Password</a>
                <a href="{{ route('user.logout') }}" class="btn btn-sm btn-danger mb-5 btn-block">Logout</a>
                

                </ul>

                </div>

                

                <div class="col-md-10">

<div class="table-responsive">
  <table class="table">
    <tbody>

      <tr style="background: #e2e2e2;">
        <td class="col-md-1">
          <label for=""> Date</label>
        </td>

        <td class="col-md-3">
          <label for=""> Total</label>
        </td>

        <td class="col-md-1" >
          <label for=""> Payment</label>
        </td>


        <td class="col-md-2">
          <label for=""> Invoice</label>
        </td>

         <td class="col-md-2">
          <label for=""> Order</label>
        </td>

         <td class="col-md-2" >
          <label for=""> Action </label>
        </td>

      </tr>


      @foreach($orders as $order)
<tr>
        <td class="col-md-1">
          <label for=""> {{ $order->order_date }}</label>
        </td>

        <td class="col-md-3">
          <label for=""> ${{ $order->amount_after }}</label>
        </td>


         <td class="col-md-3">
          <label for=""> {{ $order->payment_method }}</label>
        </td>

        <td class="col-md-2">
          <label for=""> {{ $order->invoice_no }}</label>
        </td>

         <td class="col-md-2">
          <label for=""> 
            <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span>
    @if($order->return_status != NULL)
            @if ($order->return_status == "Pending")

            <span class="badge badge-pill badge-danger" style="background:#418DB9;" >Return Requested </span>
            @elseif($order->return_status == "Approved")
            <span class="badge badge-pill badge-danger" style="background:green;" >Return Approved </span>
            @elseif($order->return_status == "Canceled")
            <span class="badge badge-pill badge-danger" style="background:red;" >Return Canceled </span>
            @endif
            @endif

            </label>
        </td>

 <td class="col-md-1" >
  <a href="{{route('order.view', $order->id)}}" class="btn btn-sm btn-primary" style="margin-bottom:10px"><i class="fa fa-eye"></i> View</a>

   <a target="_blank" href="{{route('order.invoice', $order->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-download" style="color: white;"></i> Invoice </a>

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


@endsection
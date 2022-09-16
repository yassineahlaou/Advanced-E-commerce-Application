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
                <a href="{{route('user.profile')}}" class="btn btn-sm btn-primary mb-5 btn-block">Edit Profile</a>
                <a href="{{ route('user.change.password')}}" class="btn btn-sm btn-primary mb-5 btn-block">Change Password</a>
                <a href="{{ route('user.logout') }}" class="btn btn-sm btn-danger mb-5 btn-block">Logout</a>
                

                </ul>

                </div>

                

                <div class="col-md-10">
                    <h3 class="text-center">Order Number: {{$order->order_number}}</h3>

<div class="table-responsive">
  <table class="table">
    <tbody>

      <tr style="background: #e2e2e2;">
        <td class="col-md-1">
          <label for=""> Product Image</label>
        </td>
        <td class="col-md-1">
          <label for=""> Product Name</label>
        </td>
        <td class="col-md-1">
          <label for=""> Product Code</label>
        </td>

        <td class="col-md-3">
          <label for=""> Color</label>
        </td>

        <td class="col-md-1" >
          <label for=""> Size</label>
        </td>


        <td class="col-md-2">
          <label for=""> Quantity</label>
        </td>

         <td class="col-md-2">
          <label for=""> Price</label>
        </td>

        

      </tr>


      @foreach($orderItems as $item)
<tr>
        <td class="col-md-1">
          <label for=""> <img src="{{asset($item['product']['product_thumbnail'])}}" alt="" style="width:80px; height:80px;"></img></label>
        </td>
        <td class="col-md-3">
          <label for=""> <a href="/product/details/{{$item->product_id}}/{{$item['product']['product_slug_en']}}">{{$item['product']['product_name_en']}}</a></label>
        </td>
        <td class="col-md-3">
          <label for=""> {{$item['product']['product_code']}}</label>
        </td>

        <td class="col-md-3">
          <label for=""> {{$item->color}}</label>
        </td>


         <td class="col-md-3">
          <label for=""> {{ $item->size}}</label>
        </td>

        <td class="col-md-2">
          <label for=""> {{ $item->qty }}</label>
        </td>

         <td class="col-md-2">
           
          <label for=""> ${{ $item->price }}</label>

           
        </td>

 

      </tr>
      @endforeach





    </tbody>

  </table>

</div>





</div> 

<div class="col-md-12">
                    <h3 class="text-center">Shipping Informations</h3>

<div class="table-responsive">
  <table class="table">
    <tbody>

      <tr style="background: #e2e2e2;">
        <td class="col-md-2">
          <label for=""> Shipping Name</label>
        </td>
        <td class="col-md-2">
          <label for=""> Shipping Email</label>
        </td>
        <td class="col-md-2">
          <label for=""> Shipping Phone</label>
        </td>
        <td class="col-md-2">
          <label for=""> Shipping Adrress</label>
        </td>

        <td class="col-md-2">
          <label for=""> Division</label>
        </td>
        <td class="col-md-2">
          <label for=""> District</label>
        </td>
        <td class="col-md-2">
          <label for=""> State</label>
        </td>

        <td class="col-md-2" >
          <label for=""> Post Code</label>
        </td>


       

         <td class="col-md-2">
          <label for=""> Order Date</label>
        </td>

        

      </tr>


      
<tr>
        <td class="col-md-2">
          <label for=""> {{$order->name}}</label>
        </td>
        <td class="col-md-2">
          <label for=""> {{$order->email}}</label>
        </td>
        <td class="col-md-2">
          <label for=""> {{$order->phone}}</label>
        </td>
        <td class="col-md-2">
          <label for=""> {{$order->adrress}}</label>
        </td>

        <td class="col-md-2">
           
          <label for=""> {{$order['division']['division_name']}}</label>
        </td>
        <td class="col-md-2">
          <label for=""> {{$order['district']['district_name']}}</label>
        </td>
        <td class="col-md-2">
          <label for=""> {{$order['state']['state_name']}}</label>
        </td>


         <td class="col-md-2">
          <label for=""> {{ $order->post_code}}</label>
        </td>

        <td class="col-md-2">
          <label for=""> {{ $order->order_date }}</label>
        </td>

       

 

      </tr>
    





    </tbody>

  </table>

</div>





</div> 
            </div>
        </div>
    </div>


@endsection
@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('css/over.css')}}">

<style type="text/css">
	
	body {
     background-color: #eeeeee;
     font-family: 'Open Sans', serif
 }
 .container {
     
 }
 .card {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     -webkit-box-orient: vertical;
     -webkit-box-direction: normal;
     -ms-flex-direction: column;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid rgba(0, 0, 0, 0.1);
     border-radius: 0.10rem
 }
 .card-header:first-child {
     border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
 }
 .card-header {
     padding: 0.75rem 1.25rem;
     margin-bottom: 0;
     background-color: #fff;
     border-bottom: 1px solid rgba(0, 0, 0, 0.1)
 }
 .track {
     position: relative;
     background-color: #ddd;
     height: 7px;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     margin-bottom: 60px;
     margin-top: 50px
 }
 .track .step {
     -webkit-box-flex: 1;
     -ms-flex-positive: 1;
     flex-grow: 1;
     width: 25%;
     margin-top: -18px;
     text-align: center;
     position: relative
 }
 .track .step.active:before {
     background: #157ed2
 }
 .track .step::before {
     height: 7px;
     position: absolute;
     content: "";
     width: 100%;
     left: 0;
     top: 18px
 }
 .track .step.active .icon {
     background: #157ed2;
     color: #fff
 }
 .track .icon {
     display: inline-block;
     width: 40px;
     height: 40px;
     line-height: 40px;
     position: relative;
     border-radius: 100%;
     background: #ddd
 }
 .track .step.active .text {
     font-weight: 400;
     color: #000
 }
 .track .text {
     display: block;
     margin-top: 7px
 }
 .itemside {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     width: 100%
 }
 .itemside .aside {
     position: relative;
     -ms-flex-negative: 0;
     flex-shrink: 0
 }
 .img-sm {
     width: 80px;
     height: 80px;
     padding: 7px
 }
 ul.row,
 ul.row-sm {
     list-style: none;
     padding: 0
 }
 .itemside .info {
     padding-left: 15px;
     padding-right: 7px
 }
 .itemside .title {
     display: block;
     margin-bottom: 5px;
     color: #157ed2
 }
 p {
     margin-top: 0;
     margin-bottom: 1rem
 }
 .btn-warning {
     color: #ffffff;
     background-color: #157ed2;
     border-color: #157ed2;
     border-radius: 1px
 }
 .btn-warning:hover {
     color: #ffffff;
     background-color: #157ed2;
     border-color: #157ed2;
     border-radius: 1px
 }
</style>


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
<div class="track">
   
     @if($order->status == 'Pending')

 <div class="step active"> <span class="icon"> <i class="fa fa-list-alt"></i> </span> <span class="text">Order Submitted <br>{{$order->created_at}}</span></div>
 



<div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Confirmed <br>{{$order->confirmed_date}}</span> </div>

    <div class="step"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text"> Order Processing <br>{{$order->processing_date}} </span> </div>
    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Order Shipped <br>{{$order->shipped_date		}} </span> </div>
    <div class="step"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text">Ready to Pick <br>{{$order->picked_date	}}</span> </div>
   

     <div class="step"> <span class="icon"> <i class="fa fa-calendar-check-o"></i> </span> <span class="text">Delivered <br>{{$order->delivered_date}}</span> </div>

            


  @elseif($order->status == 'Confirmed')

  <div class="step active"> <span class="icon"> <i class="fa fa-list-alt"></i> </span> <span class="text">Order Submitted <br>{{$order->created_at}}</span></div>
 



<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Confirmed <br>{{$order->confirmed_date}}</span> </div>

    <div class="step"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text"> Order Processing <br>{{$order->processing_date}} </span> </div>
    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Order Shipped <br>{{$order->shipped_date		}} </span> </div>
    <div class="step"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text">Ready to Pick <br>{{$order->picked_date	}}</span> </div>
   

     <div class="step"> <span class="icon"> <i class="fa fa-calendar-check-o"></i> </span> <span class="text">Delivered <br>{{$order->delivered_date}}</span> </div>



     <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered </span> </div>

 @elseif($order->status == 'Processing')

 <div class="step active"> <span class="icon"> <i class="fa fa-list-alt"></i> </span> <span class="text">Order Submitted <br>{{$order->created_at}}</span></div>
 



 <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Confirmed <br>{{$order->confirmed_date}}</span> </div>
 
     <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text"> Order Processing <br>{{$order->processing_date}} </span> </div>
     <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Order Shipped <br>{{$order->shipped_date		}} </span> </div>
     <div class="step"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text">Ready to Pick <br>{{$order->picked_date	}}</span> </div>
    
 
      <div class="step"> <span class="icon"> <i class="fa fa-calendar-check-o"></i> </span> <span class="text">Delivered <br>{{$order->delivered_date}}</span> </div>


 @elseif($order->status == 'Shipped')

 <div class="step active"> <span class="icon"> <i class="fa fa-list-alt"></i> </span> <span class="text">Order Submitted <br>{{$order->created_at}}</span></div>
 



 <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Confirmed <br>{{$order->confirmed_date}}</span> </div>
 
     <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text"> Order Processing <br>{{$order->processing_date}} </span> </div>
     <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Order Shipped <br>{{$order->shipped_date		}} </span> </div>
     <div class="step"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text">Ready to Pick <br>{{$order->picked_date	}}</span> </div>
    
 
      <div class="step"> <span class="icon"> <i class="fa fa-calendar-check-o"></i> </span> <span class="text">Delivered <br>{{$order->delivered_date}}</span> </div>
      @elseif($order->status == 'Picked')

<div class="step active"> <span class="icon"> <i class="fa fa-list-alt"></i> </span> <span class="text">Order Submitted <br>{{$order->created_at}}</span></div>




<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Confirmed <br>{{$order->confirmed_date}}</span> </div>

    <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text"> Order Processing <br>{{$order->processing_date}} </span> </div>
    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Order Shipped <br>{{$order->shipped_date		}} </span> </div>
    <div class="step active"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text">Picked <br>{{$order->picked_date	}}</span> </div>
   

     <div class="step"> <span class="icon"> <i class="fa fa-calendar-check-o"></i> </span> <span class="text">Delivered <br>{{$order->delivered_date}}</span> </div>
    @elseif($order->status == 'Delivered')

    <div class="step active"> <span class="icon"> <i class="fa fa-list-alt"></i> </span> <span class="text">Order Submitted <br>{{$order->created_at}}</span></div>
 



 <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Confirmed <br>{{$order->confirmed_date}}</span> </div>
 
     <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text"> Order Processing <br>{{$order->processing_date}} </span> </div>
     <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Order Shipped <br>{{$order->shipped_date		}} </span> </div>
     <div class="step active"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text">Ready to Pick <br>{{$order->picked_date	}}</span> </div>
    
 
      <div class="step active"> <span class="icon"> <i class="fa fa-calendar-check-o"></i> </span> <span class="text">Delivered <br>{{$order->delivered_date}}</span> </div>

     @endif  




            </div> <!-- // end track  -->
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
            @if($order->status == "Delivered" && $order->return_reason == NULL)



            <form action="{{ route('return.order',$order->id) }}" method="post" enctype="multipart/form-data"> 
        @csrf
        <h3 class="text-center">Return Request</h3>



<div class="form-group" style="padding-top : 5px">	
<label for="label"> Select Items You Want to Return</label>
<div class="table-responsive">
  <table class="table">
    <tbody>

      <tr style="background: #e2e2e2;">
      <td class="col-md-1">
         
        </td>
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
@php

$temp = 0;
@endphp

      @foreach($orderItems as $item)

      @php

$temp = $temp + 1;
@endphp
<tr>
<td class="col-md-1">
 
<input type="checkbox" name="{{$item->product_id}}" value="returned" >


</td>
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
		                   		
                           
                             		
		    	    </div> <!-- end col md 4 -->

              <div class="form-group">

<label for="label"> Tell Us Why you want to Return this order!</label>
<textarea name="return_reason" id="" required="" class="form-control" cols="30" rows="05" style="resize:none" placeholder="Return Reason"></textarea>
</div>

<div class="form-group">
<label for="label">Add Images</label>
								
									<input type="file" name="return_image[]"  id="return_images"  class="form-control" multiple="" required=""> 
                                   
                                    <div  id="preview_img"></div>

	 		                 
                                </div>


<button type="submit" class="btn btn-danger" style="float:right;margin-top:7px;margin-bottom:7px">Submit</button>
</form>

@endif

@if ($order->return_reason != NULL)

<h3 class="text-center">Return Request</h3>
<div class="text-center">

<h4 class="badge badge-pill badge-warning " style="background: green;font-size:14px;padding:10px">You Have already sent a return request for this order!</h4>
</div>
<div class="formflex">
<label for="label"> Return Reason:</label>
<textarea name="return_reason" id=""  class="form-control"  style="width:50%;resize:none" disabled >"{{$order->return_reason}}"</textarea>
</div>
@endif
        </div>
      
    </div>

    <script>
 
  $(document).ready(function(){
   $('#return_images').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80).css("padding-right", "7px").css("padding-top", "5px")
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                     
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>


<script> 
  //check if at leaset one checkbox is checked
  $(document).ready(function(){
    $("form").submit(function(){
		if ($('input:checkbox').filter(':checked').length < 1){
        alert("Check at least one item in your Return Request!");
		return false;
		}
    });
});
  </script>

@endsection
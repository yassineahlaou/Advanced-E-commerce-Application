<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>
<link rel="icon" href="{{asset('backend/images/icon-shop.ico')}}">

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: green;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: green; font-size: 26px;"><strong>Ahlaou Shop</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               Ahlaou Shop Client Service
               Email:yassineahlaou@gmail.com <br>
               Phone: +212 691009722 <br>
               33, haj ali eddrkaoui, 85000 Tiznit , Maroc <br>

            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;"></table>
  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
          <h3><span>Ship To:</span> </h3>
           <strong>Name:</strong> {{$order->name}} <br>
           <strong>Email:</strong> {{$order->email}} <br>
           <strong>Phone:</strong> {{$order->phone}} <br>
           <strong>Division:</strong>{{$order['division']['division_name']}} <br>
           <strong>District:</strong> {{$order['district']['district_name']}} <br>
           <strong>State:</strong> {{$order['state']['state_name']}} <br>
           <strong>Street Address:</strong> {{$order->adrress}} <br>
           <strong>Post Code:</strong> {{$order->post_code}}
         </p>
        </td>
        <td>
          <p class="font">
            <h3><span style="color: green;">Invoice:</span> {{$order->invoice_no}}</h3>
            Order Date: {{$order->order_date}} <br>
             Delivery Date: <br>
            Payment Type : {{$order->payment_method}} </span>
         </p>
        </td>
    </tr>
  </table>
  <br/>
<h3>Products</h3>
  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">
        <th>Image</th>
        <th>Product Name</th>
        <th>Size</th>
        <th>Color</th>
        <th>Code</th>
        <th>Quantity</th>
        <th>Unit Price </th>
        <th>Total </th>
      </tr>
    </thead>
    <tbody>

    @foreach($orderItems as $item)
     
      <tr class="font">
        <td align="center">
         <!-- here we worked with public_path not asset because we are opening the invoice outside of localhost -->
            <img src="{{public_path($item['product']['product_thumbnail'])}}" height="60px;" width="60px;" alt="">
        </td>
        <td align="center">{{$item['product']['product_name_en']}}</td>
        <td align="center">{{ $item->size}}</td>
        <td align="center">{{$item->color}}</td>
        <td align="center">{{$item['product']['product_code']}}</td>
        <td align="center">{{ $item->qty }}</td>
        <td align="center">${{ $item->price }}</td>
        @php  
        $total = $item->qty * $item->price
        @endphp
        <td align="center">${{$total}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        @if ($order->coupon_name == NULL)
                <td align="right" >
                    <h2><span style="color: green;">Subtotal:</span> ${{$order->amount_after}}</h2>
                    <h2><span style="color: green;">Total:</span> ${{$order->amount_after}}</h2>
                    {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
                </td>
        @else

        <td align="right" >
                    <h2><span style="color: green;">Subtotal:</span> ${{$order->amount_before}}</h2>
                    <h2><span style="color: green;">Coupon:</span> {{$order->coupon_name}}({{$order->coupon_discount}}%)</h2>
                    <h2><span style="color: green;">Total:</span> ${{$order->amount_after}}</h2>
                    {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
                </td>
        @endif

    </tr>
  </table>
  <div class="thanks mt-3">
    <p>Thanks For Buying Products..!!</p>
  </div>
  <div class="authority float-right mt-5">
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
    </div>
</body>
</html>
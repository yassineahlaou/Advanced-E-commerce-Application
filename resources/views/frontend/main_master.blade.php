<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>Ahlaou Shop</title>
<link rel="icon" href="{{asset('backend/images/icon-shop.ico')}}">

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link href="{{asset('frontend/assets/css/lightbox.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">




<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type ="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<script src="https://js.stripe.com/v3/"></script>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->

@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/echo.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script> 

<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/scripts.js')}}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;
    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;
    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;
    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>

<!-- Modal Add to cart -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        @if (session()->get('language') == 'english')
        <h5 class="modal-title" id="exampleModalLabel"><strong><span id="productnameenglish"></span></strong></h5>
        @else
        <h5 class="modal-title" id="exampleModalLabel"><strong><span id="productnamefrensh"></span></strong></h5>
        @endif

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <div class="row">

                  <div class="col-md-4">

                     <div class="card" style="width: 18rem;">
                           <img src="..." class="card-img-top" alt="..." style="height: 200px; width: 200px;" id="productimage">
                           
                     </div>

                  </div><!-- // end col md -->


                  <div class="col-md-4">

                     <ul class="list-group">

                           <li class="list-group-item"> @if (session()->get('language') == 'english') Product Price: @else Prix du Produit: @endif<strong class="text-danger">$<span id="productprice"></span></strong> <del id="oldprice"></del></li>
                           <li class="list-group-item">Product Code: <strong id="productcode"></strong></li>
                           @if (session()->get('language') == 'english')
                           <li class="list-group-item"> @if (session()->get('language') == 'english') Category: @else Categorie: @endif<strong id="productcategoryenglish"></strong></li>
                           @else
                           <li class="list-group-item"> @if (session()->get('language') == 'english') Category: @else Categorie: @endif<strong id="productcategoryfrensh"></strong></li>
                           @endif
                           <li class="list-group-item">Brand: <strong id="productbrand"></strong></li>
                           @if (session()->get('language') == 'english')
                           <li class="list-group-item">Stock : <span class="badge badge-pill badge-success" id="availableenglish" style="background: green; color: white;"></span> 
<span class="badge badge-pill badge-danger" id="stockoutenglish" style="background: red; color: white;"></span> </li>
@else
<li class="list-group-item">Stock : <span class="badge badge-pill badge-success" id="availablefrensh" style="background: green; color: white;"></span> 
<span class="badge badge-pill badge-danger" id="stockoutfrensh" style="background: red; color: white;"></span> </li>
@endif
                     </ul>

                  </div><!-- // end col md -->


                  <div class="col-md-4">

                     <div class="form-group"  id="selectcolor">
                           <label for="color">@if (session()->get('language') == 'english') Choose Color @else Choisir La Couleur @endif</label>
                           <select class="form-control" id="color" name="color">
                                
                           </select>
                           </div>  <!-- // end form group -->


                           <div class="form-group" id="selectsize">
                                 <label for="size">@if (session()->get('language') == 'english') Choose Size @else Choisir La Taille @endif</label>
                                 <select class="form-control" id="size" name="size">
                                     
                                 </select>
                           </div>  <!-- // end form group -->

                           <div class="form-group">
                                    <label for="qty">@if (session()->get('language') == 'english') Quantity @else Quantité @endif</label>
                                    <input type="number" class="form-control" id="qty" value="1" min="1" >
                           </div> <!-- // end form group -->

                           <input type="hidden" id="product_id">

                           <button type="submit" class="..." id="add" onclick="addToCart()">@if (session()->get('language') == 'english') Add To Cart @else Ajouter au Panier @endif</button>


                  </div><!-- // end col md -->


            </div> <!-- // end row -->



        



      </div>
      
    </div>
  </div>
</div>

<script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
// Displaying Product View with Modal 
function productView(id){
    // alert(id)
    $.ajax({
        type: 'GET',
        url: '/product/view/modal/'+id,
        dataType:'json',
        success:function(data){

         //our data

            $('#productnameenglish').text(data.product.product_name_en);
            $('#productnamefrensh').text(data.product.product_name_fr);
            $('#productimage').attr('src','/'+data.product.product_thumbnail);//'/' refer to public folder
            $('#product_id').val(id);
            $('#qty').val(1);
            if (data.product.discount_price == null){
               $('#productprice').text(data.product.selling_price);
               $('#oldprice').hide();
            }
            else
            {
               
               $('#productprice').text(data.product.discount_price);
               $('#oldprice').text('$'+data.product.selling_price );

            }
            $('#productcode').text(data.product.product_code);
            $('#productcategoryenglish').text(data.product.category.category_name_en);
            $('#productcategoryfrensh').text(data.product.category.category_name_fr);
            $('#productbrand').text(data.product.brand.brand_name_en);

            if(data.product.product_qty == 0){
               
               $('#availableenglish').text('');
               $('#stockoutenglish').text('');
               $('#availablefrensh').text('');
               $('#stockoutfrensh').text('');
               $('#stockoutenglish').text('Out Of Stock');
               $('#stockoutfrensh').text('Non Valable');
               
               $('#add').attr('class','btn btn-primary mb-2 disabled');
               

            }
            else{
               $('#availableenglish').text('');
               $('#stockoutenglish').text('');
               $('#availablefrensh').text('');
               $('#stockoutfrensh').text('');
               $('#availableenglish').text('Available');
               $('#availablefrensh').text('Valable');
              
               $('#add').attr('class','btn btn-primary mb-2');

            }


                        // Color
    $('select[name="color"]').empty();        
    
    $.each(data.color,function(key,value){
        $('select[name="color"]').append('<option value=" '+value+' ">'+value+' </option>')
    }) // end color


    // Color
    $('select[name="size"]').empty();  
      
    $.each(data.size,function(key,value){
        $('select[name="size"]').append('<option value=" '+value+' ">'+value+' </option>')
    }) 
    if (data.size == "") {
            $('#selectsize').hide();
        }else{
            $('#selectsize').show();
        }
    
    // end size
           
           
            
           
        }
    })
 
}

//Add to Cart

function addToCart(){
  console.log($('#productnameenglish').text());
  console.log($('#productnamefrensh').text());
      if ( $('#productnameenglish').text() == ""){
        var product_name = $('#productnamefrensh').text();
      }
      else{
        var product_name = $('#productnameenglish').text();

      }
        
        var id = $('#product_id').val();
        var color = $('#color option:selected').text();
        var size = $('#size option:selected').text();
        var quantity = $('#qty').val();
        $.ajax({
            type: "POST",
            dataType: 'json',
            data:{
                color:color, size:size, quantity:quantity, product_name:product_name
            },
            url: "/cart/data/store/"+id,
            success:function(data){
              $('#closeModel').click();
              miniCart();//we should run the function
                //console.log(data)
                 // Start Message 
                 //We can easily reuse configuration by creating our own Swal with Swal.mixin({ ...options })
                 const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      //title: 'Product Added To Cart',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                  //if there is no error
                    Toast.fire({
                        icon: 'success',
                        title: data.success
                    })
                }else{
                  //if there is an error
                    Toast.fire({
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        })
    }

    //showing the cart

    function miniCart(){
        $.ajax({
            type: 'GET',
            url: '/product/mini/cart',
            dataType:'json',
            success:function(response){
                //console.log(response)
                $('span[id="carttotal"]').text(response.cartTotal);//Having 2 elements with the same ID is not valid html according to the W3C specification. thats's why we use this syntax cause we have 2 elements with the same id in our headr, span(carttotal)
                $('#cartcount').text(response.cartQty);
                var miniCart = ""
                $.each(response.carts, function(key,value){
                    miniCart += `
                    
                    <div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="/product/details/${value.id}/${value.options.slugname}"><img src="/${value.options.image}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                    @if (session()->get('language') == 'english')
                      <h3 class="name"><a href="/product/details/${value.id}/${value.options.slugname}">${value.options.nameenglish}</a></h3>
                    @else
                    <h3 class="name"><a href="/product/details/${value.id}/${value.options.slugname}">${value.options.namefrensh}</a></h3>
                    @endif


                    
                      <div class="price">$${value.price} * ${value.qty}</div>
                    </div>
                    <div class="col-xs-1 action"> <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button></div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>`
                });
                
                $('#miniCart').html(miniCart);//jquery function
            }
       
            
          
          })
        }
        miniCart();//we should run the function

        //removing from cart

        function miniCartRemove(rowId){
        $.ajax({
            type: 'GET',
            url: '/minicart/product-remove/'+rowId,
            dataType:'json',
            success:function(data){
            miniCart();
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }

    function addToWishList(product_id){
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: "/add-to-wishlist/"+product_id,
        success:function(data){
          // Start Message 
          const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
        }
    })
}

function wishlist(){
        $.ajax({
            type: 'GET',
            url: '/user/get-wishlist-product',
            dataType:'json',
            success:function(response){
                var rows = ""
                $.each(response, function(key,value){
                    rows += `<tr>
                    <td class="col-md-2"><img src="/${value.product.product_thumbnail} " alt="imga"></td>
                    <td class="col-md-7">
                    @if (session()->get('language') == 'english')
                        <div class="product-name"><a href="/product/details/${value.product.id}/${value.product.product_slug_en}">${value.product.product_name_en}</a></div>
                        @else
                        <div class="product-name"><a href="/product/details/${value.product.id}/${value.product.product_slug_en}">${value.product.product_name_fr}</a></div>
                        @endif
                         
                        <div class="price">
                        ${value.product.discount_price == null
                            ? `${value.product.selling_price}`
                            :
                            `${value.product.discount_price} <span>${value.product.selling_price}</span>`
                        }
                            
                        </div>
                    </td>
        <td class="col-md-2">
        @if (session()->get('language') == 'english')
            <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> Add to Cart <i class="fa fa-shopping-cart inner-left-vs"></i></button>
            @else
            <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> Ajouter Au Panier <i class="fa fa-shopping-cart inner-left-vs"></i></button>
            @endif
        </td>
        <td class="col-md-1 close-btn">
        <button type="submit" class="" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
        </td>
                </tr>`
        });
                
                $('#wishlist').html(rows);
            }
        })
     }
 wishlist();

function wishlistRemove(id){
        $.ajax({
            type: 'GET',
            url: '/user/wishlist-remove/'+id,
            dataType:'json',
            success:function(data){
              wishlist();
            
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                     
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                      icon : 'success',
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                      icon : 'error',
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }

    function cart(){
        $.ajax({
            type: 'GET',
            url: '/user/get-cart-product',
            dataType:'json',
            success:function(response){
    var rows = ""
    $.each(response.carts, function(key,value){
        rows += `<tr>
        <td class="col-md-2"><img src="/${value.options.image} " alt="imga"   style="width:60px; height:60px;">
        </td>
        
        <td class="col-md-2">

        @if (session()->get('language') == 'english')
                        <div class="product-name"><a href="/product/details/${value.id}/${value.options.slugname}">${value.options.nameenglish}</a></div>
                        @else
                        <div class="product-name"><a href="/product/details/${value.id}/${value.options.slugname}">${value.options.namefrensh}</a></div>
                        @endif
          
             
            <div class="price"> 
                            ${value.price}
                        </div>
                    </td>

                    <td class="col-md-2">
                    <strong>${value.options.color}</strong>
            
                    </td>

                    <td class="col-md-2">
                    ${value.options.size == null ? `<span>.....</span>` : `<strong>${value.options.size}</strong>`}
            
                    </td>

                <td class="col-md-2">

                ${value.qty == 1 ? `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="qtyDecrement(this.id)" disabled>-</button>` : `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="qtyDecrement(this.id)" >-</button>`}
                   
                    <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px;text-align:center" >  
                    <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="qtyIncrement(this.id)" >+</button>   


            </td>

            <td class="col-md-2">
            <strong>$${value.subtotal} </strong> 
            </td>
            
            

        <td class="col-md-1 close-btn">
            <button type="submit" class="" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fa fa-times"></i></button>
        </td>
                </tr>`
        });
                
                $('#cart').html(rows);
            }
        })
     }
 cart();



 function cartRemove(id){
        $.ajax({
            type: 'GET',
            url: '/user/cart-remove/'+id,
            dataType:'json',
            success:function(data){
              cart();
              couponCalculation();
            
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                     
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                      icon : 'success',
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                      icon : 'error',
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }

    function qtyDecrement(rowId){
        $.ajax({
            type:'GET',
            url: "/user/quantity-decrement/"+rowId,
            dataType:'json',
            success:function(data){
                cart();
                miniCart();
                couponCalculation();
            }
        });
    }
    function qtyIncrement(rowId){
        $.ajax({
            type:'GET',
            url: "/user/quantity-increment/"+rowId,
            dataType:'json',
            success:function(data){
                cart();
                miniCart();
                couponCalculation();
            }
        });
    }



    function applyCoupon(){
    var coupon_name = $('#coupon_name').val();
    console.log('hi')
    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {coupon_name:coupon_name},
        url: "/user/coupon-apply/"+coupon_name,
        success:function(data){
            couponCalculation();
           

             // Start Message 
             const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    $('#couponField').hide();
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 

        }
    })
  }  

  function couponCalculation(){
    $.ajax({
        type: 'GET',
        url: "{{ url('/user/coupon-calculation') }}",
        dataType: 'json',
        success:function(data){
            if (data.total){
                console.log('yes')
                var rows = ""

                rows += `
                <tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">${data.total}</span>
					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">${data.total}</span>
					</div>
				</th>
			</tr>
                `
                $('#couponCalField').html(rows);

            }
            else{
                var rows = ""

                    rows += `
                    <tr>
                    <th>
                        <div class="cart-sub-total">
                            Subtotal<span class="inner-left-md">$ ${data.subtotal}</span>
                        </div>
                        <div class="cart-sub-total">
                            Coupon<span class="inner-left-md">${data.coupon_name}</span>
                            <button type="submit" onclick="removeCoupon()" ><i class="fa fa-times"></i></button>
                        </div>
                        <div class="cart-sub-total">
                            Discount<span class="inner-left-md">$ ${data.discount_amount}</span>
                        </div>
                        <div class="cart-grand-total">
                            Grand Total<span class="inner-left-md">$ ${data.total_amount}</span>
                        </div>
                    </th>
                    </tr>
                    `
                    $('#couponCalField').html(rows);

            }
        }
    })
  }
  couponCalculation()


  function removeCoupon(){
    $.ajax({
        type: 'GET',
        url: "{{ url('/user/remove-coupon') }}",
        dataType: 'json',
        success:function(data){
            couponCalculation();
                $('#couponField').show();
                $('#coupon_name').val('');
            const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 

        


        }
    })
}


</script>
</body>
</html>
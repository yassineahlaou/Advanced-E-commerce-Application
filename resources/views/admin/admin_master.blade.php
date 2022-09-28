<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('backend/images/icon-shop.ico')}}">


    
    
    
    <title>Admin-Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">
  <!-- toastr css in the end so there will not be a conflict-->
  <link rel="stylesheet" type ="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

  @include('admin.body.header')
  
  <!-- Left side column. contains the logo and sidebar -->
     @include('admin.body.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @yield('admin')
  </div>
  <!-- /.content-wrapper -->
  @include('admin.body.footer')

  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->
	<script src="{{asset('backend/js/vendors.min.js')}}"></script>
    <script src="{{asset('../assets/icons/feather-icons/feather.min.js')}}"></script>	
	<script src="{{asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
	<script src="{{asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
	<script src="{{asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>

  <script src="{{asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
	<script src="{{asset('backend/js/pages/data-table.js')}}"></script>

  <!-- input tags-->

  <script src="{{asset('../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')}}"></script>

  <!-- ck editor -->
  <script src="{{asset('../assets/vendor_components/ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>

  <script src="{{asset('backend/js/pages/editor.js')}}"></script>
	<!-- Sunny Admin App -->
	<script src="{{asset('backend/js/template.js')}}"></script>
	<script src="{{asset('backend/js/pages/dashboard.js')}}"></script>


  
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(function(){
    $(document).on('click', '#delete', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
  title: 'Are you sure?',
  text: "Deleting a Category, will delete all the subCategories and subsubCategories! , and Deleting a SubCategory, will delete all the subsubCategories!, and Deleting a SubSubCategory, will only delete this subsubCategory!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link//this is changing the window after the delete
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})

    })
  })

  </script>
	

  <script>
  $(function(){
    $(document).on('click', '#confirm', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
  title: 'Are you sure?',
  text: "Once you Confirm , You can't go back!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, confirm it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link//this is changing the window after the delete
    Swal.fire(
      'Deleted!',
      'The Order has been Confirmed.',
      'success'
    )
  }
})

    })
  })
  
  </script>
	
  <script>
  $(function(){
    $(document).on('click', '#process', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
  title: 'Are you sure?',
  text: "Once you Process , You can't go back!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Process it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link//this is changing the window after the delete
    Swal.fire(
      'Deleted!',
      'The Order is Being Processed.',
      'success'
    )
  }
})

    })
  })
  
  </script>
  <script>
  $(function(){
    $(document).on('click', '#ship', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
  title: 'Are you sure?',
  text: "Once you Shipped , You can't go back!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, confirm it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link//this is changing the window after the delete
    Swal.fire(
      'Deleted!',
      'The Order has been Shipped.',
      'success'
    )
  }
})

    })
  })
  
  </script>
  <script>
  $(function(){
    $(document).on('click', '#picked', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
  title: 'Are you sure?',
  text: "Once you Picked , You can't go back!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, confirm it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link//this is changing the window after the delete
    Swal.fire(
      'Deleted!',
      'The Order has been Picked.',
      'success'
    )
  }
})

    })
  })
  
  </script>
  <script>
  $(function(){
    $(document).on('click', '#deliver', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
  title: 'Are you sure?',
  text: "Once you Deliver , You can't go back!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, confirm it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link//this is changing the window after the delete
    Swal.fire(
      'Deleted!',
      'The Order has been Delivered.',
      'success'
    )
  }
})

    })
  })
  
  </script>

<script>
  $(function(){
    $(document).on('click', '#cancel', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
  title: 'Are you sure?',
  text: "Once you Cancel , You can't go back!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Cancel it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link//this is changing the window after the delete
    Swal.fire(
      'Deleted!',
      'The Order has been Canceld.',
      'success'
    )
  }
})

    })
  })
  
  </script>


<script>
  $(function(){
    $(document).on('click', '#approvereturn', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
  title: 'Are you sure?',
  text: "Once you Approve , You can't go back!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Approve it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link//this is changing the window after the delete
    Swal.fire(
      'Approved!',
      'The Return has been Approved.',
      'success'
    )
  }
})

    })
  })
  
  </script>
	
  <script>
  $(function(){
    $(document).on('click', '#cancelreturn', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
  title: 'Are you sure?',
  text: "Once you Cancel , You can't go back!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, cancel it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link//this is changing the window after the delete
    Swal.fire(
      'Canceled!',
      'The Return has been Canceld.',
      'success'
    )
  }
})

    })
  })
  
  </script>


<script>
  $(function(){
    $(document).on('click', '#approvereview', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
  title: 'Are you sure?',
  text: "Once you Approve , You can't go back!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Approve it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link//this is changing the window after the delete
    Swal.fire(
      'Approved!',
      'The Review has been Approved.',
      'success'
    )
  }
})

    })
  })
  
  </script>
	
  <script>
  $(function(){
    $(document).on('click', '#cancelreview', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
  title: 'Are you sure?',
  text: "Once you Cancel , You can't go back!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, cancel it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link//this is changing the window after the delete
    Swal.fire(
      'Canceled!',
      'The Review has been Canceld.',
      'success'
    )
  }
})

    })
  })
  
  </script>

<script>
  $(function(){
    $(document).on('click', '#deleteadmin', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
  title: 'Are you sure?',
  text: "Once you Delete , You can't go back!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link//this is changing the window after the delete
    Swal.fire(
      'Deleted!',
      'Admin has been Canceld.',
      'success'
    )
  }
})

    })
  })
  
  </script>
</body>
</html>

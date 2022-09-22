@extends('admin.admin_master')
@section('admin')


<div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		 
<div class="row">
          <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>Review Request Details</strong> </h4>
                    </div>
                    <table class="table">
                    <tr>
              <th> Review Date : </th>
               <th> {{ $review->created_at }} </th>
            </tr>
            <tr>
              <th> Review Summary : </th>
               <th> {{ $review->summary }} </th>
            </tr>
            <tr>
              <th> Review Comment : </th>
               <th> {{ $review->comment }} </th>
            </tr>
            <tr>
              <th> Review Rate : </th>
               <th> {{ $review->rating }} / 5</th>
            </tr>

             <tr>
              <th>Review Images : </th>
              
               <th> 
                @foreach ($images as $pic) 
                <img src="{{asset($pic->photo_name)}}" alt="" width="100px" height="100px">
                @endforeach

               </th>
            </tr>
            <tr>
              <th> Review Status : </th>
               <th >   
               @if($review->status == 'Pending')
               	<a  href="{{ route('review.confirm',$review->id) }}" class="btn btn-block btn-success" id="approvereview">Confirm Review</a>
                 <a href="{{ route('review.cancel',$review->id) }}" class="btn btn-block btn-danger" id="cancelreview">Cancel Review</a>
                @elseif ($review->status == 'Approved')
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
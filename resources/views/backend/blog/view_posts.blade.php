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
				  <h3 class="box-title">Posts List <span class="badge badge-pill badge-danger"> {{ count($posts) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
                                <th>Post Cateory</th>
								<th>Post Title English</th>
								<th>Post Title Frensh</th>
                                
                               
                                

								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($posts as $post)
							<tr>
								
                                <td><img  src="{{asset($post->post_image)}}"  style="width:70px;heigth:40px"></td>
                                <td>{{$post['category']['category_name_en']}}</td>
                                <td>{{$post->post_title_en}}</td>
                                <td>{{$post->post_title_en}}</td>

                                
                              

								
								<td width="20%">
								<a href="{{route('post.edit',$post->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('post.delete',$post->id)}}" class="btn btn-danger" id="deletepost">Delete</a>
                                @if ($post->status == 1)
                                    <a href="{{route('post.down',$post->id)}}" class="btn btn-danger" title="Disactivate"><i class="fa fa-arrow-down"></i></a>
                                @else
                                    <a href="{{route('post.up',$post->id)}}" class="btn btn-success" title="Activate"><i class="fa fa-arrow-up"></i></a>
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


@extends('admin.admin_master')
@section('admin')
<section class="content">
<div class="row">
<div class="col-4">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Search By Date</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
       <form method = "POST"  action ="{{route('date.search')}}"  >
           @csrf
             
               
           <!-- Id of inputs should be respects , same as Jetstream mention it in user -->
           
              
               <div class="form-group">
                   
                   <h5>Select Date <span class="text-danger">*</span></h5>
                   <div class="controls">
                       <input  type="date" name="date" class="form-control" required=""   >
                       @error('date')
                           <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                       @enderror 
                   </div>
               </div>

               
           
       
           <div class="text-xs-right">
               <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
           </div>
       </form>
       </div>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

 
 <!-- /.box -->          
</div>


<!-- search by month and year -->
<div class="col-4">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Search By Month</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
       <form method = "POST"  action ="{{route('month.search')}}"  >
           @csrf
             
               
           <!-- Id of inputs should be respects , same as Jetstream mention it in user -->
           
           <div class="form-group">
								
                                <h5>Select a Month <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="month"   required="" class="form-control">
										<option value="" disabled="" selected="">Select A Month</option>
                                        
										<option value="January ">January </option>
                                        <option value="February ">February </option>
                                        <option value="March  ">March  </option>
                                        <option value="April ">April </option>
                                        <option value="May ">May </option>
                                        <option value="June ">June </option>
                                        <option value="July ">July </option>
                                        <option value="August ">August </option>
                                        <option value="September ">September </option>
                                        
                                        <option value="October ">October </option>
                                        <option value="November ">November </option>
                                        <option value="December ">December </option>
										
									</select>
									@error('month')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>
                            <div class="form-group">
								
                                <h5>Select a Year <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="year"   required="" class="form-control">
										<option value="" disabled="" selected="">Select A Year</option>
                                        
										<option value="2020 ">2020 </option>
                                        <option value="2021 ">2021 </option>
                                        <option value="2022">2022 </option>
                                        <option value="2023 ">2023 </option>
                                        <option value="2024 ">2024 </option>
                                        <option value="2025 ">2025 </option>
                                        <option value="2026 ">2026 </option>
                                        <option value="2027 ">2027 </option>
                                        <option value="2028 ">2028 </option>
                                        <option value="2029 ">2029 </option>
                                        <option value="2030 ">2030 </option>
                                      
                                      
										
									</select>
									@error('year')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>

               
           
       
           <div class="text-xs-right">
               <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
           </div>
       </form>
       </div>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

 
 <!-- /.box -->          
</div>

<!-- search by month and year -->
<div class="col-4">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Search By Year</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
       <form method = "POST"  action ="{{route('year.search')}}"  >
           @csrf
             
               
           <!-- Id of inputs should be respects , same as Jetstream mention it in user -->
           
           
                            <div class="form-group">
								
                                <h5>Select a Year <span class="text-danger">*</span></h5>
								<div class="controls">
                                <select name="year_name"   required="" class="form-control">
										<option value="" disabled="" selected="">Select A Year</option>
                                        
										<option value="2020 ">2020 </option>
                                        <option value="2021 ">2021 </option>
                                        <option value="2022">2022 </option>
                                        <option value="2023 ">2023 </option>
                                        <option value="2024 ">2024 </option>
                                        <option value="2025 ">2025 </option>
                                        <option value="2026 ">2026 </option>
                                        <option value="2027 ">2027 </option>
                                        <option value="2028 ">2028 </option>
                                        <option value="2029 ">2029 </option>
                                        <option value="2030 ">2030 </option>
                                      
                                      
                                      
										
									</select>
									@error('year_name')
            							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            						@enderror 
                                </div>
							</div>

               
           
       
           <div class="text-xs-right">
               <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
           </div>
       </form>
       </div>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

 
 <!-- /.box -->          
</div>

</div>
</div>

@endsection
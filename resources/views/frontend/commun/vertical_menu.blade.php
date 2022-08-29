
<div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
            @php
                if (session()->get('language') == 'english'){
                    $categories = App\Models\Category::orderBy('category_name_en' , 'ASC')->get();
                }
                  else{
                    $categories = App\Models\Category::orderBy('category_name_fr' , 'ASC')->get();
                  }
                     
              @endphp

                @foreach ($categories as $category)

              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="{{$category->category_icon}}" aria-hidden="true"></i>    @if (session()->get('language') == 'english'){{$category->category_name_en}} @else {{$category->category_name_fr}} @endif</a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                      <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                        @php
                  if (session()->get('language') == 'english'){
                    $subsubcategories = App\Models\SubSubCategory::where('category_id', $category->id)->orderBy('sub_sub_category_name_en' , 'ASC')->get();
                  }
                  else{
                    $subsubcategories = App\Models\SubSubCategory::where('category_id', $category->id)->orderBy('sub_sub_category_name_fr' , 'ASC')->get();
                  }   
                @endphp

                @foreach ($subsubcategories as $subsubcategory)
                @if (session()->get('language') == 'english')
                          <li><a href="{{url('products/subsubcategory/'. $subsubcategory->id . '/' . $subsubcategory->sub_sub_category_slug_en)}}">@if (session()->get('language') == 'english'){{$subsubcategory->sub_sub_category_name_en}} @else {{$subsubcategory->sub_sub_category_name_fr}} @endif</a></li>
                          @else
                          <li><a href="{{url('products/subsubcategory/'. $subsubcategory->id . '/' . $subsubcategory->sub_sub_category_slug_fr)}}">@if (session()->get('language') == 'english'){{$subsubcategory->sub_sub_category_name_en}} @else {{$subsubcategory->sub_sub_category_name_fr}} @endif</a></li>
                          @endif
                          @endforeach
                          
                        </ul>
                      </div>
                      <!-- /.col -->
                      
                      <!-- /.col --> 
                    </div>
                    <!-- /.row --> 
                  </li>
                
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
                @endforeach
              <!-- /.menu-item -->
              
              
          
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>


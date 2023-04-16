{{-- <div class="side-menu animate-dropdown outer-bottom-xs">
  <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
  <nav class="yamm megamenu-horizontal">
    <ul class="nav">

      @php
      $categories = App\Models\Category::orderBy('category_name','ASC')->get();
      @endphp 
         
    @foreach ($categories as $category)
      
    
    <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{$category->category_name}}</a>
      <ul class="dropdown-menu mega-menu">
      <li class="yamm-content">

        @php
        $subcategories = App\Models\subCategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
        
        @endphp                   
        
        <div class="row">
        <div class="col-sm-12 col-md-3">
          <ul class="links list-unstyled">
          @foreach($subcategories as $subcategory)
          <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug ) }}">{{ $subcategory->subcategory_name }}</a>
          @endforeach
          </ul>
        </div>

        <!-- /.col --> 
        </div>
        <!-- /.row --> 
      </li>
      <!-- /.yamm-content -->
      </ul>
      <!-- /.dropdown-menu --> </li>
    <!-- /.menu-item -->
    @endforeach
    
    </ul>
    <!-- /.nav --> 
  </nav>
  <!-- /.megamenu-horizontal --> 
  </div> --}}


  @php
$categories = App\Models\Category::orderBy('category_name','ASC')->get();
@endphp 
 <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
              @foreach($categories as $category)
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $category->category_icon }}" aria-hidden="true"></i>
                {{ $category->category_name }} 
                </a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
   <!--   // Get SubCategory Table Data -->
  @php
  $subcategories = App\Models\subCategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
  @endphp                   

             @foreach($subcategories as $subcategory)
                      <div class="col-sm-12 col-md-3">

  {{-- <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en ) }}">                       --}}
    <ul class="links list-unstyled">
 <li> <a href="{{ url('subcategory/product/'.$subcategory->id ) }}">                      
 <h2 class="title">
 {{ $subcategory->subcategory_name }} 
  </h2>
  </h2> </a></li>
    </ul>

    <!--   // Get SubSubCategory Table Data -->
  {{-- @php
  $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name','ASC')->get();
  @endphp                
   @foreach($subsubcategories as $subsubcategory)         
                        <ul class="links list-unstyled">
                          <li><a href="#">
     {{ $subsubcategory->subsubcategory_name }}</a></li>
                          
                        </ul>
 @endforeach <!-- // End SubSubCategory Foreach --> --}}
                      </div>
                      <!-- /.col -->
                 @endforeach  <!-- End SubCategory Foreach -->      
                       
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              @endforeach  <!-- End Category Foreach -->
 
              
              
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>Kids and Babies</a> 
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a> 
                <!-- ================================== MEGAMENU VERTICAL ================================== --> 
                <!-- /.dropdown-menu --> 
                <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
              <!-- /.menu-item -->
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a> 
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 
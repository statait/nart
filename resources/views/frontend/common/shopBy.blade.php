<div class="sidebar-widget wow fadeInUp">
    <h3 style="background-image: linear-gradient(to right, #1cad58 0%, #107010 51%, #106410 100%); padding:5% 0% 5% 5%; color:white" class="section-title">shop by</h3>
    <div class="widget-header">
      <h4 class="widget-title">Category</h4>
    </div>
    <div class="sidebar-widget-body">
      <div class="accordion">


@foreach($categories as $category)
<div class="accordion-group">
<div class="accordion-heading"> <a href="#collapse{{ $category->id }}" data-toggle="collapse" class="accordion-toggle collapsed"> 
{{ $category->category_name }} </a> </div>
<!-- /.accordion-heading -->
<div class="accordion-body collapse" id="collapse{{ $category->id }}" style="height: 0px;">
<div class="accordion-inner">

@php
$subcategories = App\Models\subCategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
@endphp 

@foreach($subcategories as $subcategory)
<ul>
<li><a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug ) }}">
{{ $subcategory->subcategory_name }}</a></li>

</ul>
@endforeach 


</div>
<!-- /.accordion-inner --> 
</div>
<!-- /.accordion-body --> 
</div>
<!-- /.accordion-group -->
@endforeach              











      </div>
      <!-- /.accordion --> 
    </div>
    <!-- /.sidebar-widget-body --> 
  </div>

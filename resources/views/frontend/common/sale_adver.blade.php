@php
$sale = App\Models\Product::where('sale',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
@endphp

<div style="border: 3px solid #ed174a; border-radius:5%; margin-top:20px" class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">SALE</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
    @foreach($sale as $product)
      <div class="item">
        <div class="products">
          <div class="hot-deal-wrapper">
            
            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}"> <img src="{{ asset($product->product_thambnail) }}" alt=""></a></div>

            @php
            $amount = $product->selling_price - $product->discount_price;
            $discount = ($amount/$product->selling_price) * 100;
            @endphp   
            
            @if ($product->discount_price == NULL)
            <div class="tag new"><span>new</span></div>
          @else
          <div class="sale-offer-tag"><span>{{ round($discount) }}%<br>
              off</span></div>
              @endif
            
        
            {{-- <div class="timing-wrapper">
              <div class="box-wrapper">
                <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
              </div>
              <div class="box-wrapper">
                <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
              </div>
              <div class="box-wrapper">
                <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
              </div>
              <div class="box-wrapper hidden-md">
                <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
              </div>
            </div> --}}
          </div>
          <!-- /.hot-deal-wrapper -->
          
          <div class="product-info text-left m-t-20">
            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
             {{ $product->product_name }} </a></h3>
    
        
             @if ($product->discount_price == NULL)
         <div class="product-price"> <span class="price"> TK {{ $product->selling_price }} </span>  </div>
             @else
         <div class="product-price"> <span class="price"> TK {{ $product->discount_price }} </span> <span class="price-before-discount">TK {{ $product->selling_price }}</span> </div>
             @endif
        
        
            <!-- /.product-price --> 
            
          </div>
          <!-- /.product-info -->
          
          <div class="cart clearfix animate-effect">
            <div class="action">
              <div class="add-cart-button btn-group">
                <button data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
				  <button id="{{ $product->id }}" class="btn btn-primary cart-btn" data-toggle="modal" data-target="#exampleModal" onclick="productView(this.id)" type="button">Add to cart</button>
              </div>
            </div>
            <!-- /.action --> 
          </div>
          <!-- /.cart --> 
        </div>
      </div>
      @endforeach <!-- // end hot deals foreach -->
    </div>
    <!-- /.sidebar-widget --> 
  </div>
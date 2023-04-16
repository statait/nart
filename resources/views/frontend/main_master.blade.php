<!DOCTYPE html>
<html lang="en">
<head>

@php
$seo = App\Models\Seo::find(1);
@endphp

<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="{{ $seo->meta_description }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="{{ $seo->meta_author }}">
<meta name="keywords" content="{{ $seo->meta_keyword }}">
<meta name="robots" content="all">

{{-- Favicon --}}
<link rel="icon"  href="{{ asset('frontend/assets/img/fav1.png') }}">

<!-- /// Google Analytics Code // -->
<script>
    {{ $seo->google_analytics }}
</script>
<!-- /// Google Analytics Code // -->


<title>@yield('title') </title>

{{-- <!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}"> --}}

{{-- TOP BUTTON STYLE --}}
{{-- <style>

    #hh{
        background-color: #fff; 
        color: black; 
    }

    #hh:hover{
        background-color: rgb(105, 245, 105); 
        color: yellow
    }

    #myBtn {
  display: none; /* Hidden by default */
  position: fixed; /* Fixed/sticky position */
  bottom: 20px; /* Place the button at the bottom of the page */
  right: 30px; /* Place the button 30px from the right */
  z-index: 99; /* Make sure it does not overlap */
  border: none; /* Remove borders */
  outline: none; /* Remove outline */
  background-image: linear-gradient(to right, #094919 0%, #09681d 51%, #185824 100%); /* Set a background color */
  color: white; /* Text color */
  cursor: pointer; /* Add a mouse pointer on hover */
  padding: 1px; /* Some padding */
  border-radius: 30%; /* Rounded corners */
  font-size: 30px; /* Increase font size */
  width: 50px;
  height: 40px;
  font-weight: 600;
}



#myBtn:hover {
  background-color: rgb(192, 5, 5); /* Add a dark-grey background on hover */
}


/* asasassaasassa */
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.buttons {
    margin: 10%;
    text-align: center;
}

.btn-hover {
    width: 200px;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    margin: 20px;
    height: 55px;
    text-align: center;
    border: none;
    background-size: 300% 100%;

    border-radius: 50px;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
}

.btn-hover:hover {
    background-position: 100% 0;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
}

.btn-hover:focus {
    outline: none;
}

.btn-hover.color-1 {
    background-image: linear-gradient(to right, #25aae1, #40e495, #30dd8a, #2bb673);
    box-shadow: 0 4px 15px 0 rgba(49, 196, 190, 0.75);
}
    #myBt {
  display: contents; /* Hidden by default */
  position: fixed; /* Fixed/sticky position */
  bottom: 50%; /* Place the button at the bottom of the page */
  right: 0%; /* Place the button 30px from the right */
  z-index: 1; /* Make sure it does not overlap */
  border: none; /* Remove borders */
  outline: none; /* Remove outline */
  color: rgb(12, 12, 12); /* Text color */
  cursor: pointer; /* Add a mouse pointer on hover */
   /* Some padding */
  border-radius: 10px; /* Rounded corners */
  font-size: 13px; /* Increase font size */
}

</style> --}}

<!-- Icons/Glyphs -->
{{-- <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}"> --}}
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">



<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

{{-- BENGAL AUTOMATION CSS --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/linearicons.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/nouislider.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/ion.rangeSlider.css') }}" />
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/ion.rangeSlider.skinFlat.css') }}" />
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/mystyle.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('../assets/css/app-light.css') }}" id="lightTheme"> --}}
</head>



<body>
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

{{-- <button onclick="topFunction()" id="myBtn" title="Go to top">^</button> --}}

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 
<script src="{{ asset('frontend/assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
 crossorigin="anonymous"></script>
<script src="{{ asset('frontend/assets/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('frontend/assets/js/nouislider.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/countdown.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
{{-- <script src="{{ asset('frontend/assets/js/gmaps.min.js') }}"></script> --}}
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
<!-- For demo purposes – can be removed on production : End --> 


<!-- JavaScripts placed at the end of the document so the pages load faster --> 
{{-- <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script> --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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

<!-- Add to Cart Product Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span> </strong></h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
 
       <div class="modal-body">
 
        <div class="row">
 
         <div class="col-md-4">
 
             {{-- <div class="" style="width: 14rem; height:15rem"> --}}
        <img src=" " class="card-img-top" alt="..." style="height: 280px; width: 262px;" id="pimage">

        {{-- </div> --}}
 
         </div><!-- // end col md -->
 
 
         <div class="col-md-4">
 
      <ul class="list-group">
         <li class="list-group-item">Product Price: <strong class="text-info">TK <span id="pprice"></span></strong>
         <del id="oldprice" class="text-danger">TK </del>
         </li>
         <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
         <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
         <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
         <li class="list-group-item">Stock <span class="genric-btn primary circle small ml-3" id="aviable" style="background: green; font-size:12px"></span> 
         <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white;"></span> 
            
              </li>
    </ul>
 
         </div><!-- // end col md -->
 
 
         <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item">Color: <strong id="pcolor"></strong></li>
                <br>
                <li class="list-group-item">Size: <strong id="psize"></strong></li>
           </ul>

            {{-- <label for="exampleFormControlInput1">Color</label>
            <div class="nice-select" tabindex="0"> --}}
                {{-- <span class="current" style="pointer-events: none">Choose Color</span> --}}
                {{-- <ul class="list color" id="color" name="color"> --}}
                    {{-- <li data-value=" 1" class="option selected focus">English</li> --}}
                    
                {{-- </ul> --}}
            {{-- </div> --}}
            
             {{-- <div class="form-group">
   <label for="color">Choose Color</label>
   <select class="" id="color" name="color">
     </select>


   </div> --}}

   {{-- <div class="form-group" id="sizeArea">
      <label for="exampleFormControlSelect1">Choose Size</label>
      <select class="form-control" id="size" name="size">
       
      </select>
    </div> --}}
      <!-- // end form group -->
      {{-- <label for="exampleFormControlInput1"> Size</label>
    <div class="nice-select" tabindex="0"> --}}
        {{-- <span class="current">Choose Size</span> --}}
        {{-- <span class="current">English</span> --}}
        {{-- <ul class="list size" id="size" name="size"> --}}
            {{-- <li style=" pointer-events:none; " class="option selected focus">English</li> --}}
            
        {{-- </ul>
    </div> --}}
  
         <div class="form-group">
      <label for="exampleFormControlInput1">Quantity</label>
      <input type="number" class="form-control" id="qty" value="1" min="1" >
    </div> <!-- // end form group -->
  
    <input type="hidden" id="product_id">
    <button type="submit" class="btn-block genric-btn" style="background: linear-gradient(90deg, #ffba00 0%, #ff6c00 100%); color:white; border:none; font-size:15px" onclick="addToCart()" >Add to Cart</button>
  
 
         </div><!-- // end col md -->
 
 
        </div> <!-- // end row -->
 

       </div> <!-- // end modal Body -->
 
     </div>
   </div>
 </div>
 <!-- End Add to Cart Product Modal -->

 <script type="text/javascript">
   $.ajaxSetup({
       headers:{
           'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
       }
   })
   
// Start Product View with Modal 
function productView(id){
   // alert(id)
   $.ajax({
       type: 'GET',
       url: '/product/view/modal/'+id,
       dataType:'json',
       success:function(data){
         $('#pname').text(data.product.product_name);
            $('#price').text(data.product.selling_price);
            $('#pcode').text(data.product.product_code);
            $('#pcategory').text(data.product.category.category_name);
            $('#pbrand').text(data.product.brand.brand_name);
            $('#pimage').attr('src','/'+data.product.product_thambnail);

            $('#product_id').val(id);
            $('#qty').val(1);

            $('#psize').text(data.product.product_size);
            $('#pcolor').text(data.product.product_color);

            // Product Price 
            if (data.product.discount_price == null) {
                $('#pprice').text('');
                $('#oldprice').text('');
                $('#pprice').text(data.product.selling_price);
            }else{
                $('#pprice').text(data.product.discount_price);
                $('#oldprice').text(data.product.selling_price);
            } // end prodcut price 
            // Start Stock opiton
            if (data.product.product_qty > 0) {
                $('#aviable').text('');
                $('#stockout').text('');
                $('#aviable').text('Available');
            }else{
                $('#aviable').text('');
                $('#stockout').text('');
                $('#stockout').text('Stockout');
            } // end Stock Option 

            // Color
    // $('.color').empty();   
    // $.each(data.color,function(key,value){
    //     $('.color').append('<li value="'+value+' " class="option" >'+value+' </li>')
    // }) 
    // end color

     // Size
    //  $('.size').empty(); 
    // //  <li style="pointer-events:none; " class="option selected focus">Choose Size</li>  
    // $.each(data.size,function(key,value){
    //     $('.size').append('<li value="'+value+' " class=" option" >'+value+' </li>')
    // }) 
    // end color
    // $('select[name="size"]').empty();        
    // $.each(data.size,function(key,value){
    //     $('select[name="size"]').append('<option value=" '+value+' ">'+value+' </option>')
    //     if (data.size == "") {
    //         $('#sizeArea').hide();
    //     }else{
    //         $('#sizeArea').show();
    //     }
    // }) 
    // end size

       }
   })

}
// END Product View with Modal


 // Start Add To Cart Product 
 function addToCart(){
        var product_name = $('#pname').text();
        var id = $('#product_id').val();
        var color = $('#pcolor').text();
        var size = $('#psize').text();
        var quantity = $('#qty').val();
        $.ajax({
            type: "POST",
            dataType: 'json',
            data:{
                color:color, size:size, quantity:quantity, product_name:product_name
            },
            url: "/cart/data/store/"+id,
            success:function(data){
               miniCart()
               $('#closeModel').click();
               //  console.log(data)
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
        })
    }


</script>


<script type="text/javascript">
   function miniCart(){
        $.ajax({
            type: 'GET',
            url: '/product/mini/cart',
            dataType:'json',
            success:function(response){

               $('span[id="cartSubTotal"]').text(response.cartTotal);
                $('#cartQty').text(response.cartQty);

               var miniCart = ""

                $.each(response.carts, function(key,value){
                    miniCart += `<div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img style="width:100%" src="/${value.options.image}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 style="font-size:16px" class="name"><a href="index.php?page-detail"><b style="">${value.name}</b></a></h3>
                      <div style="font-size:16px" class="price"> ${value.price} * ${value.qty} </div>
                    </div>
                    <div class="col-xs-1 action"> 
            <button type="submit" style="color:red; background-color:white; border:none" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>`
                });
                
                $('#miniCart').html(miniCart);
            }
        })
     }
    miniCart();

    /// mini cart remove Start 
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
 //  end mini cart remove 
</script>

<!--  /// Start Add Wishlist Page  //// -->

<script type="text/javascript">
    
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
                // End Message 
            }
        })
    }
    </script>

     <!--  /// End Add Wishlist Page  ////   -->

     <!-- /// Load Wishlist Data  -->


<script type="text/javascript">
    function wishlist(){
       $.ajax({
           type: 'GET',
           url: '/user/get-wishlist-product',
           dataType:'json',
           success:function(response){
               var rows = ""
               $.each(response, function(key,value){
                   rows += `<tr>
                   <td class="col-md-2"><img src="/${value.product.product_thambnail} " alt="imga"></td>
                   <td class="col-md-7">
                       <div class="product-name"><a href="#">${value.product.product_name}</a></div>
                        
                       <div class="price">
                       ${value.product.discount_price == null
                           ? `${value.product.selling_price}`
                           :
                           `${value.product.discount_price} <span>${value.product.selling_price}</span>`
                       }
                           
                       </div>
                   </td>
       <td class="col-md-2">
           <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> Add to Cart </button>
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

///  Wishlist remove Start 
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
        });
    }
 // End Wishlist remove   
</script> 
<!-- /// End Load Wisch list Data  -->

<!-- /// Load My Cart /// -->

<script type="text/javascript">
    function cart(){
       $.ajax({
           type: 'GET',
           url: '/user/get-cart-product',
           dataType:'json',
           success:function(response){
   var rows = ""
   $.each(response.carts, function(key,value){
       rows += `<tr>
                    <td>
                        <div class="media">
                            <div class="d-flex">
                                <img src="/${value.options.image}" style="width:100px; height:80px;" alt="">
                            </div>
                            <div class="media-body">
                                <p>${value.name}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <h5>${value.options.color}</h5>
                    </td>
                    <td>
                        <h5>${value.options.size}</h5>
                    </td>
                    <td>
                        <h5>${value.price}</h5>
                    </td>
                    <td>
                        <div class="product_count">
                            <input type="text" name="qty" value="${value.qty}" id="sst" maxlength="12" value="1" title="Quantity:"
                                class="input-text qty">
                            <button id="${value.rowId}" onclick="cartIncrement(this.id)"; var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                ${value.qty > 1
                                ? `<button id="${value.rowId}" onclick="cartDecrement(this.id)";"
                                class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>`
                                : `<button disabled 
                                class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>`
                            }
                        </div>
                    </td>
                    <td>
                        <h5>TK ${value.subtotal} </h5>
                    </td>
                    <td>
                        <a href="#" id="${value.rowId}" onclick="cartRemove(this.id)" class="genric-btn danger circle">X</a>
                    </td>
                </tr>`
       });
               
               $('#cartPage').html(rows);
           }
       })
    }
cart();

///  Cart remove Start 
function cartRemove(id){
       $.ajax({
           type: 'GET',
           url: '/user/cart-remove/'+id,
           dataType:'json',
           success:function(data){
            couponCalculation();
            cart();
            miniCart();
            $('#couponField').show();
            $('#coupon_name').val('');
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
               // End Message 
           }
       });
   }
// End Cart remove   


// -------- CART INCREMENT --------//
function cartIncrement(rowId){
        $.ajax({
            type:'GET',
            url: "/cart-increment/"+rowId,
            dataType:'json',
            success:function(data){
                couponCalculation();
                cart();
                miniCart();
            }
        });
    }
 // ---------- END CART INCREMENT -----///

 // -------- CART Decrement  --------//
 function cartDecrement(rowId){
        $.ajax({
            type:'GET',
            url: "/cart-decrement/"+rowId,
            dataType:'json',
            success:function(data){
                couponCalculation();
                cart();
                miniCart();
            }
        });
    }
 // ---------- END CART Decrement -----///


</script>  

<!-- //End Load My cart / -->


<!--  //////////////// =========== Coupon Apply Start ================= ////  -->
<script type="text/javascript">
    function applyCoupon(){
      var coupon_name = $('#coupon_name').val();
      $.ajax({
          type: 'POST',
          dataType: 'json',
          data: {coupon_name:coupon_name},
          url: "{{ url('/coupon-apply') }}",
          success:function(data){
                 couponCalculation();
                 if (data.validity == true) {
                $('#couponField').hide();
               }
               
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
                  // End Message 
          }
      })
    }  
    function couponCalculation(){
      $.ajax({
          type: 'GET',
          url: "{{ url('/coupon-calculation') }}",
          dataType: 'json',
          success:function(data){
              if (data.total) {
                  $('#couponCalField').html(
                      `<td>
                      
                        </td>
                        
                        <td>
                           
                        </td>

                        <td>
                            <h5>Subtotal</h5> TK ${data.total} 
                        </td>
                        <td colspan="4">
                            <h5>Grand Total</h5> TK ${data.total}
                        </td>`
              )
              }else{
                   $('#couponCalField').html(
                      ` <td>
                       <h5>Subtotal</h5>TK ${data.subtotal} 
                        </td>

                        <td>
                        <h5>Coupon</h5> ${data.coupon_name}
                        <button type="submit" style="color:red" class="btn" onclick="couponRemove()"><i  class="fa fa-times"></i>  </button>
                        <td>
                        <h5>Discount</h5>TK ${data.discount_amount}
                        </td>
                        
                        <td>
                            <h5>Grand Total</h5>TK ${data.total_amount}
                        </td>`
                       
              )
              }
          }
      });
    }
   couponCalculation();
  </script>
  
  <!--  //////////////// =========== End Coupon Apply Start ================= ////  -->

  <!--  //////////////// =========== Start Coupon Remove================= ////  -->

<script type="text/javascript">
     
    function couponRemove(){
       $.ajax({
           type:'GET',
           url: "{{ url('/coupon-remove') }}",
           dataType: 'json',
           success:function(data){
               couponCalculation();
               $('#couponField').show();
               $('#coupon_name').val('');
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
               // End Message 
           }
       });
    }
</script>





<!--  //////////////// =========== End Coupon Remove================= ////  -->

</body>
</html>
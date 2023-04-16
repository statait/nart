<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image as Image;

class productController extends Controller
{
    public function AddProduct(){
		$categories = Category::latest()->get();
		// $brands = Brand::latest()->get();
		return view('admin.Backend.Product.product', compact('categories'));
	}


	public function StoreProduct(Request $request){

      $product_id = Product::insertGetId([
      	'category_id' => $request->category_id,
      	'product_name' => $request->product_name,
      	'product_code' => $request->product_code,
		
      	'selling_price' => $request->selling_price,
      	'discount_price' => $request->discount_price,
		'qty' => $request->qty,
	
      	'status' => 1,
      	'created_at' => Carbon::now(),   

      ]);


       $notification = array(
			'message' => 'Product Inserted Successfully',
			'alert-type' => 'success'
		);

		// return redirect()->route('manage-product')->with($notification);
		return redirect()->back()->with($notification);

	} // end method

	public function ManageProduct(){

		$products = Product::latest()->get();
		return view('admin.Backend.Product.product_view',compact('products'));
	}


	public function EditProduct($id){

		$categories = Category::latest()->get();
		$product = Product::findOrFail($id);
		return view('admin.Backend.Product.product_edit', compact('product','categories'));
	}


	public function ProductUpdate(Request $request, $id){

		$product_id = $id;
		$quantity = $request->qty;
		
		if($quantity != null){
			$quantity += $request->qty;
		}else{
			$quantity = null;
		}

         Product::findOrFail($product_id)->update([
			'category_id' => $request->category_id,
			'product_name' => $request->product_name,
			'product_code' => $request->product_code,
			'selling_price' => $request->selling_price,
			'discount_price' => $request->discount_price,
			'qty' => $quantity,	  
			'status' => 1,
			'updated_at' => Carbon::now(),   
      ]);

          $notification = array(
			'message' => 'Product Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('manage-product')->with($notification);


	} // end method 

	public function ProductDelete($id){
	
		Product::findOrFail($id)->delete();

		$notification = array(
		   'message' => 'Product Deleted Successfully',
		   'alert-type' => 'success'
	   );

	   return redirect()->back()->with($notification);

	}


/// Multiple Image Update
	public function MultiImageUpdate(Request $request){

		$imgs = $request->multi_img;

		foreach ($imgs as $id => $img) {
	    $imgDel = MultiImg::findOrFail($id);
	    unlink($imgDel->photo_name);
	     
    	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
    	Image::make($img)->resize(263,280)->save('upload/products/multi-image/'.$make_name);
    	$uploadPath = 'upload/products/multi-image/'.$make_name;

    	MultiImg::where('id',$id)->update([
    		'photo_name' => $uploadPath,
    		'updated_at' => Carbon::now(),

    	]);

	 } // end foreach

       $notification = array(
			'message' => 'Product Image Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

	} // end mehtod 


 /// Product Main Thambnail Update /// 
 public function ThambnailImageUpdate(Request $request){
 	$pro_id = $request->id;
 	$oldImage = $request->old_img;
 	unlink($oldImage);

    $image = $request->file('product_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(263,280)->save('upload/products/thumbnail/'.$name_gen);
    	$save_url = 'upload/products/thumbnail/'.$name_gen;

    	Product::findOrFail($pro_id)->update([
    		'product_thambnail' => $save_url,
    		'updated_at' => Carbon::now(),

    	]);

         $notification = array(
			'message' => 'Product Image Thambnail Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

     } // end method


 //// Multi Image Delete ////
     public function MultiImageDelete($id){
     	$oldimg = MultiImg::findOrFail($id);
     	unlink($oldimg->photo_name);
     	MultiImg::findOrFail($id)->delete();

     	$notification = array(
			'message' => 'Product Image Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

     } // end method 



     public function ProductInactive($id){
     	Product::findOrFail($id)->update(['status' => 0]);
     	$notification = array(
			'message' => 'Product Inactive',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
     }


  public function ProductActive($id){
  	Product::findOrFail($id)->update(['status' => 1]);
     	$notification = array(
			'message' => 'Product Active',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
     	
     }



	// product Stock 
	public function ProductStock(){

    $products = Product::latest()->get();
    return view('admin.Backend.Product.product_stock',compact('products'));

  }

	public function getDataProduct(Request $request){

		$selectedOption = $request->input('option');
		$data = Product::findOrFail($selectedOption);

		return $data;

	}
}

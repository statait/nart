<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class EmployeeController extends Controller
{
    public function AddEmployee(){
		// $categories = Category::latest()->get();
		$designations = Designation::latest()->get();
		// return view('admin.Backend.Product.product', compact('categories','brands'));
        return view('admin.Backend.Employee.employee', compact('designations'));
	}
    
	public function StoreEmployee(Request $request){

		$image = $request->file('picture');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(869,370)->save('upload/employee/'.$name_gen);
    	$save_url = 'upload/employee/'.$name_gen;

	Employee::insert([
		'title' => $request->title,
        'subTitle' => $request->subTitle,
        'startingPrice' => $request->startingPrice,
        'slideStyle' => $request->slideStyle,
        'slider_img' => $save_url,

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

		$multiImgs = MultiImg::where('product_id',$id)->get();

		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		$subcategory = subCategory::latest()->get();
		$products = Product::findOrFail($id);
		return view('admin.Backend.Product.product_edit',compact('categories','brands','subcategory','products','multiImgs'));

	}


	public function ProductDataUpdate(Request $request){

		$product_id = $request->id;
		$quantity = null;
		
		if($request->qty != null){
			$quantity = $request->qty;
		}else{
			$quantity = null;
		}
		$discount = ($request->selling_price) - ($request->discount_price);

         Product::findOrFail($product_id)->update([
			'category_id' => $request->category_id,
			'product_name' => $request->product_name,
			'product_code' => $request->product_code,
			'selling_price' => $request->selling_price,
			'discount_price' => $request->discount_price,
			'qty' => $quantity,
		  
		  	'discount' => null,
	  
			'status' => 1,
			'created_at' => Carbon::now(),   
      ]);

          $notification = array(
			'message' => 'Product Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('manage-product')->with($notification);


	} // end method 


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



     public function ProductDelete($id){
     	$product = Product::findOrFail($id);
     	// unlink($product->product_thambnail);
     	Product::findOrFail($id)->delete();

     	// $images = MultiImg::where('product_id',$id)->get();
     	// foreach ($images as $img) {
     	// 	unlink($img->photo_name);
     	// 	MultiImg::where('product_id',$id)->delete();
     	// }

     	$notification = array(
			'message' => 'Product Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

     }// end method 



	// product Stock 
	public function ProductStock(){

    $products = Product::latest()->get();
    return view('admin.Backend.Product.product_stock',compact('products'));

  }
}

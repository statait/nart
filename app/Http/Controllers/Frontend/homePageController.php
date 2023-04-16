<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Location;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class homePageController extends Controller
{

	public function UserLogout(){
    	Auth::logout();
    	return Redirect()->route('login');
    }

	public function UserProfile(){
    	$id = Auth::user()->id;
		$user = User::find($id);
    	return view('frontend.profile.user_profile', compact('user'));
    }

	public function UserProfileStore(Request $request){
		
        $data = User::find(Auth::user()->id);
		$data->name = $request->name;
		$data->email = $request->email;
		$data->phone = $request->phone;
		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			@unlink(public_path('upload/user_images/'.$data->profile_photo_path));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/user_images'),$filename);
			$data['profile_photo_path'] = $filename;
		}
		$data->save();

		$notification = array(
			'message' => 'User Profile Updated Successfully',
			'alert-type' => 'success'
		);
		return redirect()->route('dashboard')->with($notification);
    } // end method 

    public function UserChangePassword(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('frontend.profile.change_password',compact('user'));
    }

    public function UserPasswordUpdate(Request $request){

		$validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

		$hashedPassword = Auth::user()->password;

		if (Hash::check($request->oldpassword,$hashedPassword)) {
			$user = User::find(Auth::id());
			$user->password = Hash::make($request->password);
			$user->save();
			Auth::logout();
			return redirect()->route('user.logout');
		}else{
			return redirect()->back();
		}
	}// end method


    public function ProductDetails($id){

		$product = Product::findOrFail($id);
		
		$color = $product->product_color;
		$product_color = explode(',', $color);

		$size = $product->product_size;
		$product_size = explode(',', $size);

        $shortDescrip = $product->short_descp;
		$short_descps = explode(',', $shortDescrip);

		$catId = $product->category_id;
		$upsellProducts = Product::where('category_id', $catId)->where('id', '!=', $id)->orderBy('id','DESC')->get();

		$multiImag = MultiImg::where('product_id',$id)->get();

		return view('frontend.product.product_details',compact('product','multiImag','product_color','product_size', 'short_descps','upsellProducts'));

	}

	public function TagWiseProduct($tag){
		$products = Product::where('status',1)->where('product_tags',$tag)->orderBy('id','DESC')->paginate(50);
		$categories = Category::orderBy('category_name','ASC')->get();
		return view('frontend.tags.tags_view',compact('products','categories'));

	}

	// Category wise Product
	public function CategoryWiseProduct($cat_id){
		$products = Product::where('status',1)->where('category_id',$cat_id)->orderBy('id','DESC')->get();
		$category = Category::findOrFail($cat_id);
		return view('frontend.product.category_wise_view',compact('products','category'));

	}

	// Subcategory wise data
	public function SubCatWiseProduct($subcat_id,$slug){
		$products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(3);
		$categories = Category::orderBy('category_name','ASC')->get();
		return view('frontend.product.subcategory_view',compact('products','categories'));

	}

	public function SubCatWiseeProduct($subcat_id){
		$products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(50);
		$categories = Category::orderBy('category_name','ASC')->get();
		return view('frontend.product.subcategory_view',compact('products','categories'));

	}

	public function TodaysOffer(){
		$todays_offer = Product::where('status',1)->inRandomOrder()->get();
		$categories = Category::orderBy('category_name','ASC')->get();
		return view('frontend.product.todays_offer',compact('todays_offer','categories'));

	}


	public function LocationStore(){
		$location = Location::orderBy('id','ASC')->get();
		$categories = Category::orderBy('category_name','ASC')->get();
		return view('frontend.Location.location',compact('location','categories'));

	}


	/// Product View With Ajax
	public function ProductViewAjax($id){
		$product = Product::with('category','brand')->findOrFail($id);

		// $color = $product->product_color;
		// $product_color = explode(',', $color);

		// $size = $product->product_size;
		// $product_size = explode(',', $size);

		return response()->json(array(
			'product' => $product,
			// 'color' => $product_color,
			// 'size' => $product_size,

		));

	} // end method 


	// Product Seach 
	public function ProductSearch(Request $request){

		$request->validate(["search" => "required"]);

		$item = $request->search;
		// echo "$item";
        // $categories = Category::orderBy('category_name','ASC')->get();
		$products = Product::where('product_name','LIKE',"%$item%")->get();
		
		return view('frontend.product.search',compact('products','item'));


	}

	///// Advance Search Options 

	public function SearchProduct(Request $request){
		$request->validate(["search" => "required"]);

		$item = $request->search;		 

		$products = Product::where('product_name','LIKE',"%$item%")->select('product_name','product_thambnail','selling_price','id',)->limit(5)->get();
		return view('frontend.product.search_product',compact('products'));



	} // end method 


}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function AllAdminRole(){

    	$adminuser = Admin::all();
    	return view('admin.Backend.Role.admin_role_all',compact('adminuser'));

    } // end method 


    public function AddAdminRole(){
    	return view('admin.Backend.Role.admin_role_create');
    }

 public function StoreAdminRole(Request $request){

	if($request->file('profile_photo_path')){

		$image = $request->file('profile_photo_path');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->save('upload/admin_images/'.$name_gen);
    	$save_url = 'upload/admin_images/'.$name_gen;

	Admin::insert([
		'name' => $request->name,
		'email' => $request->email,
		'password' => Hash::make($request->password),
		'phone' => $request->phone,
		
		'product' => $request->product,
		'report' => $request->reports,
		'customer' => $request->customer,
		'sale' => $request->sale,

		'site' => $request->manage_site,
		'adminuserrole' => $request->admin_user,
		'bank' => $request->manage_bank,
		
		'type' => $request->type,
		'profile_photo_path' => $save_url,
		'created_at' => Carbon::now(),


    	]);
	}else{
		Admin::insert([
			'name' => $request->name,
		'email' => $request->email,
		'password' => Hash::make($request->password),
		'phone' => $request->phone,
		
		'product' => $request->product,
		'report' => $request->reports,
		'customer' => $request->customer,
		'sale' => $request->sale,

		'site' => $request->manage_site,
		'adminuserrole' => $request->admin_user,
		'bank' => $request->manage_bank,
		
		'type' => $request->type,
			'profile_photo_path' => null,
			'created_at' => Carbon::now(),
	
	
			]);
	}
    	

	    $notification = array(
			'message' => 'Admin User Created Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('all.admin.user')->with($notification);

    } // end method 


    public function EditAdminRole($id){

    	$adminuser = Admin::findOrFail($id);
    	return view('admin.Backend.Role.admin_role_edit',compact('adminuser'));

    } // end method 




 public function UpdateAdminRole(Request $request){

    	$admin_id = $request->id;
    	$old_img = $request->old_image;

    	if ($request->file('profile_photo_path')) {

    	unlink($old_img);
    	$image = $request->file('profile_photo_path');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
    	$save_url = 'upload/admin_images/'.$name_gen;

	Admin::findOrFail($admin_id)->update([
		'name' => $request->name,
		'email' => $request->email,

		'phone' => $request->phone,
		'brand' => $request->brand,
		'category' => $request->category,
		'product' => $request->product,
		'slider' => $request->slider,
		'coupons' => $request->coupons,

		'shipping' => $request->shipping,
		'quotation' => $request->quotation,
		'setting' => $request->setting,
		'returnorder' => $request->returnorder,
		'review' => $request->review,
		'locations' => $request->locations,

		'orders' => $request->orders,
		'stock' => $request->stock,
		'reports' => $request->reports,
		'alluser' => $request->alluser,
		'adminuserrole' => $request->adminuserrole,
		'type' => 2,
		'profile_photo_path' => $save_url,
		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'Admin User Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('all.admin.user')->with($notification);

    	}else{

    	Admin::findOrFail($admin_id)->update([
		'name' => $request->name,
		'email' => $request->email,

		'phone' => $request->phone,
		'brand' => $request->brand,
		'category' => $request->category,
		'product' => $request->product,
		'slider' => $request->slider,
		'coupons' => $request->coupons,

		'shipping' => $request->shipping,
		'quotation' => $request->quotation,
		'setting' => $request->setting,
		'returnorder' => $request->returnorder,
		'review' => $request->review,
		'locations' => $request->locations,

		'orders' => $request->orders,
		'stock' => $request->stock,
		'reports' => $request->reports,
		'alluser' => $request->alluser,
		'adminuserrole' => $request->adminuserrole,
		'type' => 2,

		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'Admin User Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('all.admin.user')->with($notification);

    	} // end else 

    } // end method 

    public function DeleteAdminRole($id){

        $adminimg = Admin::findOrFail($id);
        $img = $adminimg->profile_photo_path;
		if($adminimg->profile_photo_path){
			unlink($img);
		}

        Admin::findOrFail($id)->delete();

         $notification = array(
           'message' => 'Admin User Deleted Successfully',
           'alert-type' => 'info'
       );

       return redirect()->back()->with($notification);

    } // end method 
}

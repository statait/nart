<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site;
use Intervention\Image\Facades\Image as Image;

class SiteController extends Controller
{
    public function SiteView(){
		$sites = Site::latest()->first();
		return view('admin.Backend.Site.manage_site' ,compact('sites'));
	}

	public function SiteUpdate(Request $request){

    	$id = Site::findOrFail(1)->logo;

    	if ($request->file('logo')) {

		unlink($id);

    	$image = $request->file('logo');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->save('upload/logo/'.$name_gen);
    	$save_url_l = 'upload/logo/'.$name_gen;

	Site::findOrFail(1)->update([
		'name' => $request->name,
		'address' => $request->address,
		'email' => $request->email,
		'phone' => $request->phone,
		'logo' => $save_url_l,

    	]);

	    $notification = array(
			'message' => 'Setting Updated with Logo Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    	}if($request->file('watermark')) {

			unlink($id);

    	$image = $request->file('watermark');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->save('upload/logo/'.$name_gen);
		$save_url_w = 'upload/logo/'.$name_gen;

	Site::findOrFail(1)->update([
		'name' => $request->name,
		'address' => $request->address,
		'email' => $request->email,
		'phone' => $request->phone,
		'watermark' => $save_url_w,

    	]);

	    $notification = array(
			'message' => 'Setting Updated with Watermark Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    	}
		
		else{

    	Site::findOrFail(1)->update([
		'name' => $request->name,
		'address' => $request->address,
		'email' => $request->email,
		'phone' => $request->phone,
    	]);

	    $notification = array(
			'message' => 'Setting Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    	} // end else 
    } // end method 

}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Carbon;

class LocationController extends Controller
{
    public function LocationView(){
        $locations = Location::latest()->get();
        return view('admin.Backend.Location.location_view', compact('locations'));
    }

    public function LocationStore(Request $request){

    	$request->validate([
    		'store_name' => 'required',
    		'store_image' => 'required',
			'address' => 'required',
			'phone' => 'required',
			'map' => 'required',
    	]);

    	$image = $request->file('store_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(200,200)->save('upload/location/'.$name_gen);
    	$save_url = 'upload/location/'.$name_gen;

	Location::insert([
		'store_name' => $request->store_name,
		'address' => $request->address,
		'phone' => $request->phone,
		'map' => $request->map,
		'store_image' => $save_url,
		'created_at' => Carbon::now(),   

    	]);

	    $notification = array(
			'message' => 'Location Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 

	public function LocationEdit($id){
    	$location = Location::findOrFail($id);
    	return view('admin.Backend.Location.location_edit',compact('location'));

    }

		public function LocationUpdate(Request $request){
			
			$location_id = $request->id;
			$old_img = $request->old_image;
	
			if ($request->file('location_image')) {
	
			unlink($old_img);
			$image = $request->file('location_image');
			$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(870,370)->save('upload/location/'.$name_gen);
			$save_url = 'upload/location/'.$name_gen;
	
		Location::findOrFail($location_id)->update([
		'store_name' => $request->store_name,
		'address' => $request->address,
		'phone' => $request->phone,
		'map' => $request->map,
		'store_image' => $save_url,
		'updated_at' => Carbon::now(),   
	
			]);
	
			$notification = array(
				'message' => 'Location Updated Successfully',
				'alert-type' => 'info'
			);
	
			return redirect()->route('all.location')->with($notification);
	
			}
			else{
	
			Location::findOrFail($location_id)->update([
				'store_name' => $request->store_name,
				'address' => $request->address,
				'phone' => $request->phone,
				'map' => $request->map,
				'updated_at' => Carbon::now(),   
			
	
			]);
	
			$notification = array(
				'message' => 'Location Updated Without Image Successfully',
				'alert-type' => 'info'
			);
	
			return redirect()->route('all.location')->with($notification);
	
			} // end else 
		} // end method 


    public function LocationDelete($id){

    	Location::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Store Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 
}

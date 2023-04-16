<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 

class ReviewController extends Controller
{
    public function ReviewStore(Request $request){

    	$product = $request->product_id;

    	$request->validate([

    		'summary' => 'required',
    		'comment' => 'required',
    	]);

    	Review::insert([
    		'product_id' => $product,
    		'user_id' => Auth::id(),
    		'comment' => $request->comment,
    		'summary' => $request->summary,
    		'created_at' => Carbon::now(),

    	]);

    	$notification = array(
			'message' => 'Review Will Approve By Admin',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);


    } // end mehtod 


    public function PendingReview(){

    	$review = Review::where('status',0)->orderBy('id','DESC')->get();
    	return view('admin.Backend.Review.pending_review', compact('review'));

    } // end method 



    public function ReviewApprove($id){

    	Review::where('id',$id)->update(['status' => 1]);

    	$notification = array(
            'message' => 'Review Approved Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end mehtod 


	public function PublishReview(){
		$review = Review::where('status',1)->orderBy('id','DESC')->get();
			return view('admin.Backend.Review.publish_review',compact('review'));
		}
	
	
	
		public function DeleteReview($id){
	
			Review::findOrFail($id)->delete();
	
			$notification = array(
				'message' => 'Review Delete Successfully',
				'alert-type' => 'success'
			);
	
			return redirect()->back()->with($notification);
	
		} // end method 
	

}

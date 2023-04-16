<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class subCategoryController extends Controller
{
    public function SubCategoryView(){

    	$categories = Category::orderBy('category_name','ASC')->get();
    	$subcategory = subCategory::latest()->get();
    	return view('admin.Backend.Category.subCategory',compact('subcategory','categories'));

    }


     public function SubCategoryStore(Request $request){

       $request->validate([
    		'category_id' => 'required',
    		'subcategory_name' => 'required',
    	],[
    		'category_id.required' => 'Please select Any option',
    		'subcategory_name.required' => 'Input Sub-Category Name',
    	]);

    	 

	   subCategory::insert([
		'category_id' => $request->category_id,
		'subcategory_name' => $request->subcategory_name,
		'created_at' => Carbon::now(),   

    	]);

	    $notification = array(
			'message' => 'SubCategory Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 

	public function SubCategoryEdit($id){
    	$categories = Category::orderBy('category_name','ASC')->get();
    	$subcategory = SubCategory::findOrFail($id);
    	return view('admin.Backend.Category.subCategory_edit',compact('subcategory','categories'));

    }


    public function SubCategoryUpdate(Request $request){

    	$subcat_id = $request->id;

    	 SubCategory::findOrFail($subcat_id)->update([
		'category_id' => $request->category_id,
		'subcategory_name' => $request->subcategory_name,
	
		// 'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
		
		 

    	]);

	    $notification = array(
			'message' => 'SubCategory Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('subCategory.view')->with($notification);

    }  // end method



    public function SubCategoryDelete($id){

    	SubCategory::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'SubCategory Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    }

	public function GetSubCategory($category_id){

		$subcat = subCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
		return json_encode($subcat);
	}
}

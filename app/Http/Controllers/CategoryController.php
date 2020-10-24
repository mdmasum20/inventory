<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Show calagori list------- 
    public function allCategory()
    {
    	$Category_result = Category::all();
    	return view('allCategory', compact('Category_result'));
    }

    //Show calagori list------- 
    public function newCategory()
    {
    	return view('newCategory');
    }

    // Insert Category to database-----------
    public function insertCategory(Request $request)
    {
    	$validatedData = $request->validate([
            'cat_name' => 'required'
        ]);

        $data = array();

        $data['cat_name'] = $request->cat_name;
        $data['cat_status'] = 1;

        $insert_result = DB::table('categories')->insert($data);
        if ($insert_result) {
            $notification = array(
                'message' => 'Successfully Category Added ',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.category')->with($notification);
        }else{
            $notification = array(
                'message' => 'Category does not Added ',
                'alert-type' => 'danger'
            );
            return Redirect()->back()->with($notification);
        }
    }

    //Deactive Category----------- 
    public function ActiveDeactiveCategory($id)
    {
    	$cat_status = DB::table('categories')->where('id',$id)->first();

    	if ($cat_status->cat_status == 1) {
    		$data = array();
	        $data['cat_status'] = 0;
	        $deactive_result = DB::table('categories')->where('id',$id)->update($data);
	        if ($deactive_result) {
	            $notification = array(
	                'message' => 'Successfully Category Deactivated ',
	                'alert-type' => 'success'
	            );
	            return Redirect()->route('all.category')->with($notification);
	        }else{
	            $notification = array(
	                'message' => 'Category does not Deactivated ',
	                'alert-type' => 'danger'
	            );
	            return Redirect()->back()->with($notification);
	        }
    	}elseif ($cat_status->cat_status == 0) {
    		$data = array();
	        $data['cat_status'] = 1;
	        $deactive_result = DB::table('categories')->where('id',$id)->update($data);
	        if ($deactive_result) {
	            $notification = array(
	                'message' => 'Successfully Category Activated ',
	                'alert-type' => 'success'
	            );
	            return Redirect()->route('all.category')->with($notification);
	        }else{
	            $notification = array(
	                'message' => 'Category does not Activated ',
	                'alert-type' => 'danger'
	            );
	            return Redirect()->back()->with($notification);
	        }
    	}else{
    		$notification = array(
                'message' => 'Some different error!!! ',
                'alert-type' => 'danger'
            );
            return Redirect()->back()->with($notification);
    	}
    }

	// Single Category delete
    public function deleteCategory($id)
    {
    	$delete_result = DB::table('categories')->where('id',$id)->delete();

        if ($delete_result) {
            $notification = array(
                'message' => 'Successfully category deleted ',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.category')->with($notification);
        }else{
            $notification = array(
                'message' => 'Category does not deleted ',
                'alert-type' => 'danger'
            );
            return Redirect()->back()->with($notification);
        }
    }








































}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Customer;
use Illuminate\Support\Str;

class CustomerController extends Controller
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

    
    // New Customer page view method----------------------
    public function newCustomer(){
        return view('newCustomer');
    }

    // Insert New Customer  to database----------------------
    public function addCustomer(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:50',
            'email' => 'unique:customers',
            'phone' => 'required|unique:customers|max:13',
            'nid' => 'unique:customers',
            'address' => 'required',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['nid'] = $request->nid;
        $data['address'] = $request->address;
        $data['shopname'] = $request->shopname;
        $data['bank_account_holder'] = $request->bank_account_holder;
        $data['bank_account_number'] = $request->bank_account_number;
        $data['bank_account_routing_number'] = $request->bank_account_routing_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;
        $data['city'] = $request->city;

        $image = $request->file('photo');

        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/backend/img/customer/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['photo'] = $image_url;
                $customer_insert = DB::table('customers')->insert($data);
                if ($customer_insert) {
                    $notification = array(
                        'message' => 'Successfully customer added ',
                        'alert-type' => 'success'
                    );
                    return Redirect()->back()->with($notification);
                }else{
                    $notification = array(
                        'message' => 'Customer does not added ',
                        'alert-type' => 'danger'
                    );
                    return Redirect()->back()->with($notification);
                }
            }else{
                return Redirect()->back();
            }
        }else{
            $customer_insert = DB::table('customers')->insert($data);
            if ($customer_insert) {
                $notification = array(
                    'message' => 'Successfully customer added ',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'message' => 'Customer does not added ',
                    'alert-type' => 'danger'
                );
                return Redirect()->back()->with($notification);
            }
        }

    }



    // All Customer page view method-----------------------
    public function allCustomer(){
        $Customer_result = Customer::all();    //this line eluquient query using model to get all data from database----
        // $Customer_result = DB::table('customers')->get();   //This line query builder to get all data from database----
        // return view('allCustomer')->with('Customer_result', $Customer_result);    //Send data to view page
        return view('allCustomer', compact('Customer_result'));    //Send data to view page
    }

    //Single customer view
    public function viewCustomer($id)
    {
        $view_result = DB::table('customers')->where('id',$id)->first();
        return view('viewCustomer', compact('view_result'));
    }

    // Single customer delete
    public function deleteCustomer($id)
    {
        $get_result = DB::table('customers')->where('id',$id)->first();
        $photo = $get_result->photo; //photo name store to $photo variable
        if ($photo == NULL) {
			$delete_result = DB::table('customers')->where('id',$id)->delete();
		    if ($delete_result) {
		        $notification = array(
		            'message' => 'Successfully employee deleted ',
		            'alert-type' => 'success'
		        );
		        return Redirect()->route('all.customer')->with($notification);
		    }else{
		        $notification = array(
		            'message' => 'Employee does not deleted ',
		            'alert-type' => 'danger'
		        );
		        return Redirect()->back()->with($notification);
		    }
        }else{
        	unlink($photo);  //delete from folder
	    	$delete_result = DB::table('customers')->where('id',$id)->delete();
	        if ($delete_result) {
	            $notification = array(
	                'message' => 'Successfully employee deleted ',
	                'alert-type' => 'success'
	            );
	            return Redirect()->route('all.customer')->with($notification);
	        }else{
	            $notification = array(
	                'message' => 'Employee does not deleted ',
	                'alert-type' => 'danger'
	            );
	            return Redirect()->back()->with($notification);
	        }
        }
    }

    //Single customer view and send update page
    public function editCustomer($id)
    {
        $view_result = DB::table('customers')->where('id',$id)->first();
        return view('updateCustomer', compact('view_result'));
    }

    // Update Customer  to database----------------------
    public function updateCustomer(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:50',
            'phone' => 'required|max:13',
            'address' => 'required'
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['nid'] = $request->nid;
        $data['address'] = $request->address;
        $data['shopname'] = $request->shopname;
        $data['bank_account_holder'] = $request->bank_account_holder;
        $data['bank_account_number'] = $request->bank_account_number;
        $data['bank_account_routing_number'] = $request->bank_account_routing_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;
        $data['city'] = $request->city;

        $image = $request->file('photo');

        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/backend/img/customer/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['photo'] = $image_url;                
                $old_img = DB::table('customers')->where('id', $id)->first();
                $old_img_path = $old_img->photo;
                if ($old_img_path == "") {
                	$update_customer = DB::table('customers')->where('id', $id)->update($data);
                    if ($update_customer) {
                        $notification = array(
                            'message' => 'Successfully customer added ',
                            'alert-type' => 'success'
                        );
                        return Redirect()->route('all.customer')->with($notification);
                    }else{
                        $notification = array(
                            'message' => 'Customer does not added ',
                            'alert-type' => 'danger'
                        );
                        return Redirect()->back()->with($notification);
                    }
                }else{
                	$old_img_dlt = unlink($old_img_path);
	                if ($old_img_dlt) {
	                    $update_customer = DB::table('customers')->where('id', $id)->update($data);
	                    if ($update_customer) {
	                        $notification = array(
	                            'message' => 'Successfully customer added ',
	                            'alert-type' => 'success'
	                        );
	                        return Redirect()->route('all.customer')->with($notification);
	                    }else{
	                        $notification = array(
	                            'message' => 'Customer does not added ',
	                            'alert-type' => 'danger'
	                        );
	                        return Redirect()->back()->with($notification);
	                    }
	                }else{
	                    return Redirect()->back();
	                }
                }             
            }else{
                return Redirect()->back();
            }
        }else{
            $update_customer = DB::table('customers')->where('id', $id)->update($data);
            if ($update_customer) {
                $notification = array(
                    'message' => 'Successfully employee added ',
                    'alert-type' => 'success'
                );
                return Redirect()->route('all.customer')->with($notification);
            }else{
                $notification = array(
                    'message' => 'Employee does not added ',
                    'alert-type' => 'danger'
                );
                return Redirect()->back()->with($notification);
            }
        }



    }










































}

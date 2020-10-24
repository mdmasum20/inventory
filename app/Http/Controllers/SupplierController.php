<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Supplier;
use Illuminate\Support\Str;

class SupplierController extends Controller
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

    // New Supplier page view method----------------------
    public function newSupplier(){
        return view('newSupplier');
    }

    // Insert New Supplier to database----------------------
    public function addSupplier(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:50',
            'email' => 'unique:suppliers',
            'phone' => 'required|unique:suppliers|max:13',
            'nid' => 'unique:suppliers',
            'address' => 'required',
            'type' => 'required',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['nid'] = $request->nid;
        $data['address'] = $request->address;
        $data['shopname'] = $request->shopname;
        $data['type'] = $request->type;
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
            $upload_path = 'public/backend/img/supplier/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['photo'] = $image_url;
                $supplier_insert = DB::table('suppliers')->insert($data);
                if ($supplier_insert) {
                    $notification = array(
                        'message' => 'Successfully supplier added ',
                        'alert-type' => 'success'
                    );
                    return Redirect()->route('all.supplier')->with($notification);
                }else{
                    $notification = array(
                        'message' => 'Supplier does not added ',
                        'alert-type' => 'danger'
                    );
                    return Redirect()->back()->with($notification);
                }
            }else{
                return Redirect()->back();
            }
        }else{
            $supplier_insert = DB::table('suppliers')->insert($data);
            if ($supplier_insert) {
                $notification = array(
                    'message' => 'Successfully supplier added ',
                    'alert-type' => 'success'
                );
                return Redirect()->route('all.supplier')->with($notification);
            }else{
                $notification = array(
                    'message' => 'Supplier does not added ',
                    'alert-type' => 'danger'
                );
                return Redirect()->back()->with($notification);
            }
        }

    }

    // All Supplier page view method-----------------------
    public function allSupplier(){
        $Supplier_result = Supplier::all();    //this line eluquient query using model to get all data from database----
        // $Supplier_result = DB::table('suppliers')->get();   //This line query builder to get all data from database----
        // return view('allSupplier')->with('Supplier_result', $Supplier_result);    //Send data to view page
        return view('allSupplier', compact('Supplier_result'));    //Send data to view page
    }

    //Single supplier view and send update page
    public function viewSupplier($id)
    {
        $view_result = DB::table('suppliers')->where('id',$id)->first();
        return view('viewSupplier', compact('view_result'));
    }

    // Single customer delete
    public function deleteSupplier($id)
    {
        $get_result = DB::table('suppliers')->where('id',$id)->first();
        $photo = $get_result->photo; //photo name store to $photo variable
        if ($photo == NULL) {
			$delete_result = DB::table('suppliers')->where('id',$id)->delete();
		    if ($delete_result) {
		        $notification = array(
		            'message' => 'Successfully supplier deleted ',
		            'alert-type' => 'success'
		        );
		        return Redirect()->route('all.supplier')->with($notification);
		    }else{
		        $notification = array(
		            'message' => 'Supplier does not deleted ',
		            'alert-type' => 'danger'
		        );
		        return Redirect()->back()->with($notification);
		    }
        }else{
        	unlink($photo);  //delete from folder
	    	$delete_result = DB::table('suppliers')->where('id',$id)->delete();
	        if ($delete_result) {
	            $notification = array(
	                'message' => 'Successfully supplier deleted ',
	                'alert-type' => 'success'
	            );
	            return Redirect()->route('all.supplier')->with($notification);
	        }else{
	            $notification = array(
	                'message' => 'Supplier does not deleted ',
	                'alert-type' => 'danger'
	            );
	            return Redirect()->back()->with($notification);
	        }
        }
    }


    //Single supplier view and send update page
    public function editSupplier($id)
    {
        $view_result = DB::table('suppliers')->where('id',$id)->first();
        return view('updateSupplier', compact('view_result'));
    }

    // Update Supplier  to database----------------------
    public function updateSupplier(Request $request, $id){
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
        $data['type'] = $request->type;
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
            $upload_path = 'public/backend/img/supplier/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['photo'] = $image_url;                
                $old_img = DB::table('suppliers')->where('id', $id)->first();
                $old_img_path = $old_img->photo;
                if ($old_img_path == "") {
                	$update_supplier = DB::table('suppliers')->where('id', $id)->update($data);
                    if ($update_supplier) {
                        $notification = array(
                            'message' => 'Successfully supplier added ',
                            'alert-type' => 'success'
                        );
                        return Redirect()->route('all.supplier')->with($notification);
                    }else{
                        $notification = array(
                            'message' => 'Supplier does not added ',
                            'alert-type' => 'danger'
                        );
                        return Redirect()->back()->with($notification);
                    }
                }else{
                	$old_img_dlt = unlink($old_img_path);
	                if ($old_img_dlt) {
	                    $update_customer = DB::table('suppliers')->where('id', $id)->update($data);
	                    if ($update_customer) {
	                        $notification = array(
	                            'message' => 'Successfully supplier added ',
	                            'alert-type' => 'success'
	                        );
	                        return Redirect()->route('all.supplier')->with($notification);
	                    }else{
	                        $notification = array(
	                            'message' => 'Supplier does not added ',
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
            $update_customer = DB::table('suppliers')->where('id', $id)->update($data);
            if ($update_customer) {
                $notification = array(
                    'message' => 'Successfully supplier added ',
                    'alert-type' => 'success'
                );
                return Redirect()->route('all.supplier')->with($notification);
            }else{
                $notification = array(
                    'message' => 'SUpplier does not added ',
                    'alert-type' => 'danger'
                );
                return Redirect()->back()->with($notification);
            }
        }



    }































}

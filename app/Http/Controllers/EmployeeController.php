<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Employee;
use Illuminate\Support\Str;

class EmployeeController extends Controller
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

    // New Employee page view method----------------------
    public function newEmployee(){
        return view('newEmployee');
    }

    // Insert New Employee  to database----------------------
    public function addEmployee(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:50',
            'email' => 'required|unique:employees',
            'phone' => 'required|unique:employees|max:13',
            'nid' => 'required|unique:employees',
            'address' => 'required',
            'experience' => 'required',
            'photo' => 'required',
            'salary' => 'required'
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['nid'] = $request->nid;
        $data['address'] = $request->address;
        $data['experience'] = $request->experience;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;

        $image = $request->file('photo');

        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/backend/img/employee/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['photo'] = $image_url;
                $employee_insert = DB::table('employees')->insert($data);
                if ($employee_insert) {
                    $notification = array(
                        'message' => 'Successfully employee added ',
                        'alert-type' => 'success'
                    );
                    return Redirect()->route('all.emoloyee')->with($notification);
                }else{
                    $notification = array(
                        'message' => 'Employee does not added ',
                        'alert-type' => 'danger'
                    );
                    return Redirect()->back()->with($notification);
                }
            }else{
                return Redirect()->back();
            }
        }else{
            return Redirect()->back();
        }



    }

    // All Employee page view method-----------------------
    public function allEmployee(){
        $Employees_result = Employee::all();    //this line eluquient query using model to get all data from database----
        // $Employees_result = DB::table('employees')->get();   //This line query builder to get all data from database----
        // return view('allEmployee')->with('Employees_result', $Employees_result);    //Send data to view page
        return view('allEmployee', compact('Employees_result'));    //Send data to view page
    }

    //Single employee view
    public function viewEmployee($id)
    {
        $view_result = DB::table('employees')->where('id',$id)->first();
        return view('viewEmployee', compact('view_result'));
    }

    // Single employee delete
    public function deleteEmployee($id)
    {
        $get_result = DB::table('employees')->where('id',$id)->first();
        $photo = $get_result->photo; //photo name store to $photo variable
        unlink($photo);  //delete from folder
    	$delete_result = DB::table('employees')->where('id',$id)->delete();

        if ($delete_result) {
            $notification = array(
                'message' => 'Successfully employee deleted ',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.emoloyee')->with($notification);
        }else{
            $notification = array(
                'message' => 'Employee does not deleted ',
                'alert-type' => 'danger'
            );
            return Redirect()->back()->with($notification);
        }
    }

    //Single employee view and send update page
    public function editEmployee($id)
    {
        $view_result = DB::table('employees')->where('id',$id)->first();
        return view('updateEmployee', compact('view_result'));
    }


    // Update Employee  to database----------------------
    public function updateEmployee(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:50',
            'email' => 'required',
            'phone' => 'required|max:13',
            'nid' => 'required',
            'address' => 'required',
            'experience' => 'required',
            'salary' => 'required'
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['nid'] = $request->nid;
        $data['address'] = $request->address;
        $data['experience'] = $request->experience;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;
        $image = $request->file('photo');

        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/backend/img/employee/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['photo'] = $image_url;
                $old_img = DB::table('employees')->where('id', $id)->first();
                $old_img_path = $old_img->photo;
                $old_img_dlt = unlink($old_img_path);
                if ($old_img_dlt) {
                    $update_employee = DB::table('employees')->where('id', $id)->update($data);
                    if ($update_employee) {
                        $notification = array(
                            'message' => 'Successfully employee added ',
                            'alert-type' => 'success'
                        );
                        return Redirect()->route('all.emoloyee')->with($notification);
                    }else{
                        $notification = array(
                            'message' => 'Employee does not added ',
                            'alert-type' => 'danger'
                        );
                        return Redirect()->back()->with($notification);
                    }
                }else{
                    return Redirect()->back();
                }             
            }else{
                return Redirect()->back();
            }
        }else{
            $update_employee = DB::table('employees')->where('id', $id)->update($data);
            if ($update_employee) {
                $notification = array(
                    'message' => 'Successfully employee added ',
                    'alert-type' => 'success'
                );
                return Redirect()->route('all.emoloyee')->with($notification);
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

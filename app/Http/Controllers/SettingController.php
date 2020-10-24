<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Setting;
use Illuminate\Support\Str;

class SettingController extends Controller
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

    // Setting page view----------------
    public function companySettings()
    {
    	$setting_result = DB::table('settings')->first();

    	return view('companySettings', compact('setting_result'));
    }

    // Update Settings  to database----------------------
    public function updateSettings(Request $request, $id){
        $validatedData = $request->validate([
            'company_name' => 'required|min:4|max:50',
            'company_address' => 'required',
            'company_email' => 'required',
            'company_phone' => 'required|max:13'
        ]);

        $data = array();
        $data['company_name'] = $request->company_name;
        $data['company_address'] = $request->company_address;
        $data['company_email'] = $request->company_email;
        $data['company_phone'] = $request->company_phone;
        $data['company_mobile'] = $request->company_mobile;
        $data['company_city'] = $request->company_city;
        $data['company_country'] = $request->company_country;
        $data['company_zipcode'] = $request->company_zipcode;

        $image = $request->file('company_logo');

        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/backend/img/setting/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['company_logo'] = $image_url;
                $old_img = DB::table('settings')->where('id', $id)->first();
                $old_img_path = $old_img->company_logo;
                $old_img_dlt = unlink($old_img_path);
                if ($old_img_dlt) {
                    $update_settings = DB::table('settings')->where('id', $id)->update($data);
                    if ($update_settings) {
                        $notification = array(
                            'message' => 'Successfully Setting Updated ',
                            'alert-type' => 'success'
                        );
                        return Redirect()->route('company.settings')->with($notification);
                    }else{
                        $notification = array(
                            'message' => 'Setting does not Updated ',
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
            $update_settings = DB::table('settings')->where('id', $id)->update($data);
            if ($update_settings) {
                $notification = array(
                    'message' => 'Successfully Setting Updated ',
                    'alert-type' => 'success'
                );
                return Redirect()->route('company.settings')->with($notification);
            }else{
                $notification = array(
                    'message' => 'Setting does not Updated ',
                    'alert-type' => 'danger'
                );
                return Redirect()->back()->with($notification);
            }
        }



    }
























}

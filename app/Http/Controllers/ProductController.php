<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
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

    // New Product page view method----------------------
    public function newProduct(){
        return view('newProduct');
    }

    // Insert New Product  to database----------------------
    public function addProduct(Request $request){
        $validatedData = $request->validate([
            'product_name'  => 'required|max:50',
            'cat_id'        => 'required',
            'supplier_id'   => 'required',
            'product_code'  => 'required|unique:products',
            'product_place' => 'required',
            'product_route' => 'required',
            'product_image' => 'required',
            'buy_date'      => 'required',
            'expire_date'   => 'required',
            'buying_price'  => 'required',
            'selling_price' => 'required'
        ]);

        $data = array();
        $data['product_name']  = $request->product_name;
        $data['cat_id']        = $request->cat_id;
        $data['supplier_id']   = $request->supplier_id;
        $data['product_code']  = $request->product_code;
        $data['product_place'] = $request->product_place;
        $data['product_route'] = $request->product_route;
        $data['buy_date']      = $request->buy_date;
        $data['expire_date']   = $request->expire_date;
        $data['buying_price']  = $request->buying_price;
        $data['selling_price'] = $request->selling_price;

        $image = $request->file('product_image');

        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/backend/img/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['product_image'] = $image_url;
                $employee_insert = DB::table('products')->insert($data);
                if ($employee_insert) {
                    $notification = array(
                        'message' => 'Successfully product added ',
                        'alert-type' => 'success'
                    );
                    return Redirect()->route('all.product')->with($notification);
                }else{
                    $notification = array(
                        'message' => 'Product does not added ',
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

    // All Products page view method-----------------------
    public function allProduct(){
        $Product_result = Product::all();    //this line eluquient query using model to get all data from database----
        // $Product_result = DB::table('products')->get();   //This line query builder to get all data from database----
        // return view('allProduct')->with('Product_result', $Product_result);    //Send data to view page
        return view('allProduct', compact('Product_result'));    //Send data to view page
    }

    //Single product view and send update page
    public function viewProduct($id)
    {
        $view_result = DB::table('products')
        					->join('suppliers', 'products.supplier_id', 'suppliers.id')
        					->join('categories', 'products.cat_id', 'categories.id')
        					->select('products.*', 'suppliers.*', 'categories.*')
        					->where('products.id',$id)->first();
        return view('viewProduct', compact('view_result'));
    }

    // Single Product delete
    public function deleteProduct($id)
    {
        $get_result = DB::table('products')->where('id',$id)->first();
        $product_image = $get_result->product_image; //photo name store to $photo variable
        unlink($product_image);  //delete from folder
    	$delete_result = DB::table('products')->where('id',$id)->delete();

        if ($delete_result) {
            $notification = array(
                'message' => 'Successfully product deleted ',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.product')->with($notification);
        }else{
            $notification = array(
                'message' => 'Product does not deleted ',
                'alert-type' => 'danger'
            );
            return Redirect()->back()->with($notification);
        }
    }

    //Single product view and send update page
    public function editProduct($id)
    {
        $view_result = DB::table('products')->where('id',$id)->first();
        return view('updateProduct', compact('view_result'));
    }

    // Update Product  to database----------------------
    public function updateProduct(Request $request, $id){
        $validatedData = $request->validate([
            'product_name'  => 'required|max:50',
            'cat_id'        => 'required',
            'supplier_id'   => 'required',
            'product_code'  => 'required',
            'product_place' => 'required',
            'product_route' => 'required',
            'buy_date'      => 'required',
            'expire_date'   => 'required',
            'buying_price'  => 'required',
            'selling_price' => 'required'
        ]);

        $data = array();
        $data['product_name']  = $request->product_name;
        $data['cat_id']        = $request->cat_id;
        $data['supplier_id']   = $request->supplier_id;
        $data['product_code']  = $request->product_code;
        $data['product_place'] = $request->product_place;
        $data['product_route'] = $request->product_route;
        $data['buy_date']      = $request->buy_date;
        $data['expire_date']   = $request->expire_date;
        $data['buying_price']  = $request->buying_price;
        $data['selling_price'] = $request->selling_price;

        $image = $request->file('product_image');

        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/backend/img/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['product_image'] = $image_url;
                $old_img = DB::table('products')->where('id', $id)->first();
                $old_img_path = $old_img->product_image;
                $old_img_dlt = unlink($old_img_path);
                if ($old_img_dlt) {
                    $update_product = DB::table('products')->where('id', $id)->update($data);
                    if ($update_product) {
                        $notification = array(
                            'message' => 'Successfully product updated ',
                            'alert-type' => 'success'
                        );
                        return Redirect()->route('all.product')->with($notification);
                    }else{
                        $notification = array(
                            'message' => 'Product does not updated ',
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
            $update_product = DB::table('products')->where('id', $id)->update($data);
            if ($update_product) {
                $notification = array(
                    'message' => 'Successfully product updated ',
                    'alert-type' => 'success'
                );
                return Redirect()->route('all.product')->with($notification);
            }else{
                $notification = array(
                    'message' => 'Product does not updated ',
                    'alert-type' => 'danger'
                );
                return Redirect()->back()->with($notification);
            }
        }



    }


    // Product import page view-------------------
    public function importProduct()
    {
        return view('importProduct');
    }

    // Product export---------
    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    // Import product from file to database-------
     public function import(Request $request) 
    {
        $import_result = Excel::import(new ProductsImport, $request->file('product_import'));
        
        if ($import_result) {
            $notification = array(
                'message' => 'Successfully product imported ',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.product')->with($notification);
        }else{
            $notification = array(
                'message' => 'Product does not imported ',
                'alert-type' => 'danger'
            );
            return Redirect()->back()->with($notification);
        }
    }








































}

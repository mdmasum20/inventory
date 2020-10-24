@extends('layouts.app')

@section('content')
    
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">POS (Point Of Sale)</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Inventory</a></li>
                <li class="active">{{date('d-F-Y')}}</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <div class="portfolioFilter">
            	@foreach($category as $row)
                	<a href="#" data-filter="*" class="current">{{ $row->cat_name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <br>

    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-5 col-sm-12 col-lg-5">
            <div class="mini-stat clearfix bx-shadow row">
                <h5 class="text-uppercase col-md-6 col-sm-12 col-lg-6">
                	Customer
                </h5>
                <span class=" col-md-6 col-sm-12 col-lg-6">
            		<a href="#" class="btn btn-sm btn-success pull-rightwaves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Add New</a>
            	</span>
                <hr>
                <div class="tiles-progress">
                    <select class="form-control">
                    	<option disabled="" selected="">Select Customer</option>
                    	@foreach($customer as $row)
                    		<option>{{ $row->name }}</option>
                    	@endforeach
                    </select>
                    <br>
                    <div class="price_card text-center">
                        <ul class="price-features">
                        	<table class="table">
                        		<thead>
                        			<tr>
                        				<th>Name</th>
	                        			<th>Qty</th>
	                        			<th>Per Price</th>
	                        			<th>Sub Total</th>
	                        			<th>Action</th>
                        			</tr>
                        		</thead>
                        		<tbody>
                        			<tr>
                        				<td>sjdfhgj</td>
                        				<td>
                        					<input class="form-control" type="number" name="" value="" style="width: 50px;">
                        				</td>
                        				<td>sjdfhgj</td>
                        				<td>sjdfhgj</td>
                        				<td>
                        					<a href="" id="delete-warning" class="btn btn-danger waves-effect waves-light btn-sm"><i class="fa fa-trash-o"></i></a>
                        				</td>
                        			</tr>
                        		</tbody>>
                        	</table>
                            <li class="text-danger">Product not added.</li>
                        </ul>
                        <div class="pricing-footer bg-purple">
                            <span class="pos-product top-space">Quantity: </span>
                            <span class="pos-product">Products: </span>
                            <span class="pos-product">Vat: </span>
                            <hr>
                            <span class="bottom-space">Total: </span>
                        </div>
                        <button type="button" class="btn btn-success waves-effect waves-light m-b-5">Create Invoice</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-sm-12 col-lg-7">
            <div class="mini-stat clearfix bx-shadow">
                <div class="tiles-progress">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Cat Name</th>
                                <th>Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $row)
                                <tr>
                                    <td>
                                    	<a href="" class="btn waves-effect waves-light btn-success"> <i class="fa fa-plus-circle"></i></a> 
                                    </td>
                                    <td>
                                        <img src="{{ URL::to($row->product_image) }}" style="height: 30px; width: 30px;">
                                    </td>
                                    <td>{{ $row->product_name }}</td>
                                    <td>{{ $row->cat_name }}</td>
                                    <td>{{ $row->product_code }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
    <!-- End row-->


    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog"> 
            <div class="modal-content"> 
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                    <h4 class="modal-title">Add Customer</h4> 
                </div> 
                <form  method="post" action="{{url('/add-customer')}}" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
	                <div class="modal-body"> 
	                    <div class="row"> 
	                        <div class="col-md-6"> 
	                            <div class="form-group"> 
	                                <label for="field-1" class="control-label">Name</label> 
	                                <input type="text" class="form-control" id="name" name="name" required=""> 
	                            </div> 
	                        </div> 
	                        <div class="col-md-6"> 
	                            <div class="form-group"> 
	                                <label for="field-2" class="control-label">Email</label> 
	                                <input type="email" class="form-control" id="email" name="email"> 
	                            </div> 
	                        </div> 
	                    </div>
	                    <div class="row"> 
	                        <div class="col-md-6"> 
	                            <div class="form-group"> 
	                                <label for="field-1" class="control-label">Phone</label> 
	                                <input type="text" class="form-control" id="phone" name="phone" required> 
	                            </div> 
	                        </div> 
	                        <div class="col-md-6"> 
	                            <div class="form-group"> 
	                                <label for="field-2" class="control-label">NID No.</label> 
	                                <input type="text" class="form-control" id="nid" name="nid"> 
	                            </div> 
	                        </div> 
	                    </div> 
	                    <div class="row"> 
	                        <div class="col-md-6"> 
	                            <div class="form-group"> 
	                                <label for="field-1" class="control-label">City</label> 
	                                <input type="text" class="form-control" id="city" name="city"> 
	                            </div> 
	                        </div> 
	                        <div class="col-md-6"> 
	                            <div class="form-group"> 
	                                <label for="field-2" class="control-label">Shop Name</label> 
	                                <input type="text" class="form-control" id="shopname" name="shopname">
	                            </div> 
	                        </div> 
	                    </div> 
	                    <div class="row"> 
	                        <div class="col-md-12"> 
	                            <div class="form-group"> 
	                                <label for="field-3" class="control-label">Address</label> 
	                                <input type="text" class="form-control" id="address" name="address" required> 
	                            </div> 
	                        </div> 
	                    </div> 
	                    <div class="row"> 
	                        <div class="col-md-6"> 
	                            <div class="form-group"> 
	                                <label for="field-1" class="control-label">Bank Name</label> 
	                                <input type="text" class="form-control" id="bank_name" name="bank_name"> 
	                            </div> 
	                        </div> 
	                        <div class="col-md-6"> 
	                            <div class="form-group"> 
	                                <label for="field-2" class="control-label">Bank Branch Name</label> 
	                                <input type="text" class="form-control" id="bank_branch" name="bank_branch"> 
	                            </div> 
	                        </div> 
	                    </div> 
	                    <div class="row"> 
	                        <div class="col-md-6"> 
	                            <div class="form-group"> 
	                                <label for="field-1" class="control-label">Bank Account Holder</label> 
	                                <input type="text" class="form-control" id="bank_account_holder" name="bank_account_holder"> 
	                            </div> 
	                        </div> 
	                        <div class="col-md-6"> 
	                            <div class="form-group"> 
	                                <label for="field-2" class="control-label">Bank Account Number</label> 
	                                <input type="text" class="form-control" id="bank_account_number" name="bank_account_number"> 
	                            </div> 
	                        </div> 
	                    </div>
	                    <div class="row"> 
	                        <div class="col-md-6"> 
	                            <div class="form-group"> 
	                                <label for="field-1" class="control-label">Bank Routing No.</label> 
	                                <input type="text" class="form-control" id="bank_account_routing_number" name="bank_account_routing_number"> 
	                            </div> 
	                        </div> 
	                        <div class="col-md-6"> 
	                            <div class="form-group"> 
	                                <label for="field-2" class="control-label">Photo</label> 
	                                <div class="row">
	                                    <div class="col-12">
	                                        <input class="form-control upload" id="photo" name="photo" type="file" accept="image/*" required onchange="readURL(this);">
	                                    </div>
	                                    <div class="col-12 newEmployeeUploadImg"><img id="image" src="#" /></div>
	                                </div>
	                            </div> 
	                        </div> 
	                    </div>
	                </div>
	                @if ($errors->any())
	                    <div class="alert alert-danger">
	                        <ul>
	                            @foreach ($errors->all() as $error)
	                                <li>{{ $error }}</li>
	                            @endforeach
	                        </ul>
	                    </div>
	                @endif
	                <div class="modal-footer"> 
	                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
	                    <button type="submit" class="btn btn-success waves-effect waves-light">Save</button> 
	                </div> 
	            </form>
            </div> 
        </div>
    </div><!-- /.modal -->


     <script type="text/javascript">
        // this function for image show when select image to upload database------------
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#image')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


@endsection

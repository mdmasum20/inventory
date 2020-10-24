@extends('layouts.app')

@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Inventory !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="active">Update Product</li>
            </ol>
        </div>
    </div>

    <!-- Form-validation -->
    <div class="row">
        <div class="col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Update Product</h3></div>
                <div class="panel-body">
                    <div class=" form">
                        <form class="cmxform form-horizontal tasi-form" id="newProductForm" method="post" action="{{ url('/update-product/'.$view_result->id) }}" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-2">Product Name *</label>
                                <div class="col-lg-10">
                                    <input class=" form-control" id="product_name" name="product_name" type="text" value="{{ $view_result->product_name }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="lastname" class="control-label col-lg-2">Product Code *</label>
                                <div class="col-lg-10">
                                    <input class=" form-control" id="product_code" name="product_code" type="text" value="{{ $view_result->product_code }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="username" class="control-label col-lg-2">Product Category *</label>
                                <div class="col-lg-10">
                                	@php 
                                		$cat_status = 1;
                                		$get_cat = DB::table('categories')->where('cat_status', $cat_status)->get(); 
                                	@endphp
                                    <select class="form-control" name="cat_id">
                                    	@foreach($get_cat as $row)
                                    		<option value="{{ $row->id }}" <?php if($view_result->cat_id == $row->id){ echo "selected"; } ?> >{{ $row->cat_name }}</option>
                                    	@endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-2">Product Supplier</label>
                                <div class="col-lg-10">
                                    @php 
                                		$get_sup = DB::table('suppliers')->get(); 
                                	@endphp
                                    <select class="form-control" name="supplier_id">
                                    	@foreach($get_sup as $row)
                                    		<option value="{{ $row->id }}" <?php if($view_result->supplier_id == $row->id){ echo "selected"; } ?> >{{ $row->name }}</option>
                                    	@endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="confirm_password" class="control-label col-lg-2">Product Godown *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="product_place" name="product_place" type="text" value="{{ $view_result->product_place }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Product Route *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="product_route" name="product_route" type="text" value="{{ $view_result->product_route }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Buying Date *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="buy_date" placeholder="mm/dd/yyyy" id="buy_date" value="{{ $view_result->buy_date }}">
                                </div>
                            </div> 
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Expire Date *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="expire_date" placeholder="mm/dd/yyyy" id="expire_date" value="{{ $view_result->expire_date }}">
                                </div>
                            </div> 
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Buying Price *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="buying_price" name="buying_price" type="text" value="{{ $view_result->buying_price }}">
                                </div>
                            </div> 
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Selling Price *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="selling_price" name="selling_price" type="text" value="{{ $view_result->selling_price }}">
                                </div>
                            </div>                            
                            <div class="form-group profile-info-name">
                            	<label for="email" class="control-label col-lg-2">Old Photo</label>
                                <img src="{{ URL::to($view_result->product_image) }}" class="thumb-lg img-circle img-thumbnail" alt="profile-image" name="old_photo">
                            </div>                             
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">New Photo *</label>
                                <div class="col-lg-10 row">
                                    <div class="col-lg-10">
                                        <input class="form-control upload" id="product_image" name="product_image" type="file" accept="image/*" required onchange="readURL(this);">
                                    </div>
                                    <div class="col-lg-1 newEmployeeUploadImg"><img id="image" src="#" /></div>
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
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-success waves-effect waves-light" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- .form -->

                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->

    </div> <!-- End row -->


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
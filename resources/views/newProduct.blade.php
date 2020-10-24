@extends('layouts.app')

@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Inventory !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="active">New Product</li>
            </ol>
        </div>
    </div>

    <!-- Form-validation -->
    <div class="row">
        <div class="col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Add New Product</h3></div>
                <div class="panel-body">
                    <div class=" form">
                        <form class="cmxform form-horizontal tasi-form" id="newProductForm" method="post" action="{{ url('/add-product') }}" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-2">Product Name *</label>
                                <div class="col-lg-10">
                                    <input class=" form-control" id="product_name" name="product_name" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="lastname" class="control-label col-lg-2">Product Code *</label>
                                <div class="col-lg-10">
                                    <input class=" form-control" id="product_code" name="product_code" type="text">
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
                                    		<option value="{{ $row->id }}">{{ $row->cat_name }}</option>
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
                                    		<option value="{{ $row->id }}">{{ $row->name }}</option>
                                    	@endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="confirm_password" class="control-label col-lg-2">Product Godown *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="product_place" name="product_place" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Product Route *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="product_route" name="product_route" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Buying Date *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="buy_date" placeholder="mm/dd/yyyy" id="buy_date">
                                </div>
                            </div> 
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Expire Date *</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="expire_date" placeholder="mm/dd/yyyy" id="expire_date">
                                </div>
                            </div> 
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Buying Price *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="buying_price" name="buying_price" type="text">
                                </div>
                            </div> 
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Selling Price *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="selling_price" name="selling_price" type="text">
                                </div>
                            </div>                            
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Product Photo *</label>
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


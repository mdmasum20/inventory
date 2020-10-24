@extends('layouts.app')

@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Inventory !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="active">New Employee</li>
            </ol>
        </div>
    </div>

    <!-- Form-validation -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Update Employee</h3></div>
                <div class="panel-body">
                    <div class=" form">
                        <form class="cmxform form-horizontal tasi-form" id="newEmployeeForm" method="post" action="{{ url('/update-customer/'.$view_result->id) }}" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-3">Name *</label>
                                <div class="col-lg-9">
                                    <input class=" form-control" id="name" name="name" type="text" value="{{ $view_result->name }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="lastname" class="control-label col-lg-3">Email  *</label>
                                <div class="col-lg-9">
                                    <input class=" form-control" id="email" name="email" type="email" value="{{ $view_result->email }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="username" class="control-label col-lg-3">Phone *</label>
                                <div class="col-lg-9">
                                    <input class="form-control " id="phone" name="phone" type="text" value="{{ $view_result->phone }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">NID *</label>
                                <div class="col-lg-9">
                                    <input class="form-control " id="nid" name="nid" type="text" value="{{ $view_result->nid }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="confirm_password" class="control-label col-lg-3">Address *</label>
                                <div class="col-lg-9">
                                    <input class="form-control " id="address" name="address" type="text" value="{{ $view_result->address }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Shopname</label>
                                <div class="col-lg-9">
                                    <input class="form-control " id="shopname" name="shopname" type="text" value="{{ $view_result->shopname }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Bank Account Holder</label>
                                <div class="col-lg-9">
                                    <input class="form-control " id="bank_account_holder" name="bank_account_holder" type="text" value="{{ $view_result->bank_account_holder }}">
                                </div>
                            </div> 
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Bank Account Number</label>
                                <div class="col-lg-9">
                                    <input class="form-control " id="bank_account_number" name="bank_account_number" type="text" value="{{ $view_result->bank_account_number }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Bank Account Routing No.</label>
                                <div class="col-lg-9">
                                    <input class="form-control " id="bank_account_routing_number" name="bank_account_routing_number" type="text" value="{{ $view_result->bank_account_routing_number }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Bank Name</label>
                                <div class="col-lg-9">
                                    <input class="form-control " id="bank_name" name="bank_name" type="text" value="{{ $view_result->bank_name }}">
                                </div>
                            </div> 
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Bank Branch</label>
                                <div class="col-lg-9">
                                    <input class="form-control " id="bank_branch" name="bank_branch" type="text" value="{{ $view_result->bank_branch }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">City *</label>
                                <div class="col-lg-9">
                                    <input class="form-control " id="city" name="city" type="text" value="{{ $view_result->city }}">
                                </div>
                            </div>
                            <div class="form-group profile-info-name">
                            	<label for="email" class="control-label col-lg-3">Old Photo</label>
                                <img src="{{ URL::to($view_result->photo) }}" class="thumb-lg img-circle img-thumbnail" alt="profile-image" name="old_photo">
                            </div>                           
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">New Photo</label>
                                <div class="col-lg-9 row">
                                    <div class="col-lg-10">
                                        <input class="form-control upload " id="photo" name="photo" type="file" accept="image/*" required onchange="readURL(this);">
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
                                    <button class="btn btn-success waves-effect waves-light" type="submit">Update</button>
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
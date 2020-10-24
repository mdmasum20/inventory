@extends('layouts.app')

@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Inventory !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="active">Company Details</li>
            </ol>
        </div>
    </div>

    <div class="wraper container-fluid">
        <div class="row">
            <div class="col-lg-12"> 
            
            <div class="tab-content profile-tab-content"> 
                <div class="tab-pane active" id="home-2"> 
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Personal-Information -->
                            <div class="panel panel-default panel-fill">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">Company Information</h3> 
                                </div> 
                                <div class="panel-body">
                                    <div class="profile-info-name">
                                        <img src="{{ URL::to($setting_result->company_logo) }}" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    </div><br>
                                    <div class="about-info-p">
                                        <strong>Company Name</strong>
                                        <br/>
                                        <p class="text-muted">{{ $setting_result->company_name }}</p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Company Address</strong>
                                        <br/>
                                        <p class="text-muted">{{ $setting_result->company_address }}</p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Company Email</strong>
                                        <br/>
                                        <p class="text-muted">{{ $setting_result->company_email }}</p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Company Phone</strong>
                                        <br/>
                                        <p class="text-muted">{{ $setting_result->company_phone }}</p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Company Mobile</strong>
                                        <br/>
                                        <p class="text-muted">{{ $setting_result->company_mobile }}</p>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                        <strong>City</strong>
                                        <br/>
                                        <p class="text-muted">{{ $setting_result->company_city }}</p>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                        <strong>Company Country</strong>
                                        <br/>
                                        <p class="text-muted">{{ $setting_result->company_country }}</p>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                        <strong>Company Zip-Code</strong>
                                        <br/>
                                        <p class="text-muted">{{ $setting_result->company_zipcode }}</p>
                                    </div>
                                </div> 
                            </div>
                            <!-- Personal-Information -->
                        </div>


                        <div class="col-md-8">
                            <!-- Personal-Information -->
                            <div class="panel panel-default panel-fill">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">Update Company Information</h3> 
                                </div> 
                                <div class="panel-body">
                                    <div class=" form">
				                        <form class="cmxform form-horizontal tasi-form" id="newEmployeeForm" method="post" action="{{ url('/update-setting/'.$setting_result->id) }}" novalidate="novalidate" enctype="multipart/form-data">
				                            @csrf
				                            <div class="form-group ">
				                                <label for="firstname" class="control-label col-lg-2">Name *</label>
				                                <div class="col-lg-10">
				                                    <input class=" form-control" id="company_name" name="company_name" type="text" value="{{ $setting_result->company_name }}">
				                                </div>
				                            </div>
				                            <div class="form-group ">
				                                <label for="lastname" class="control-label col-lg-2">Email  *</label>
				                                <div class="col-lg-10">
				                                    <input class=" form-control" id="company_email" name="company_email" type="email" value="{{ $setting_result->company_email }}">
				                                </div>
				                            </div>
				                            <div class="form-group ">
				                                <label for="username" class="control-label col-lg-2">Phone *</label>
				                                <div class="col-lg-10">
				                                    <input class="form-control " id="company_phone" name="company_phone" type="text" value="{{ $setting_result->company_phone }}">
				                                </div>
				                            </div>
				                            <div class="form-group ">
				                                <label for="username" class="control-label col-lg-2">Mobile *</label>
				                                <div class="col-lg-10">
				                                    <input class="form-control " id="company_mobile" name="company_mobile" type="text" value="{{ $setting_result->company_mobile }}">
				                                </div>
				                            </div>
				                            <div class="form-group ">
				                                <label for="confirm_password" class="control-label col-lg-2">Address *</label>
				                                <div class="col-lg-10">
				                                    <input class="form-control " id="company_address" name="company_address" type="text" value="{{ $setting_result->company_address }}">
				                                </div>
				                            </div>
				                            <div class="form-group ">
				                                <label for="email" class="control-label col-lg-2">City *</label>
				                                <div class="col-lg-10">
				                                    <input class="form-control " id="company_city" name="company_city" type="text" value="{{ $setting_result->company_city }}">
				                                </div>
				                            </div>
				                            <div class="form-group ">
				                                <label for="email" class="control-label col-lg-2">Country *</label>
				                                <div class="col-lg-10">
				                                    <input class="form-control " id="company_country" name="company_country" type="text" value="{{ $setting_result->company_country }}">
				                                </div>
				                            </div> 
				                            <div class="form-group ">
				                                <label for="email" class="control-label col-lg-2">Zip-Code *</label>
				                                <div class="col-lg-10">
				                                    <input class="form-control " id="company_zipcode" name="company_zipcode" type="text" value="{{ $setting_result->company_zipcode }}">
				                                </div>
				                            </div>
				                            <div class="form-group profile-info-name">
				                            	<label for="email" class="control-label col-lg-2">Old Logo</label>
				                                <img src="{{ URL::to($setting_result->company_logo) }}" class="thumb-lg img-circle img-thumbnail" alt="profile-image" name="old_photo">
				                            </div>                           
				                            <div class="form-group ">
				                                <label for="email" class="control-label col-lg-2">New Logo</label>
				                                <div class="col-lg-10 row">
				                                    <div class="col-lg-10">
				                                        <input class="form-control upload " id="company_logo" name="company_logo" type="file" accept="image/*" required onchange="readURL(this);">
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
                                </div> 
                            </div>
                            <!-- Personal-Information -->

                        </div>

                    </div>
                </div> 
            </div> 
        </div>
        </div>
    </div> <!-- container -->


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
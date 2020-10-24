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
        <div class="col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Add New Employee</h3></div>
                <div class="panel-body">
                    <div class=" form">
                        <form class="cmxform form-horizontal tasi-form" id="newEmployeeForm" method="post" action="{{ url('/add-employee') }}" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-2">Name *</label>
                                <div class="col-lg-10">
                                    <input class=" form-control" id="name" name="name" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="lastname" class="control-label col-lg-2">Email  *</label>
                                <div class="col-lg-10">
                                    <input class=" form-control" id="email" name="email" type="email">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="username" class="control-label col-lg-2">Phone *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="phone" name="phone" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-2">NID *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="nid" name="nid" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="confirm_password" class="control-label col-lg-2">Address *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="address" name="address" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Ecperience *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="experience" name="experience" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Salary *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="salary" name="salary" type="text">
                                </div>
                            </div> 
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Vacation *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="vacation" name="vacation" type="text">
                                </div>
                            </div> 
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">City *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="city" name="city" type="text">
                                </div>
                            </div>                            
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Photo *</label>
                                <div class="col-lg-10 row">
                                    <div class="col-lg-10">
                                        <input class="form-control upload" id="photo" name="photo" type="file" accept="image/*" required onchange="readURL(this);">
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
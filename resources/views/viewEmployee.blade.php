@extends('layouts.app')

@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Inventory !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="active">Employee Details</li>
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
                                    <h3 class="panel-title">Personal Information</h3> 
                                </div> 
                                <div class="panel-body">
                                    <div class="profile-info-name">
                                        <img src="{{ URL::to($view_result->photo) }}" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    </div><br>
                                    <div class="about-info-p">
                                        <strong>Full Name</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->name }}</p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Email</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->email }}</p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Mobile</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->phone }}</p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>NID NO.</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->nid }}</p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Address</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->address }}</p>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                        <strong>City</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->city }}</p>
                                    </div>
                                </div> 
                            </div>
                            <!-- Personal-Information -->
                        </div>


                        <div class="col-md-8">
                            <!-- Personal-Information -->
                            <div class="panel panel-default panel-fill">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">Biography</h3> 
                                </div> 
                                <div class="panel-body">
                                    <div class="about-info-p m-b-0">
                                        <strong>Experience</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->experience }}</p>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                        <strong>Salary</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->salary }}</p>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                        <strong>Vacation</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->vacation }}</p>
                                    </div>
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


@endsection
@extends('layouts.app')

@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Inventory !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="active">Product Details</li>
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
                                    <h3 class="panel-title">Product Info</h3> 
                                </div> 
                                <div class="panel-body">
                                    <div class="profile-info-name">
                                        <img src="{{ URL::to($view_result->product_image) }}" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    </div><br>
                                    <div class="about-info-p">
                                        <strong>Name</strong>
                                        <p class="text-muted">{{ $view_result->product_name }}</p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Code</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->product_code }}</p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Category</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->cat_name }}</p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Supplier</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->name }}</p>
                                    </div>
                                </div> 
                            </div>
                            <!-- Personal-Information -->
                        </div>


                        <div class="col-md-4">
                            <!-- Personal-Information -->
                            <div class="panel panel-default panel-fill">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">Pricing</h3> 
                                </div> 
                                <div class="panel-body">
                                    <div class="about-info-p m-b-0">
                                        <strong>Buying Price</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->buying_price }}</p>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                        <strong>Selling Price</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->selling_price }}</p>
                                    </div>
                                </div> 
                            </div>
                            <!-- Personal-Information -->

                        </div>

                        <div class="col-md-4">
                            <!-- Personal-Information -->
                            <div class="panel panel-default panel-fill">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">Buy & Expire Date</h3> 
                                </div> 
                                <div class="panel-body">
                                    <div class="about-info-p m-b-0">
                                        <strong>Buying Date</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->buy_date }}</p>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                        <strong>Expire Date</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->expire_date	 }}</p>
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
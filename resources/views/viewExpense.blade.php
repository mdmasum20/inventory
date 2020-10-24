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
                        <div class="col-md-6">
                            <!-- Personal-Information -->
                            <div class="panel panel-default panel-fill">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">Expense Info</h3> 
                                </div> 
                                <div class="panel-body">
                                    <div class="about-info-p">
                                        <strong>Expense Name</strong>
                                        <p class="text-muted">{{ $view_result->expense_name }}</p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Expense Details</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->expense_details }}</p>
                                    </div>
                                </div> 
                            </div>
                            <!-- Personal-Information -->
                        </div>


                        <div class="col-md-3">
                            <!-- Personal-Information -->
                            <div class="panel panel-default panel-fill">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">Expense Time</h3> 
                                </div> 
                                <div class="panel-body">
                                    <div class="about-info-p m-b-0">
                                        <strong>Buying Price</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->expense_date }}</p>
                                    </div>
                                </div> 
                            </div>
                            <!-- Personal-Information -->

                        </div>

                        <div class="col-md-3">
                            <!-- Personal-Information -->
                            <div class="panel panel-default panel-fill">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">Expense Cost</h3> 
                                </div> 
                                <div class="panel-body">
                                    <div class="about-info-p m-b-0">
                                        <strong>Expense Amount</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->expense_amount }}</p>
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
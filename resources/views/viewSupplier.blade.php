@extends('layouts.app')

@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Inventory !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="active">Customer Details</li>
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
                                        <p class="text-muted">
                                            @if($view_result->email == NULL)
                                                None
                                            @else
                                                {{ $view_result->email }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Mobile</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->phone }}</p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>NID NO.</strong>
                                        <br/>
                                        <p class="text-muted">
                                            @if($view_result->nid == NULL)
                                                None
                                            @else
                                                {{ $view_result->nid }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Shop Name</strong>
                                        <br/>
                                        <p class="text-muted">
                                            @if($view_result->shopname == NULL)
                                                None
                                            @else
                                                {{ $view_result->shopname }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Supplier Type</strong>
                                        <br/>
                                        <p class="text-muted">
                                            @if($view_result->type == 1)
                                        		Distributor
                                        	@elseif($view_result->type == 2)
                                        		Whole Seller
                                        	@elseif($view_result->type == 3)
                                        		Broker
                                        	@endif
                                        </p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Address</strong>
                                        <br/>
                                        <p class="text-muted">{{ $view_result->address }}</p>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                        <strong>City</strong>
                                        <br/>
                                        <p class="text-muted">
                                            @if($view_result->city == NULL)
                                                None
                                            @else
                                                {{ $view_result->city }}
                                            @endif
                                        </p>
                                    </div>
                                </div> 
                            </div>
                            <!-- Personal-Information -->
                        </div>


                        <div class="col-md-8">
                            <!-- Personal-Information -->
                            <div class="panel panel-default panel-fill">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">Bank Details</h3> 
                                </div> 
                                <div class="panel-body">
                                    <div class="about-info-p m-b-0">
                                        <strong>Bank Name</strong>
                                        <br/>
                                        <p class="text-muted">
                                            @if($view_result->bank_name == NULL)
                                                None
                                            @else
                                                {{ $view_result->bank_name }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                        <strong>Branch Name</strong>
                                        <br/>
                                        <p class="text-muted">
                                            @if($view_result->bank_branch == NULL)
                                                None
                                            @else
                                                {{ $view_result->bank_branch }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                        <strong>Bank Account Holder</strong>
                                        <br/>
                                        <p class="text-muted">
                                            @if($view_result->bank_account_holder == NULL)
                                                None
                                            @else
                                                {{ $view_result->bank_account_holder }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                        <strong>Bank Account Number</strong>
                                        <br/>
                                        <p class="text-muted">
                                            @if($view_result->bank_account_number == NULL)
                                                None
                                            @else
                                                {{ $view_result->bank_account_number }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                        <strong>Bank Account Routing Number</strong>
                                        <br/>
                                        <p class="text-muted">
                                            @if($view_result->bank_account_routing_number == NULL)
                                                None
                                            @else
                                                {{ $view_result->bank_account_routing_number }}
                                            @endif
                                        </p>
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
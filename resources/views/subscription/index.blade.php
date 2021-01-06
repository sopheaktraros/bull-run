@extends('admin.template.master')

@section('title')
Subscription
@endsection

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Subscription</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Subscription</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('subscription') }}">Subscription</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row"> 
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if(hasPermission('subscription') > 0)
                            <a href="{{ route('subscription.create') }}" class="btn btn-primary">Add New</a>
                        @endif
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="subscription-table" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Subscriber</th>
                                        <th>Package</th>
                                        <th>Price</th>
                                        <th>Subscribe Date</th>
                                        <th>Due Date</th>
                                        <th>Payment Status</th>
                                        <th>Subscription Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


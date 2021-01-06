@extends('admin.template.master')

@section('title')
Subscriber
@endsection

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Subscriber</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Subscription</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('subscriber') }}">Subscriber</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row"> 
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if(hasPermission('subscriber') > 0)
                            <a href="{{ route('subscriber.create') }}" class="btn btn-primary">Add New</a>
                        @endif
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="subscriber-table" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Subscriber</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Logo</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
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


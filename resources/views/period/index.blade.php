@extends('template.master')

@section('title')
Period
@endsection

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Period</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Configuration</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('period') }}">Period</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
          
                    <div class="card-header text-right">
                        @if(hasPermission('period') > 0)
                        <a href="{{ route('period.create') }}" class="btn btn-primary">Add New</a>
                        @endif
                        
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="period-table" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Period</th>
                                        <th>Interest</th>
                                        <th>Created By</th>
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


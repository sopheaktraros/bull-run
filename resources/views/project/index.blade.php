@extends('template.master')

@section('title')
Project
@endsection

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Project</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Configuration</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('project') }}">Project</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
          
                    <div class="card-header text-right">
                        @if(hasPermission('project') > 0)
                        <a href="{{ route('project.create') }}" class="btn btn-primary">Add New</a>
                        @endif
                        
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="project-table" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Project No</th>
                                        <th>Name</th>
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


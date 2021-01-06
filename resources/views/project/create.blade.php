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
            <div class="breadcrumb-item"><a href="{{ route('project') }}">Project</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('project.create') }}">Add New</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row"> 
            <div class="col-12">
                <div class="card">
                {!! Form::open(['url' => route('project.store'), 'class' => 'needs-validation','files'=> true]) !!}
                    <div class="card-body">

                        <div class="form-group">
                            <label>Project No <span class="note">*</span></label>
                            <input type="text" name="project_no" id="project" class="form-control" required="">
                            @error('project_no')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>Name <span class="note">*</span></label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" required="">
                            @error('name')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                        <a href="{{ route('project') }}" class="btn btn-danger">Back</a>
                    </div>
                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection
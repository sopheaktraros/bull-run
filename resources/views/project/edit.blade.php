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
            <div class="breadcrumb-item active"><a href="{{ route('project.edit', $project->id) }}">Edit</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row"> 
            <div class="col-12">
                <div class="card">
                {!! Form::open(['url' => route('project.update',$project->id), 'class' => 'needs-validation','files'=> true]) !!}
                    <div class="card-body">

                        <div class="form-group">
                            <label>Period <span class="note">*</span></label>
                            <input name="project_no" value="{{ $project->project_no }}" type="text" class="form-control @error('period') is-invalid @enderror" required="">
                            @error('project_no')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>Name <span class="note">*</span></label>
                            <input name="name" value="{{ $project->name }}" type="text" class="form-control @error('name') is-invalid @enderror" required="">
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
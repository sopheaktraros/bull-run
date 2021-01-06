@extends('template.master')

@section('title')
House Types
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>House Types</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Configuration</a></div>
            <div class="breadcrumb-item"><a href="{{ route('house_types') }}">House Type</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('house_types.create') }}">Add New</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row"> 
            <div class="col-12">
                <div class="card">
                {!! Form::open(['url' => route('house_types.store'), 'class' => 'needs-validation','files'=> true]) !!}
                    <div class="card-body">
                        
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
                        <a href="{{ route('house_types') }}" class="btn btn-danger">Back</a>
                    </div>
                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection
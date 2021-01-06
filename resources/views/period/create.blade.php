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
            <div class="breadcrumb-item"><a href="{{ route('period') }}">Period</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('period.create') }}">Add New</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row"> 
            <div class="col-12">
                <div class="card">
                {!! Form::open(['url' => route('period.store'), 'class' => 'needs-validation','files'=> true]) !!}
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

                        <div class="form-group">
                            <label>Period <span class="note">*</span></label>
                            <input type="number" name="period" id="period" class="form-control" required="">
                            @error('period')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Rate <span class="note">*</span></label>
                            <input type="text" name="rate" id="rate" class="form-control" required="">
                            @error('rate')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                        <a href="{{ route('period') }}" class="btn btn-danger">Back</a>
                    </div>
                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection
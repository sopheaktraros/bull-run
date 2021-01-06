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
            <div class="breadcrumb-item"><a href="{{ route('subscriber') }}">Subscriber</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('subscriber.create') }}">Add New</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row"> 
            <div class="col-12">
                <div class="card">
                {!! Form::open(['url' => route('subscriber.store'), 'class' => 'needs-validation','files'=> true]) !!}
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Subscriber <span class="note">*</span></label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" required="">
                            @error('name')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Contact number <span class="note">*</span></label>
                            <input name="phone" value="{{ old('phone') }}" type="text" class="form-control @error('phone') is-invalid @enderror" required="">
                            @error('phone')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                            
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-form-label text-md-right">Logo <span class="note">*</span></label>
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="logo" id="image-upload" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Status <span class="note">*</span></label>
                            <select class="form-control" name="status">
                                <option selected value="ENABLE">Enable</option>
                                <option value="DISABLE">Disable</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                        <a href="{{ route('subscriber') }}" class="btn btn-danger">Back</a>
                    </div>
                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection
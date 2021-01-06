
@extends('template.master')

@section('title')
General Setting
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>General Setting</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Configuration</a></div>
            <div class="breadcrumb-item"><a href="{{ route('general_setting') }}">General Setting</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row"> 
            <div class="col-12">
                <div class="card">
                {!! Form::open(['url' => route('general_setting.update'), 'class' => 'needs-validation','files'=> true]) !!}
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-6">
                                <label>Name <span class="note">*</span></label>
                                <input name="name" value="{{ $profile->name }}" type="text" class="form-control @error('name') is-invalid @enderror" required="">
                                @error('name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label>Contact number <span class="note">*</span></label>
                                <input name="phone" value="{{ $profile->phone }}" type="text" class="form-control @error('phone') is-invalid @enderror" required="">
                                @error('phone')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            
                            
                        </div>

                        <div class="form-group row">
                            <div class="col-6">
                                <label>Email <span class="note">*</span></label>
                                <input name="email" value="{{ $profile->email }}" type="email" class="form-control @error('email') is-invalid @enderror" required="">
                                @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="col-6">
                                <label>Company Address <span class="note">*</span></label>
                                <input name="address" value="{{ $profile->address }}" type="text" class="form-control @error('address') is-invalid @enderror" required="">
                                @error('address')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            
                        </div>

                        <div class="form-group row">

                            <div class="col-6">
                                <label>Registeration No <span class="note">*</span></label>
                                <input name="registration_no" value="{{ $profile->registration_no }}" type="text" class="form-control @error('registration_no') is-invalid @enderror" required="">
                                @error('registration_no')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label>Represented By <span class="note">*</span></label>
                                <input name="represented_by" value="{{ $profile->represented_by }}" type="text" class="form-control @error('represented_by') is-invalid @enderror" required="">
                                @error('represented_by')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                       
                        </div>

                        <div class="form-group row">

                            <div class="col-6">
                                <label>Exchange Rate</label>
                                <input name="exchange_rate" value="{{ $profile->exchange_rate }}" type="text" class="form-control @error('exchange_rate') is-invalid @enderror" required="">
                                @error('exchange_rate')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label>Reminder <span class="note">*</span></label>
                                <input name="alert_before" value="{{ $profile->alert_before }}" type="number" class="form-control @error('alert_before') is-invalid @enderror" required="">
                                @error('alert_before')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                       
                        </div>

                        

                        <div class="form-group">
                            <label for="" class="col-form-label">Company Logo <span class="note">*</span></label>
                            <div data-id="custom-file-wrapper">
                                
                                <div data-id="custom-file-form" class="custom-file mt-2" data-cursor="pointer">
                                    <input type="file" name="logo" onchange="readURL(this);" class="custom-file-input form-control" accept="image/*">
                                    <label class="custom-file-label">Recommended size: 150 x 150 pixels</label>
                                </div>
                                <div data-id="custom-file-preview-container">
                                    <img id="blah" src="{{ $profile->logo != '' ? asset($profile->logo) : asset('images/no_images.jpg') }}" data-id="custom-file-preview" class="prev-img img-fluid" alt="Preview">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Update</button>
                        <a href="{{ route('general_setting') }}" class="btn btn-danger">Back</a>
                    </div>
                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection

@push('footer-scripts')
<script>
function readURL(input) {
    var a=input.files[0];
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var image = new Image();
            image.src = e.target.result;
            image.onload = function () {
            $('#blah').attr('src', e.target.result);
        };

        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endpush
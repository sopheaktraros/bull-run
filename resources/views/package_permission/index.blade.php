
@extends('admin.template.master')

@section('title')
Permission
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Permission</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Package & Permission</a></div>
            <div class="breadcrumb-item"><a href="{{ route('package_permission') }}">Permission</a></div>
        </div>
    </div>

    <div class="section-body">
    {!! Form::open(['url' => route('package_permission.update'), 'class' => 'needs-validation']) !!}
        <div class="col-12">
            <div class="row">
            
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Select Package <span class="note">*</span></label>
                                <select name="package" id="package" class="form-control select2" required>
                                    @foreach($package as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-primary" id="btnSearchPackagePermission">Search</button>
                        </div>
                        
                    </div>
                </div>

                <div class="col-8">
                    <div class="card">
                        
                        <div class="card-body">
                        
                            <div id="packagePermission"></div>
                        
                        </div>
                    </div>
                </div>
                
            
            </div>
        </div>
    {!! Form::close() !!}
    </div>
</section>
@endsection

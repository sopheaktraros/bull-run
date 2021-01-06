@extends('admin.template.master')

@section('title')
Subscription
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Subscription</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Subscription</a></div>
            <div class="breadcrumb-item"><a href="{{ route('subscriber') }}">Subscription</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('subscriber.edit', $subscription->id) }}">Edit</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row"> 
            <div class="col-12">
                <div class="card">
                {!! Form::open(['url' => route('subscription.update',$subscription->id), 'class' => 'needs-validation','files'=> true]) !!}
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-6">
                                <label>First name <span class="note">*</span></label>
                                <input name="first_name" value="{{ $subscriber_user->first_name }}" type="text" class="form-control @error('first_name') is-invalid @enderror" required="">
                                @error('first_name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label>Last name <span class="note">*</span></label>
                                <input name="last_name" value="{{ $subscriber_user->last_name }}" type="text" class="form-control @error('last_name') is-invalid @enderror" required="">
                                @error('last_name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-6">
                                <label>Email <span class="note">*</span></label>
                                <input name="email" value="{{ $subscriber_user->email }}" type="email" class="form-control @error('email') is-invalid @enderror" required="">
                                @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label>Contact number <span class="note">*</span></label>
                                <input name="phone" value="{{ $subscriber_user->phone }}" type="text" class="form-control @error('phone') is-invalid @enderror" required="">
                                @error('phone')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-6">
                                <label>Choose Subscriber <span class="note">*</span></label>
                                <select name="subscriber_id" class="form-control select2">
                                    @foreach($subscriber as $s)
                                        <option value="{{ $s->id }}" {{ $subscription->subscriber_id == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6">
                                <label>Choose Package <span class="note">*</span></label>
                                <input type="hidden" name="period" id="period">
                                <select name="package_id" id="package_id" class="form-control select2">
                                    <option value="0" data-price="0" data-period = "0">--None--</option>
                                    @foreach($package as $p)
                                        <option value="{{ $p->id }}" data-price="{{ $p->price }}" data-period="{{ $p->period }}" {{ $subscription->package_id == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Price <span class="note">*</span></label>
                            <input name="price" id="price" value="{{ $subscription->price }}" type="text" class="form-control number @error('price') is-invalid @enderror" required="">
                            @error('price')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Subscribe Date</label>
                            <input name="started_date" type="text" class="form-control datepicker" value="{{ $subscription->started_date }}" required="">
                        </div>

                        <div class="form-group">
                            <label>Payment Status <span class="note">*</span></label>
                            <select class="form-control" name="payment_status">
                                <option value="UNPAID" {{ $subscription->payment_status == 'UNPAID' ? 'selected' : '' }}>Unpaid</option>
                                <option value="PAID" {{ $subscription->payment_status == 'PAID' ? 'selected' : '' }}>Paid</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Subscribe Status <span class="note">*</span></label>
                            <select class="form-control" name="status">
                                <option {{ $subscription->status == 'ACTIVE' ? 'selected' : '' }} value="ACTIVE">Active</option>
                                <option {{ $subscription->status == 'EXPIRED' ? 'selected' : '' }} value="EXPIRED">Expired</option>
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
@extends('admin.template.master')

@section('title')
Report Monthly Income
@endsection

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Monthly Income</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Report</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('report_monthly_income') }}">Report Monthly Income</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row"> 
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="form-group">
                            <select name="year" class="form-control select2 select-year" required>
                                <option value="">-- Select Year --</option>
                                @foreach($years as $i => $year)
                                    <option value="{{  $year->year }}">{{ $year->year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="month" class="form-control select2 select-month" required>
                                <option value="">-- Select Month --</option>
                                @foreach($months as $i => $month)
                                    <option value="{{  $i + 1 }}">{{ $month }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label>Date From</label>
                            <input type="text" id="date-from" name="date_from" class="form-control datepicker" autocomplete="off" placeholder="Date From">
                        </div>
                        <div class="form-group">
                            <label>Date To</label>
                            <input type="text" id="date-to" name="date_to" class="form-control datepicker" autocomplete="off" placeholder="Date To">
                        </div>   
                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-search-profit form-control">Search</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="profit-report-detail">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h5>Monthly Income</h5>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <strong>Income</strong>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-danger total-income">$ 0.00</strong>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <table class="table table-sm">
                                        <thead>
                                            <th>Subscribe Pakage</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                        </thead>
                                        <tbody class="package-detail"> 

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Net Income</strong>
                                </div>
                
                                <div class="col-md-6 text-right">
                                    <strong class="text-danger net-income">$ 0.00</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection



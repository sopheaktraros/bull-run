@extends('admin.template.master')

@section('title')
Report Subscriber History
@endsection

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Report Subscriber History</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Report</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('report_subscriber.history',$id) }}">Report Subscriber History</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row"> 
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form id="frm-report-subscriber-history" action="" style="width:100%">
                            <table width="100%">
                                <tr>
                                    <td style="font-weight: bold;">From</td>
                                    <td style="font-weight: bold;">To</td>
                                </tr>

                                <tr>
                                    <td class="td"><input type="text" id="from_date" name="from_date" class="form-control datepicker" autocomplete="off" placeholder="From Date"></td>
                                    <td class="td"><input type="text" id="to_date" name="to_date" class="form-control datepicker" autocomplete="off" placeholder="To Date"></td>
                                    
                                    <td class="td">
                                        <button class="btn btn-danger waves-effect" id="btn_search">Search</button>
                                        
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="report-subscriber-history-table" data-id="{{ $id }}" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Subscriber</th>
                                        <th>Package</th>
                                        <th>Price</th>
                                        <th>Subscribe Date</th>
                                        <th>Due Date</th>
                                        <th>Payment Status</th>
                                        <th>Subscribe Status</th>
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


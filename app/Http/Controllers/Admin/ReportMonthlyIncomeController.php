<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Package;
use DB;

class ReportMonthlyIncomeController extends Controller
{
  
    public function index(){
        // $months = collect(['January', 'February', 'March', 'April',
        //     'May', 'June', 'July', 'August', 'September', 'October',
        //     'November', 'December'
        // ]);      
    
        // $years = DB::table('subscriber_transaction')
        //      ->select(DB::raw('YEAR(created_at) year'))
        //      ->groupBy('year')
        //      ->get();
    
        return view('admin.report.report_monthly_income.index');
    }


    public function getData(){

        $income = Subscription::where(function ($q) {
            if (request()->date_from && request()->date_to) {
                $q->whereDate('created_at', '>=', date('Y-m-d', strtotime(request()->date_from)));
                $q->whereDate('created_at', '<=', date('Y-m-d', strtotime(request()->date_to)));
            } elseif (request()->date_from) {
                $q->whereDate('created_at', '>=', date('Y-m-d', strtotime(request()->date_from)));
            } elseif (request()->date_to) {
                $q->whereDate('created_at', '<=', date('Y-m-d', strtotime(request()->date_to)));
            }
        })->sum('price');

        $packages = Subscription::where(function ($q) {
            if (request()->date_from && request()->date_to) {
                $q->whereDate('created_at', '>=', date('Y-m-d', strtotime(request()->date_from)));
                $q->whereDate('created_at', '<=', date('Y-m-d', strtotime(request()->date_to)));
            } elseif (request()->date_from) {
                $q->whereDate('created_at', '>=', date('Y-m-d', strtotime(request()->date_from)));
            } elseif (request()->date_to) {
                $q->whereDate('created_at', '<=', date('Y-m-d', strtotime(request()->date_to)));
            }
        })->with('package')->select(DB::raw('count(package_id) as total_qty, package_id'))->get();

        return [
            'income' => number_format($income, 2),
            'packages' => $packages,
        ];
    }
}

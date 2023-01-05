<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class MonthlyReportController extends Controller
{
    public function index(){
        $export = DB::table('detail_order')
            ->join('order','order.id','=','detail_order.order_id')
            ->join('status_order','status_order.id','=','order.status_order_id')
            ->join('users','users.id','=','order.user_id')
            ->join('products','products.id','=','detail_order.product_id')
            ->select('order.*','status_order.name as order_name','users.name as nama_pemesan','products.name as nama_product')
            ->whereMonth('order.created_at','=',date('m'))
            ->where('status_order.id',5)
            ->get();
        $export = array(
        'exp' => $export
        );

        return view('admin.report.index',$export);
    }

    public function exportPDF()
    {
        set_time_limit(300);
    	$export = DB::table('detail_order')
            ->join('order','order.id','=','detail_order.order_id')
            ->join('status_order','status_order.id','=','order.status_order_id')
            ->join('users','users.id','=','order.user_id')
            ->join('products','products.id','=','detail_order.product_id')
            ->select('order.*','status_order.name as order_name','users.name as nama_pemesan','products.name as nama_product')
            ->whereMonth('order.created_at','=',date('m'))
            ->where('status_order.id',5)
            ->get();
        $export = array(
        'exp' => $export
        );
        
 
    	
        $pdf = \PDF::loadView('admin.report.export',$export);
    	return $pdf->stream();  
    }
}

<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Detailorder;
use App\Keranjang;
use App\Product;
use App\Rekening;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Dotenv\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{

    public function index()
    {
        //menampilkan semua data pesanan
        $user_id = \Auth::user()->id;

        $order = DB::table('order')
                    ->join('status_order','status_order.id','=','order.status_order_id')
                    ->select('order.*','status_order.name')
                    ->where('order.status_order_id',1)
                    ->where('order.user_id',$user_id)->get();
        $dicek = DB::table('order')
                    ->join('status_order','status_order.id','=','order.status_order_id')
                    ->select('order.*','status_order.name')
                    ->where('order.status_order_id','!=',1)
                    ->Where('order.status_order_id','!=',5)
                    ->Where('order.status_order_id','!=',6)
                    ->where('order.user_id',$user_id)->get();
        $histori = DB::table('order')
        ->join('status_order','status_order.id','=','order.status_order_id')
        ->select('order.*','status_order.name')
        ->where('order.status_order_id','!=',1)
        ->Where('order.status_order_id','!=',2)
        ->Where('order.status_order_id','!=',3)
        ->Where('order.status_order_id','!=',4)
        ->where('order.user_id',$user_id)->get();
        $data = array(
            'order' => $order,
            'dicek' => $dicek,
            'histori'=> $histori
        );
        return view('user.order.order',$data);
    }

    public function detail($id)
    {
        //function menampilkan detail order
        $detail_order = DB::table('detail_order')
        ->join('products','products.id','=','detail_order.product_id')
        ->join('order','order.id','=','detail_order.order_id')
        ->select('products.name as nama_produk','products.image','detail_order.*','products.price','order.*')
        ->where('detail_order.order_id',$id)
        ->get();
        $order = DB::table('order')
        ->join('users','users.id','=','order.user_id')
        ->join('status_order','status_order.id','=','order.status_order_id')
        ->select('order.*','users.name as nama_pelanggan','status_order.name as status')
        ->where('order.id',$id)
        ->first();
        $data = array(
        'detail' => $detail_order,
        'order'  => $order
        );
        return view('user.order.detail',$data);
    }

    public function sukses(Request $request)
    {
        $id_user = \Auth::user()->id;

        $order = DB::table('order')
                            ->select('subtotal as subtotal','diff_date as diffMonth','order.*')
                            ->where('user_id','=',$id_user)
                            ->orderByDesc('id')
                            ->first();               

        //menampilkan view terimakasih jika order berhasil dibuat
        $data = [
            'order' => $order
        ];
        return view('user.terimakasih',$data);
    }

    public function suksesCOD(Request $request)
    {
        $id_user = \Auth::user()->id;

        $order = DB::table('order')
                            ->select('subtotal as subtotal','diff_date as diffMonth','order.*')
                            ->where('user_id','=',$id_user)
                            ->orderByDesc('id')
                            ->first();               

        //menampilkan view terimakasih jika order berhasil dibuat
        $data = [
            'order' => $order
        ];
        return view('user.terimakasihCOD',$data);
    }

    public function kirimbukti($id,Request $request)
    {
        //mengupload bukti pembayaran
        $order = Order::findOrFail($id);
        if($request->file('bukti_pembayaran')){
            $file = $request->file('bukti_pembayaran')->store('buktibayar','public');

            $order->bukti_pembayaran = $file;
            $order->status_order_id  = 2;

            $order->save();

        }
        return redirect()->route('user.order');
    }
    
    public function pembayaran($id)
    {
        //menampilkan view pembayaran
        $data = array(
            'rekening' => Rekening::all(),
            'order' => Order::findOrFail($id)
        );
        return view('user.order.pembayaran',$data);
    }

    public function pesananditerima($id)
    {
        //function untuk menerima pesanan
        $order = Order::findOrFail($id);
        $order->status_order_id = 5;
        $order->save();

        return redirect()->route('user.order');

    }

    public function pesanandibatalkan($id)
    {
        //function untuk membatalkan pesanan
        $order = Order::findOrFail($id);
        $order->status_order_id = 6;
        $order->save();

        return redirect()->route('user.order');

    }

    public function simpan(Request $request)
    {
        //untuk menyimpan pesanan ke table order
        $cek_invoice = DB::table('order')->where('invoice',$request->invoice)->count();
        $id_user = \Auth::user()->id;
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $from = Carbon::createFromFormat('d-m-Y',$startDate);
        $to = Carbon::createFromFormat('d-m-Y',$endDate);
        $diffMonth = $from->diffInMonths($to);
        $subtotal = $request->subtotal;
        $total = $subtotal * $diffMonth;

        $minusProd = DB::table('keranjang')
                            ->join('users','users.id','=','keranjang.user_id')
                            ->join('products','products.id','=','keranjang.products_id')
                            ->where('keranjang.user_id','=',$id_user)
                            ->value('products.stok');
        if($minusProd<1){

            Alert::error('Maaf','Kamar yang anda pesan habis!');

            return redirect()
                    ->home();
        }else{
            if($cek_invoice < 1){
                $userid = \Auth::user()->id;
                if($request->metode_pembayaran == 'Bayar Ditempat'){
                    Order::create([
                        'invoice' => $request->invoice,
                        'user_id' => $userid,
                        'subtotal'=> $total,
                        'start_date'=> $request->start_date,
                        'end_date'=> $request->end_date,
                        'diff_date' => $diffMonth,
                        'status_order_id' => 2,
                        'metode_pembayaran' => $request->metode_pembayaran,
                        'pesan' => $request->pesan
                    ]);
                }else{
                    Order::create([
                        'invoice' => $request->invoice,
                        'user_id' => $userid,
                        'subtotal'=> $total,
                        'start_date'=> $request->start_date,
                        'end_date'=> $request->end_date,
                        'diff_date' => $diffMonth,
                        'status_order_id' => 1,
                        'metode_pembayaran' => $request->metode_pembayaran,
                        'pesan' => $request->pesan
                    ]);
                }
                
    
            $order = DB::table('order')->where('invoice',$request->invoice)->first();
            
            
            $minusProd = $minusProd - 1;
            Keranjang::join('users','users.id','=','keranjang.user_id')
            ->join('products','products.id','=','keranjang.products_id')
            ->where('keranjang.user_id','=',$id_user)
            ->update(['products.stok' => $minusProd]);
            
            $barang = DB::table('keranjang')->where('user_id',$userid)->get();
            //lalu masukan barang2 yang dibeli ke table detail order
            foreach($barang as $brg){
                Detailorder::create([
                    'order_id' => $order->id,
                    'product_id' => $brg->products_id
                ]);
            }
            //lalu hapus data produk pada keranjang pembeli
            DB::table('keranjang')->where('user_id',$userid)->delete();
    
            $pembayaran = $request->metode_pembayaran;
            if($pembayaran == 'Bayar Ditempat'){
                return redirect()->route('user.order.suksesCOD');
            }else{
                return redirect()->route('user.order.sukses');
            }
            return redirect()->route('user.order.sukses');
            }else{
                return redirect()->route('user.keranjang');
            }
        }
        
        // dd($request);

    }

}

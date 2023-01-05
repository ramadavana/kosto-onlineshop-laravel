<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Categories;
use Illuminate\Support\Facades\DB;
class ProdukController extends Controller
{
    public function index()
    {
        $data = array(
            'produks' => Product::paginate(10)
        );
        return view('user.produk',$data);
    }
    public function detail($id)
    {
        //mengambil detail produk
        $data = array(
            'produk' => Product::findOrFail($id)
        );
        return view('user.produkdetail',$data);
    }

    

    public function cari(Request $request)
    {
        //mencari produk yang dicari user
        $prod  = Product::where('name','like','%' . $request->cari. '%')->paginate(9);
        $total = Product::where('name','like','%' . $request->cari. '%')->count(); 
        $data  = array(
            'produks' => $prod,
            'cari' => $request->cari,
            'total' => $total
        );
        return view('user.cariproduk',$data);

    }
}

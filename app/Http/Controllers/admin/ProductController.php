<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Categories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index()
    {
        //membawa data produk yang di join dengan table kategori
        $products = DB::table('products')
                    ->select('products.*')
                    ->get();
        $data = array(
            'products' => $products
        );
        return view('admin.product.index',$data);
    }

    public function tambah()
    {
        //menampilkan form tambah kategori

        $data = array(
            'products' => Product::all(),
        );
        return view('admin.product.tambah',$data);
    }

    public function store(Request $request)
    {
        //menyimpan produk ke database
        if($request->file('image')){
            //simpan foto produk yang di upload ke direkteri public/storage/imageproduct
            $file = $request->file('image')->store('imageproduct','public');
            
            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stok' => $request->stok,
                'image'          => $file

            ]);

            return redirect()->route('admin.product');
        }
    }

    public function edit($id)
    {
        //menampilkan form edit
        //dan mengambil data produk sesuai id dari parameter
        $data = array(
            'product' => Product::findOrFail($id)
        );
        return view('admin.product.edit',$data);
    }

    public function update($id,Request $request)
    {
        //ambil data dulu sesuai parameter $Id
        $prod = Product::findOrFail($id);

        // Lalu update data nya ke database
        if( $request->file('image')){
            
            Storage::delete('public/'.$prod->image);
            $file = $request->file('image')->store('imageproduct','public');
            $prod->image = $file;
        }

        $prod->name = $request->name;
        $prod->description = $request->description;
        $prod->price = $request->price;
        $prod->stok = $request->stok;
        
        
        $prod->save();

        return redirect()->route('admin.product')->with('status','Berhasil Mengubah Kategori');
    }

    public function delete($id)
    {
        //mengahapus produk
        $prod = Product::findOrFail($id);
        Product::destroy($id);
        Storage::delete('public/'.$prod->image);
        return redirect()->route('admin.product');
    }
}

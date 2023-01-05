@extends('user.app')
@section('content')
<div class="site-section">
    <div class="container">
    <div class="row mb-5">
        <form class="col-md-12" method="post" action="{{ route('user.keranjang.update') }}">
        @csrf
            <table class="table table-bordered">
            <thead>
                <tr>
                <th class="product-thumbnail">Gambar</th>
                <th class="product-name">Kost</th>
                <th class="product-price">Harga Perbulan</th>
                <th class="product-remove">Hapus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                <?php $subtotal=0; foreach($keranjangs as $keranjang): ?>
                <td class="product-thumbnail">
                    <img src="{{ asset('storage/'.$keranjang->image) }}" alt="Image" class="img-fluid" width="150">
                </td>
                <td class="product-name">
                    <h2 class="h5 text-black">{{ $keranjang->nama_produk }}</h2>
                </td>
                <td>Rp. {{ number_format($keranjang->price) }} </td>
                <?php
                    $total = $keranjang->price;
                    $subtotal = $subtotal + $total;
                ?>
                <td><a href="{{ route('user.keranjang.delete',['id' => $keranjang->id]) }}" class="btn btn-primary btn-sm">X</a></td>
                </tr>
                <?php endforeach;?>
            </tbody>
            </table>
        
    </div>

    <div class="row">
        <div class="col-md-6">
        <div class="row mb-5">
            </form>       
        </div>
        </div>
        <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
            <div class="col-md-7">
            <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                <h3 class="text-black h4 text-uppercase">Total Harga</h3>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">
                <strong class="text-black">Rp. {{ number_format($subtotal) }}</strong>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                <a href="{{ route('user.checkout') }}" class="btn btn-primary btn-lg py-3 btn-block" >Checkout</a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection
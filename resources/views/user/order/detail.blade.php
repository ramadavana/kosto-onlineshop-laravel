@extends('user.app')
@section('content')
<div class="site-section">
    <div class="container">
    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <h2 class="display-5">Detail Pesanan Anda</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">  
                <div class="card-body">
                <div class="row">
                <div class="col-md-8">
                    <table>
                        <tr>
                            <th>No Invoice</th>
                            <td>:</td>
                            <td>{{ $order->invoice }}</td>
                        </tr>
                        <tr>
                            <th>Status Pesanan</th>
                            <td>:</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                        <tr>
                            <th>Metode Pembayaran</th>
                            <td>:</td>
                            <td>
                            @if($order->metode_pembayaran == 'Transfer')
                                Transfer Bank
                            @else
                                Bayar Di Tempat
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Total Pembayaran</th>
                            <td>:</td>
                            <td>Rp. {{ number_format($order->subtotal) }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4 text-right">
                    @if($order->status_order_id == 4)
                    <a href="{{ route('user.order.pesananditerima',['id' => $order->id]) }}" onclik="return confirm('Yakin ingin melanjutkan ?')" class="btn btn-primary">Kunci Sudah Di Terima</a><br>
                    <small>Jika kunci belum diterima harap jangan tekan tombol ini</small>
                    @endif
                </div>
                </div>
                <div class="row mb-3 mt-3">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th class="product-thumbnail">Gambar</th>
                            <th class="product-name">Nama Kamar</th>
                            <th class="product-date">Tanggal Mulai</th>
                            <th class="product-date">Tanggal Selesai</th>
                            <th class="product-quantity" width="20%">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detail as $o)
                            <tr>
                                <td><img src="{{ asset('storage/'.$o->image) }}" alt="" srcset="" width="50"></td>
                                <td>{{ $o->nama_produk }}</td>
                                <td>{{ $o->start_date }}</td>
                                <td>{{ $o->end_date }}</td>
                                <td>Rp. {{number_format($o->subtotal) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    
                </div>
                </div>
            </div>
        </div>
    </div>
    

    </div>
</div>
@endsection
@extends('user.app')
@section('content')
<div class="site-section">
    <div class="container">
    <div class="row">
    <table class="table site-block-order-table mb-5 text-center">
    <h2 class="display-3 text-black mb-3" style="margin-left: 25%">Detail Pemesanan</h2>
                    <thead>
                        <tr>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Waktu Sewa</th>
                            <th>Jumlah Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                      <tr>
                        <td>{{$order->start_date}}</td>
                        <td>{{$order->end_date}}</td>
                        <td>{{$order->diffMonth}} Bulan</td>
                        <td class="text-black font-weight-bold">
                        <strong>Rp. {{ number_format($order->subtotal)}}</strong></td>
                      </tr>
                    </tbody>
                  </table>
        <div class="col-md-12 text-center">
        <span class="icon-check_circle display-3 text-success"></span>
        <h2 class="display-3 text-black">Terimakasih!</h2>
        <p class="lead mb-5">Pesanan Kamu Berhasil Dibuat Dengan No Invoice<br>Harap membayar langsung ke kost dan menunjukkan No Invoice dan kartu identitas (KTP/SIM) saat pengambilan kunci kamar kost.</p>
        <p><a href="{{ route('user.order') }}" class="btn btn-sm btn-primary">Menu Pembayaran</a></p>
        </div>
    </div>
    </div>
</div>
@endsection
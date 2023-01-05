@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Pesanan </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                     
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col">
                      <h4 class="card-title">Detail Pesanan {{ $order->nama_pelanggan }}</h4>
                      </div>
                      <div class="col text-right">
                      <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
                      </div>
                    </div>
                    <hr>
                   <div class="row">
                   <div class="col-md-7">
                    <table>
                        <tr>
                            <td>No Invoice</td>
                            <td>:</td>
                            <td  class="p-2">{{ $order->invoice }}</td>
                        </tr>
                        <tr>
                            <td>Metode Pembayaran</td>
                            <td>:</td>
                            <td  class="p-2">{{ $order->metode_pembayaran }}</td>
                        </tr>
                        <tr>
                            <td>Status Pesanan</td>
                            <td>:</td>
                            <td  class="p-2">{{ $order->status }}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>:</td>
                            <td  class="p-2">Rp. {{ number_format($order->subtotal) }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Penyewaan</td>
                            <td>:</td>
                            <td  class="p-2">{{ $order->start_date }}</td>
                        </tr>
                        @if($order->bukti_pembayaran != null)
                        <tr>
                            <td>Bukti Pembayaran</td>
                            <td>:</td>
                            <td  class="p-2"><img src="{{ asset('storage/'.$order->bukti_pembayaran) }}" alt="" srcset="" class="img-fluid" width="300"></td>
                        </tr>
                        @if($order->status_order_id == 2)
                        <tr>
                            <td></td>
                            <td></td>
                            <td  class="p-2"><a href="{{ route('admin.transaksi.konfirmasi',['id' => $order->id]) }}" onclick="return confirm('Yakin ingin mengonfirmasi pesanan ini?')" class="btn btn-primary mt-1">Konfirmasi Telah Bayar</a><br>
                            <small>Klik tombol ini jika pembeli sudah terbukti melakukan pembayaran</small>
                            </td>
                        </tr>
                        @endif
                        @endif
                        @if($order->bukti_pembayaran == null)
                        <tr>
                            <td>Konfirmasi pembayaran COD oleh admin</td>
                        </tr>
                        @if($order->status_order_id == 2)
                        <tr>
                            <td></td>
                            <td></td>
                            <td  class="p-2"><a href="{{ route('admin.transaksi.konfirmasi',['id' => $order->id]) }}" onclick="return confirm('Yakin ingin mengonfirmasi pesanan ini?')" class="btn btn-primary mt-1">Konfirmasi Telah Bayar</a><br>
                            <small>Klik tombol ini jika pembeli sudah terbukti melakukan pembayaran</small>
                            </td>
                        </tr>
                        @endif
                        @endif
                        @if($order->status_order_id == 3)
                        <tr>
                            <td>Konfirmasi Pengambilan Kunci</td>
                            <td>:</td>
                            <td  class="p-2">
                            <form action="{{ route('admin.transaksi.inputresi',['id' => $order->id]) }}" method="POST">
                                @csrf
                            <div class="form-group">
                            <div class="input-group" style="margin-left: 10%; margin-top: 10%;">
                                <input class="form-check-input" type="checkbox" value="yes" id="konfirmasi" name="konfirmasi" required>
                                <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-primary" type="button">Simpan</button>
                                </div>
                            </div>
                            </div>
                            </form>
                            </td>
                        </tr>
                        @endif
                    </table>
                    </div>
                    <div class="col-md-5">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hovered" >
                        <thead class="bg-primary text-white">
                          <tr>
                            <th width="5%">No</th>
                            <th>Nama Produk</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Total Harga</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;?>
                            @foreach($detail as $dt)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $dt->nama_produk }}</td>
                                <td>{{ $dt->start_date }}</td>
                                <td>{{ $dt->end_date }}</td>
                                <td>{{ $dt->price }}</td>
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
          </div>
          
@endsection

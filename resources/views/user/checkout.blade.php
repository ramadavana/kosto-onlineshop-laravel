@extends('user.app')
@section('content')
<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Pesanan Kamu</h2>
                <div class="p-3 p-lg-5 border">
                  <form action="{{ route('user.order.simpan') }}" method="POST">
                    @csrf
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Kos</th>
                      <th>Harga</th>
                    </thead>
                    <tbody>
                      <?php $subtotal=0;?>
                      @foreach($keranjangs as $keranjang)
                      <tr>
                        <?php
                          $total = $keranjang->price;
                          $subtotal = $subtotal + $total;
                      ?>
                        <td>{{$keranjang->nama_produk}}</td>
                      </tr>
                      @endforeach
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Harga Perbulan</strong></td>
                        <td class="text-black font-weight-bold">
                        <?php $alltotal = $subtotal; ?>  
                        <strong>Rp. {{ number_format($alltotal) }}</strong></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="form-group">
                    <label>Tanggal Awal</label>
                    <div class='input-group date'>
                        <input type="text" name="start_date" id="start_date" placeholder="Tanggal Awal" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Akhir</label>
                    <div class='input-group date'>
                        <input type="text" name="end_date" id="end_date" placeholder="Tanggal Akhir" class="form-control">
                    </div>
                  </div>
                  <input type="hidden" name="invoice" value="{{ $invoice }}">
                  <input type="hidden" name="subtotal" value="{{ $alltotal }}">
                  <div class="form-group">
                  <label for="">Pilih Metode Pembayaran</label>
                    <select name="metode_pembayaran" id="" class="form-control">
                      <option value="Transfer">Transfer</option>
                      <option value="Bayar Ditempat">Bayar Di tempat</option>
                    </select>
                  </div>
                 

                  <div class="form-group">
                    <button class="btn btn-primary btn-lg py-3 btn-block" type="submit">Pesan Sekarang</button>
                  </div>
                </form>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function() {     
      
      $('#start_date').datepicker(
     { 
        minDate: 0,
        format: 'dd-mm-yyyy',
        autoclose: true,

        beforeShow: function() {
        $(this).datepicker('option', 'maxDate', $('#end_date').val());
      }
   });
  $('#end_date').datepicker(
     {
        defaultDate: "+1w",
        format: 'dd-mm-yyyy',
        autoclose: true,
        beforeShow: function() {
        $(this).datepicker('option', 'minDate', $('#start_date').val());
        if ($('#start_date').val() === '') $(this).datepicker('option', 'minDate', 0);                             
     }
   });

    });
  </script>
@endsection

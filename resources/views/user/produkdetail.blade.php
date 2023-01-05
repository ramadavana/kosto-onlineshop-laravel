@extends('user.app')
@section('content')
<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-md-6">
        <img src="{{ asset('storage/'.$produk->image) }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6">
        <h2 class="text-black">{{ $produk->name }}</h2>
        <p>
            {{ $produk->description }}
        </p>
        <p><strong class="text-primary h4">RP. {{number_format ($produk->price) }}</strong></p>
        <div class="mb-5">
            <form action="{{ route('user.keranjang.simpan') }}" method="post">
                @csrf
                @if(Route::has('login'))
                    @auth
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endauth
                @endif
            <input type="hidden" name="products_id" value="{{ $produk->id }}">
            <small>Sisa Kamar {{ $produk->stok }}</small>
            <input type="hidden" value="{{ $produk->stok }}" id="sisastok">
        </div>
        <p><button type="submit" class="buy-now btn btn-sm btn-primary">Masukkan keranjang</button></p>
        </form>
        </div>
    </div>
    </div>
</div>
@endsection
@extends('admin.layout.app')
@section('content')
<div class="container">
		<center>
			<h4>CETAK LAPORAN</h4>
		</center>
		<br/>
		<a href="/admin/exportPDF" target="_blank" class="btn btn-primary" target="_blank">CETAK PDF</a>
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>Invoice</th>
					<th>Nama Pemesan</th>
					<th>Status Order</th>
					<th>Nama Kos</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
					<th>Lama Menempati</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($exp as $e)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{$e->invoice}}</td>
					<td>{{$e->nama_pemesan}}</td>
					<td>{{$e->order_name}}</td>
					<td>{{$e->nama_product}}</td>
                    <td>{{$e->start_date}}</td>
                    <td>{{$e->end_date}}</td>
					<td>{{$e->diff_date}}</td>
					<td>{{number_format($e->subtotal)}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
 
	</div>

@endsection
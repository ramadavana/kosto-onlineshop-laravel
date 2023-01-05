<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 8pt;
			margin-right: 5%;
		}
	</style>
<div class="container">
		<center>
			<h4>Data Penghasilan Bulan {{ date('F') }}</h4>
		</center>
		<br/>
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
				@php $tot=0 @endphp
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
					{{$tot = $tot + $e->subtotal}}
				</tr>
				
				@endforeach
			</tbody>
		</table>
		<h4>Total Pemasukan per Bulan : {{number_format($tot)}}</h4>
		
		
	</div>

	</body>
</html>
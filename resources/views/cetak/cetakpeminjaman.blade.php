<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
		<h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">Peminjaman</a></h5>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Anggota</th>
				<th>Buku</th>
                <th>Pegawai</th>
                <th>Tanggal Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Status</th>

			</tr>
		</thead>
		<tbody>
			
			@foreach($peminjaman as $d)
			<tr>
				<td>{{$d->anggotas->nama}}</td>
				<td>{{$d->bukus->judul}}</td>
				<td>{{$d->pegawais->nama}}</td>
				<td>{{$d->tanggal_pinjam}}</td>
                <td>{{$d->jatuh_tempo}}</td>
                <td>{{$d->status}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
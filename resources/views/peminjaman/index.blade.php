@extends('layout.index')
@section('content')
    <div class="main">
    <div class= "main-content">
    <div class= "container-fluid">
    <div class ="row">
    <div class ="col-md-12">
    <div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Peminjaman</h3>
				</div>
				<div class="panel-body">
<table class = "table table-striped ">
    <tr>
        <th>Anggota</th>
        <th>Buku</th>
        <th>Pegawai</th>
        <th>Tanggal Pinjam</th>
        <th>Jatuh Tempo</th>
        <th>Status</th>
        <th>Aksi</th>

    </tr>
    </thead>
    @foreach ($datas as $data)
    <tr>
        <td>{{ ! empty($data->anggota->namaa) ? $data->anggota->namaa : '-' }}</td>
        <td>{{ ! empty($data->buku->judul) ? $data->buku->judul : '-' }}</td>
        <td>{{ ! empty($data->pegawai->nama) ? $data->pegawai->nama : '-' }}</td>
        <td>{{$data->tanggal_pinjam}}</td>
        <td>{{$data->jatuh_tempo}}</td>
        <td>
          @if($data->status == "dipinjam")
          <h5> <span class="badge badge-success">dipinjam</span> </h5>
          @else
          <h5> <span class="badge badge-warning">kembali</span> </h5>
          @endif
        </td>
        <td><a class="btn btn-success btn-sm" href="{{ url('peminjaman/'.$data->id)}}">Detail</a>
        <a class="btn btn-danger btn-sm" href="{{ url('peminjaman/'.$data->id. '/delete')}}">Delete</a></td>
    </tr>
@endforeach
</table>
<a href="peminjaman/create" role="button" class="btn btn-primary btn-block">Tambah Peminjaman</a>
<!-- <a href="cetak/cetakpeminjaman" role="button" class="btn btn-primary btn-block">Cetak PDF</a> -->
@endsection
</div>
</div>
</div>

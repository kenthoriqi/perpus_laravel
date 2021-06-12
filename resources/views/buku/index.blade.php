@extends('layout.index')
@section('content')
    <div class="main">
    <div class= "main-content">
    <div class= "container-fluid">
    <div class ="row">
    <div class ="col-md-12">
    <div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Buku</h3>
				</div>
				<div class="panel-body">
<table class = "table table-striped ">
    <tr>
        <th>Kategori</th>
        <th>Kode Buku</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Tahun</th>
        <th>Jumlah</th>
        <th>Aksi</th>

    </tr>
    </thead>
    @foreach ($datas as $data)
    <tr>
        <td>{{ ! empty($data->kategori->nama_kategori) ? $data->kategori->nama_kategori : '-' }}</td>
        <td>{{$data->kode_buku}}</td>
        <td>{{$data->judul}}</td>
        <td>{{$data->pengarang}}</td>
        <td>{{$data->penerbit}}</td>
        <td>{{$data->tahun}}</td>
        <td>{{$data->jumlah}}</td>
        <td><a class="btn btn-success btn-sm" href="{{ url('buku/'.$data->id)}}">Detail</a>
        <a class="btn btn-warning btn-sm" href="{{ url('buku/'.$data->id. '/edit')}}">Edit</a>
        <a class="btn btn-danger btn-sm" href="{{ url('buku/'.$data->id. '/delete')}}">Delete</a></td>
    </tr>
@endforeach
</table>
<a href="buku/create" role="button" class="btn btn-primary btn-block">Tambah Buku</a>
@endsection
</div>
</div>
</div>

@extends('layout.index')
@section('content')
    <div class="main">
    <div class= "main-content">
    <div class= "container-fluid">
    <div class ="row">
    <div class ="col-md-12">
    <div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Pegawai</h3>
				</div>
				<div class="panel-body">
<table class = "table table-striped ">
    <tr>
        <th>Nama</th>
        <th>Gender</th>
        <th>No HP</th>
        <th>Alamat</th>
        <th>Aksi</th>
        
    </tr>
    </thead>
    @foreach ($datas as $data)
    <tr>
        <td>{{$data->nama}}</td>
        <td>{{$data->jenis_kelamin}}</td>
        <td>{{$data->no_hp}}</td>
        <td>{{$data->alamat}}</td>
        <td><a class="btn btn-success btn-sm" href="{{ url('pegawai/'.$data->id)}}">Detail</a>
        <a class="btn btn-warning btn-sm" href="{{ url('pegawai/'.$data->id. '/edit')}}">Edit</a>
        <a class="btn btn-danger btn-sm" href="{{ url('pegawai/'.$data->id. '/delete')}}">Delete</a></td>
    </tr>
    @endforeach
</table>
<a href="pegawai/create" role="button" class="btn btn-primary btn-block">Tambah Pegawai</a>
<a href="cetak/cetakpegawai" role="button" class="btn btn-primary btn-block">Cetak PDF</a>
</div>
</div>
</div>
</div>
</div>
@endsection

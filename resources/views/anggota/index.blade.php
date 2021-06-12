@extends('layout.index')
@section('content')
    <div class="main">
    <div class= "main-content">
    <div class= "container-fluid">
    <div class ="row">
    <div class ="col-md-12">
    <div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Anggota</h3>
				</div>
				<div class="panel-body">
<table class = "table table-striped ">
    <tr>
        <th>Nama</th>
        <th>NISN</th>
        <th>Kelas</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Gender</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Aksi</th>

    </tr>
    </thead>
    @foreach ($datas as $data)
    <tr>
        <td>{{$data->namaa}}</td>
        <td>{{$data->nisn}}</td>
        <td>{{$data->kelas}}</td>
        <td>{{$data->tempat_lahir}}</td>
        <td>{{$data->tanggal_lahir}}</td>
        <td>{{$data->jenis_kelamin}}</td>
        <td>{{$data->alamat}}</td>
        <td>{{$data->no_hp}}</td>
        <td><a class="btn btn-success btn-sm" href="{{ url('anggota/'.$data->id)}}">Detail</a>
        <a class="btn btn-warning btn-sm" href="{{ url('anggota/'.$data->id. '/edit')}}">Edit</a>
        <a class="btn btn-danger btn-sm" href="{{ url('anggota/'.$data->id. '/delete')}}">Delete</a></td>
    </tr>
@endforeach
</table>
<a href="anggota/create" role="button" class="btn btn-primary btn-block">Tambah Anggota</a>
<!-- <a href="{{url('../anggota/cetakpdf')}}" class="btn btn-secondary" target="_blank">Cetak PDF</a> -->
@endsection
</div>
</div>
</div>

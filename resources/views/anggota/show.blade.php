@extends('layout.index')
@section('content')
<div class="main">
    <div class= "main-content">
    <div class= "container-fluid">
    <div class ="row">
    <div class ="col-md-12">
<div id="anggota">
    <h2>Detail Anggota</h2>

    <table class="table tabel-striped">
    <tr>
        <th>Foto</th>
            <td><img src="{{asset('images/'.$data->ava)}}" class="rounded-circle" style= "width:200px" alt="ava" ></td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $data->namaa }}</td>
        </tr>
        <tr>
            <th>NISN</th>
            <td>{{ $data->nisn }}</td>
        </tr>
        <tr>
            <th>Kelas</th>
            <td>{{ $data->kelas}}</td>
        </tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>{{ $data->tempat_lahir}}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $data->tanggal_lahir}}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $data->jenis_kelamin}}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $data->alamat}}</td>
        </tr>
        <tr>
            <th>No HP</th>
            <td>{{ $data->no_hp}}</td>
        </tr>
      


    </table>
</div>
@endsection

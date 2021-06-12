@extends('layout.index')
@section('content')
<div class="main">
    <div class= "main-content">
    <div class= "container-fluid">
    <div class ="row">
    <div class ="col-md-12">
<div id="pegawai">
    <h2>Detail Pengawai</h2>

    <table class="table tabel-striped">
    <tr>
        <th>Foto</th>
            <td><img src="{{asset('images/'.$data->ava)}}" class="rounded-circle" style= "width:200px" alt="ava" ></td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $data->nama }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $data->jenis_kelamin}}</td>
        </tr>
        <tr>
            <th>No HP</th>
            <td>{{ $data->no_hp}}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $data->alamat}}</td>
        </tr>
    </table>
</div>
@endsection

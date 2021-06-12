@extends('layout.index')
@section('content')
<div class="main">
    <div class= "main-content">
    <div class= "container-fluid">
    <div class ="row">
    <div class ="col-md-12">
<div id="buku">
    <h2>Detail Buku</h2>

    <table class="table tabel-striped">
    <tr>
        <th>Foto</th>
            <td><img src="{{asset('images/'.$data->ava)}}" class="rounded-circle" style= "width:200px" alt="ava" ></td>
        </tr>
        <th>Kategori</th>
            <td>{{ ! empty($data->kategori->nama_kategori) ? $data->kategori->nama_kategori : '-' }}</td>
        </tr>
        <tr>
            <th>Kode Buku</th>
            <td>{{ $data->kode_buku}}</td>
        </tr>
        <tr>
            <th>Judul</th>
            <td>{{ $data->judul }}</td>
        </tr>
        <tr>
            <th>Pengarang</th>
            <td>{{ $data->pengarang}}</td>
        </tr>
        <tr>
            <th>Penerbit</th>
            <td>{{ $data->penerbit}}</td>
        </tr>
        <tr>
            <th>Tahun</th>
            <td>{{ $data->tahun}}</td>
        </tr>
        <tr>
            <th>Jumlah</th>
            <td>{{ $data->jumlah}}</td>
        </tr>
    </table>
</div>
@endsection

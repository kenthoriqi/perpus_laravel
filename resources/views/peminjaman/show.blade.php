@extends('layout.index')
@section('content')
<div class="main">
    <div class= "main-content">
    <div class= "container-fluid">
    <div class ="row">
    <div class ="col-md-12">
<div id="peminjaman">
    <h2>Detail Peminjaman</h2>

    <table class="table tabel-striped">
        <tr>
            <th>Nama Anggota</th>
            <td>{{ ! empty($data->anggota->namaa) ? $data->anggota->namaa : '-' }}</td>
        </tr>
        <tr>
            <th>Judul Buku</th>
            <td>{{ ! empty($data->buku->judul) ? $data->buku->judul : '-' }}</td>
        </tr>
        <tr>
            <th>Nama Pegawai</th>
            <td>{{ ! empty($data->pegawai->nama) ? $data->pegawai->nama : '-' }}</td>
        </tr>
        <tr>
            <th>Tanggal Pinjam</th>
            <td>{{ $data->tanggal_pinjam}}</td>
        </tr>
        <tr>
            <th>Jatuh Tempo</th>
            <td>{{ $data->jatuh_tempo}}</td>
        </tr>
        <tr>
            <th>Tanggal Kembali</th>
            <td>{{ $data->tanggal_kembali}}</td>
        </tr>
        <tr>
            <th>Denda</th>
            <td>{{ $data->denda}}</td>
        </tr>
        <a href="{{ url('form-kembalipeminjaman'. $data->id) }}" class="btn btn-info">Form Pengembalian</a>
    </table>
</div>
@endsection

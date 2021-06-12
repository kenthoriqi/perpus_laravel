@extends('layout.index')
@section('content')
<div class="main">
    <div class= "main-content">
    <div class= "container-fluid">
    <div class ="row">
    <div class ="col-md-12">
<div id="peminjaman">
    <h2>Detail Peminjaman</h2>
    </div>
    <form action="{{ url('kembalipeminjaman' .$data->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

      <div class="panel-body">
        <label for="tanggal_kembali" class="control-label">Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" class="form-control">
        <input style="display:none;" type="text" name="status" type="text" value="kembali" clas'form-control'>
       </div>

<button type="submit" class="btn btn-success">SUBMIT</button>
</form>
@endsection

@extends('layout.index')
@section('content')
<div class="main">
    <div class= "main-content">
    <div class= "container-fluid">
    <div class ="row">
    <div class ="col-md-12">
    <h1 class="mt-3">Edit Buku</h1>
        <hr>
    <form action="{{ url('buku/'.$data->id.'/update') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="panel-body">
                <label for="id_kategori" class="control-label">Kategori</label>
                @if(!empty($kategori))
                <select class="form-control" name="id_kategori">
                  @foreach ($kategori as $k)
                  <option value="{{$k->id}}">{{$k->nama_kategori}}</option>
                  @endforeach
                  <?php $variabel ?>
                </select>
              @else
              <p>Tidak ada kategori</p>
              @endif
            </div>
            <div class="panel-body">
                <label for="kode_buku" class="control-label">Kode Buku</label>
                <input name="kode_buku" type="text" class="form-control" value="{{$data->kode_buku}}">
            </div>

            <div class="panel-body">
                <label for="judul" class="control-label">Judul</label>
                <input name="judul" type="text" class="form-control" value="{{$data->judul}}">
            </div>

            <div class="panel-body">
                <label for="pengarang" class="control-label">Pengarang</label>
                <input name="pengarang" type="text"class="form-control" value="{{$data->pengarang}}">
            </div>

            <div class="panel-body">
                <label for="penerbit" class="control-label">Penerbit</label>
                <input name="penerbit" type="text"class="form-control" value="{{$data->penerbit}}">
            </div>

            <div class="panel-body">
                <label for="tahun" class="control-label">Tahun</label>
                <input name="tahun" type="number"class="form-control" value="{{$data->tahun}}">
            </div>

            <div class="panel-body">
                <label for="jumlah" class="control-label">Jumlah</label>
                <input name="jumlah" type="number"class="form-control" value="{{$data->jumlah}}">
            </div>
            
            <div class="panel-body">
            <label for="ava" class="control-label">Upload Foto</label>
            <input name="ava" type="file" class="form-control">
            </div>

<button type="submit" class="btn btn-success">SUBMIT</button>
</form>
@endsection

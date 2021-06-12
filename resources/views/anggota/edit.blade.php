@extends('layout.index')
@section('content')
<div class="main">
    <div class= "main-content">
    <div class= "container-fluid">
    <div class ="row">
    <div class ="col-md-12">
    <h1 class="mt-3">Edit Anggota</h1>
        <hr>
    <form action="{{ url('anggota/'.$data->id.'/update') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="panel-body">
                <label for="namaa" class="control-label">Nama</label>
                <input name="namaa" type="text" class="form-control" value="{{$data->nama}}">
            </div>
            <div class="panel-body">
                <label for="nisn" class="control-label">NISN</label>
                <input name="nisn" type="text" class="form-control" value="{{$data->nisn}}">
            </div>

            <div class="panel-body">
                <label for="tempat_lahir" class="control-label">Tempat Lahir</label>
                <input name="tempat_lahir" type="text" class="form-control" value="{{$data->tempat_lahir}}">
            </div>

            <div class="panel-body">
                <label for="tanggal_lahir" class="control-label">Tanggal Lahir</label>
                <input name="tanggal_lahir" type="text" class="form-control" value="{{$data->tanggal_lahir}}">
            </div>

            <div class="panel-body">
                <label for="alamat" class="control-label">Alamat</label>
                <textarea name="alamat" class="form-control" value="{{$data->alamat}}" rows="4"></textarea>
            </div>

            <div class="panel-body">
                <label for="no_hp" class="control-label">No HP</label>
                <input name="no_hp" type="text"class="form-control" value="{{$data->no_hp}}">
            </div>

            <div class="panel-body">
                <label class="fancy-radio">Kelas
						<input name="kelas" value="X" type="radio">
						<span><i></i>X</span>
					</label>
					<label class="fancy-radio">
						<input name="kelas" value="XI" type="radio">
						<span><i></i>XI</span>
					</label>
                    <label class="fancy-radio">
						<input name="kelas" value="XII" type="radio">
						<span><i></i>XII</span>
					</label>

            <div class="panel-body">
                <label class="fancy-radio">Jenis Kelamin
						<input name="jenis_kelamin" value="pria" type="radio">
						<span><i></i>Pria</span>
					</label>
					<label class="fancy-radio">
						<input name="jenis_kelamin" value="wanita" type="radio">
						<span><i></i>Wanita</span>
					</label>

          <br>
          <div class="panel-body">
            <label for="ava" class="control-label">Upload Foto</label>
            <input name="ava" type="file" class="form-control">
            </div>

<button type="submit" class="btn btn-success">SUBMIT</button>
</form>
@endsection

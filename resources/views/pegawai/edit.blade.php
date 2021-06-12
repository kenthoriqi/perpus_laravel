@extends('layout.index')
@section('content')
<div class="main">
    <div class= "main-content">
    <div class= "container-fluid">
    <div class ="row">
    <div class ="col-md-12">
    <h1 class="mt-3">Edit Pegawai</h1>
        <hr>
    <form action="{{ url('pegawai/'.$data->id.'/update') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="panel-body">
                <label for="nama" class="control-label">Nama</label>
                <input name="nama" type="text" class="form-control" value="{{$data->nama}}">
            </div>

            <div class="panel-body">
                <label for="no_hp" class="control-label">No HP</label>
                <input name="no_hp" type="text"class="form-control" value="{{$data->no_hp}}">
            </div>

            <div class="panel-body">
                <label for="alamat" class="control-label">Alamat</label>
                <textarea name="alamat" class="form-control" value="{{$data->alamat}}" rows="4"></textarea>
            </div>

            <div class="panel-body">
                <label class="fancy-radio">Jenis Kelamin
						<input name="jenis_kelamin" value="pria" type="radio">
						<span><i></i>Pria</span>
					</label>
					<label class="fancy-radio">
						<input name="jenis_kelamin" value="wanita" type="radio">
						<span><i></i>Wanita</span>
					</label>
            </div><br>
            <div class="panel-body">
            <label for="ava" class="control-label">Upload Foto</label>
            <input name="ava" type="file" class="form-control">
            </div>

<button type="submit" class="btn btn-success">SUBMIT</button>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection

@extends('layout.index')
@section('content')
<div class="main">
    <div class= "main-content">
    <div class= "container-fluid">
    <div class ="row">
    <div class ="col-md-12">
    @if (Count($errors) > 0)
    <div class="alert alert-danger">
        <ul class="list-unstyled">
        @foreach($errors->all() as $pesan)
        <li>{{$pesan}}</li>
    </ul>
    </div>
    @endforeach
    @endif
    <form action="{{ url('/peminjaman') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

      <div class="panel-body">
        <label for="id_anggota" class="control-label">Nama Anggota</label>
          @if(!empty($anggota))
          <select class="form-control" name="id_anggota">
              @foreach ($anggota as $a)
              <option value="{{$a->id}}">{{$a->namaa}}</option>
              @endforeach
              <?php $variabel ?>
          </select>
            @else
            <p>Tidak ada anggota</p>
            @endif
       </div>
       <div class="panel-body">
         <label for="id_buku" class="control-label">Judul Buku</label>
           @if(!empty($buku))
           <select class="form-control" name="id_buku">
               @foreach ($buku as $b)
               <option value="{{$b->id}}">{{$b->judul}}</option>
               @endforeach
               <?php $variabel ?>
           </select>
             @else
             <p>Tidak ada buku</p>
             @endif
        </div>
        <div class="panel-body">
          <label for="id_pegawai" class="control-label">Nama Pegawai</label>
            @if(!empty($pegawai))
            <select class="form-control" name="id_pegawai">
                @foreach ($pegawai as $pe)
                <option value="{{$pe->id}}">{{$pe->nama}}</option>
                @endforeach
                <?php $variabel ?>
            </select>
              @else
              <p>Tidak ada pegawai</p>
              @endif
         </div>
         <div class="panel-body">
      <label for="tanggal_pinjam" class="control-label">Tgl Pinjam</label>
      <input type="date" name="tanggal_pinjam" class="form-control">
    </div>

<button type="submit" class="btn btn-success">SUBMIT</button>
</form>
@endsection

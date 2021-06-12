<!DOCTYPE html>
<html>
  <head>
    <title>Laporan PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <style type="text/css">
      table tr td,
      table tr th{
        font-size: 10pt;
      }
    </style>
    <center>
  <h5>Data Anggota</h5>
</center>

<table class="table table-dark">
  <thead>
    <tr>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Gender</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Aksi</th>
    </tr>
    </thead>
    @php $i=1 @endphp
    @foreach ($datas as $data)
    <tr>
        <td>{{$data->namaa}}</td>
        <td>{{$data->kelas}}</td>
        <td>{{$data->tempat_lahir}}</td>
        <td>{{$data->tanggal_lahir}}</td>
        <td>{{$data->jenis_kelamin}}</td>
        <td>{{$data->alamat}}</td>
        <td>{{$data->no_hp}}</td>
    </tr>
@endforeach
  </tbody>
</table>
  </body>
</html>

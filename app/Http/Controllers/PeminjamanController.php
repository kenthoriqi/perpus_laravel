<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Peminjaman;
use App\Buku;
use App\Anggota;
use App\Pegawai;
use Validator;
use Alert;
use DB;
use PDF;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halaman = 'data';
        $datas = Peminjaman::orderBy('id', 'ASC')->paginate();
        return view('peminjaman.index', compact('halaman','datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $halaman = 'data';
        // $data = peminjaman::all();
        $anggota = Anggota::all();
        $buku = Buku::all();
        $pegawai = Pegawai::all();
        return view('peminjaman.create',compact('halaman','anggota', 'buku','pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $datas = peminjaman::create($request->all());
        $time = $request->tanggal_pinjam;
        $timesum = date('Y-m-d', strtotime('+7days', strtotime($time)));
        $datas->jatuh_tempo = $timesum;
        $datas->save();
        $jumlah = Buku::where('id', '=', $request->id_buku)->get();
        foreach ($jumlah as $s) {
          $hasil = $s->jumlah - 1;
          $s->jumlah = $hasil;
          $s->save();
        }
        // $data->id_buku = $request ->id_buku;
        // $data->id_anggota = $request ->id_anggota;
        // $data->id_pegawai = $request ->id_pegawai;
        // $data->tanggal_pinjam = $request ->tanggal_pinjam;
        // $data->tanggal_kembali = $request ->tanggal_kembali;
        return redirect('/peminjaman');
        var_dump($_POST);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Peminjaman::findOrFail($id);
        return view('peminjaman.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Peminjaman::findOrFail($id);
        $data->tanggal_kembali = $request->tanggal_kembali;
        $data->status = $request->status;

        $date1 = strtotime($data->jatuh_tempo);
        $date2 = strtotime($request->tanggal_kembali);

        $diff = floor($date2 - $date1);
        if($diff > 0){
            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $days = floor(($diff - $years * 365*60*60*24 - $months * 30*60*60*24) / (60*60*24));

            $data->denda = $days*1000;
        }
        else{
            $data->denda = 0;
        }

        $jumlah = Buku::where('id', '=', $data->id_buku)->get();
        foreach ($jumlah as $s) {
          $hasil = $s->jumlah + 1;
          $s->jumlah = $hasil;
          $s->save();
        }
        $data->save();
        return redirect('/peminjaman');
    }

    public function form_kembali($id){
      $halaman = 'data';
      $data = Peminjaman::findOrFail($id);
      return view('peminjaman.form-kembali', compact('halaman', 'data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Peminjaman::findOrFail($id);
        $data->delete();
        return redirect('/peminjaman');
    }

    public function jabar(Request $request)
    {
        $pilih= $request->get('pilih');
        $nilai= $request->get('nilai');
        $depend= $request->get('depend');

        $data = DB::table('bukus')
        ->where($pilih,$nilai)
        ->groupBy($depend)
        ->get();

        $hasil ='<option value="">Pilih Kode Buku'.ucfirst($depend).'</option>';
        foreach ($data as $value){
            $hasil ='<option value="'.$value->$depend.'">'.$value->$depend.'</option>';
        }
        echo $hasil;
    }
    public function cetak(){
        $peminjaman = Peminjaman::all();
        $pdf = PDF::loadview('cetak.cetakpeminjaman', ['peminjaman'=>$peminjaman]);
        return $pdf->download('laporan-peminjaman-pdf.pdf');
      }
}

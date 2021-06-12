<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use Validator;
use Alert;
use PDF;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halaman = 'data';
        $datas = Anggota::orderBy('id', 'ASC')->paginate();
        return view('anggota.index', compact('halaman','datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'namaa' => 'required|max:30|',
            'nisn' => 'required|max:30|',
            'kelas' => 'required',
            'tempat_lahir' => 'required|max:30|',
            'tanggal_lahir' => 'required|max:30|',
            'jenis_kelamin' => 'required',
            'alamat' => 'required|max:30|',
            'no_hp' => 'required|max:11|',
            'ava' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect('anggota/create')
                ->withInput()
                ->withErrors($validator->errors());
        }
                $ava = $request->file('ava');
        
		$nama_file = time()."_".$ava->getClientOriginalName();
		$tujuan_upload = 'images';
		$ava->move($tujuan_upload,$nama_file);
        Anggota::create([
            'namaa' => $request->namaa,
            'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'ava' => $nama_file,
        ]);
        return redirect('/anggota');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Anggota::findOrFail($id);
        return view('anggota.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Anggota::findOrFail($id);
        return view('anggota.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Anggota::findOrFail($id);
        $data->update($request->all());
        if($request->hasFile('ava')){
            $request->file('ava')->move('images/',$request->file('ava')->getClientOriginalName());
            $data->ava = $request->file('ava')->getClientOriginalName();
            $data->save();
        }
        $data->save();
        return redirect('/anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Anggota::findOrFail($id);
        $data->delete();
        return redirect('/anggota');
    }
    public function cetak(){
      $data = Anggota::all();
      $pdf = PDF::loadview('anggota.cetakpdf', ['anggota'=>$data]);
      return $pdf->download('laporan-anggota-pdf.pdf');
    }

}

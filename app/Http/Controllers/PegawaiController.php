<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Validator;
use PDF;
use Alert;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halaman = 'data';
        $datas = Pegawai::orderBy('id', 'ASC')->paginate();
        return view('pegawai.index', compact('halaman','datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
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
            'nama' => 'required|max:30|',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required|max:11|',
            'alamat' => 'required|max:30|',
            'ava' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('pegawai/create')
                ->withInput()
                ->withErrors($validator->errors());
        }
                $ava = $request->file('ava');
        
		$nama_file = time()."_".$ava->getClientOriginalName();
		$tujuan_upload = 'images';
		$ava->move($tujuan_upload,$nama_file);
        Pegawai::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'ava' => $nama_file,
        ]);
        return redirect('/pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pegawai::findOrFail($id);
        return view('pegawai.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pegawai::findOrFail($id);

        return view('pegawai.edit', compact('data'));
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
        $data = Pegawai::findOrFail($id);
        $data->update($request->all());
        if($request->hasFile('ava')){
            $request->file('ava')->move('images/',$request->file('ava')->getClientOriginalName());
            $data->ava = $request->file('ava')->getClientOriginalName();
            $data->save();
        }
        $data->save();
        return redirect('/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pegawai::findOrFail($id);
        $data->delete();
        return redirect('/pegawai');
    }
    public function cetak(){
        $pegawai = Pegawai::all();
        $pdf = PDF::loadview('cetak.cetakpegawai', ['pegawai'=>$pegawai]);
        return $pdf->download('laporan-pegawai-pdf.pdf');
      }
}

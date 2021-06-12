<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Kategori;
use Validator;
use Alert;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if($request->has('cari')){
        //     $buku_list = buku::where('judul','LIKE','%'. $request->cari . '%')->get();
        // }else{
        //     $buku_list = buku::all();
        // }

        $halaman = 'data';
        $datas = Buku::orderBy('id', 'ASC')->paginate();
        return view('buku.index', compact('halaman','datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $kategori = kategori::all();
        return view('buku.create', compact('kategori'));
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
            'kode_buku' => 'required|max:7|',
            'id_kategori' => 'required|max:30|',
            'judul' => 'required|max:30|',
            'pengarang' => 'required|max:30|',
            'penerbit' => 'required|max:30|',
            'tahun' => 'required|max:30|',
            'jumlah' => 'required|max:3|',
            'ava' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('buku/create')
                ->withInput()
                ->withErrors($validator->errors());
        }
                $ava = $request->file('ava');
        
		$nama_file = time()."_".$ava->getClientOriginalName();
		$tujuan_upload = 'images';
		$ava->move($tujuan_upload,$nama_file);
        Buku::create([
            'kode_buku' => $request->kode_buku,
            'id_kategori' => $request->id_kategori,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun' => $request->tahun,
            'jumlah' => $request->jumlah,
            'ava' => $nama_file,
        ]);
        return redirect('/buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Buku::findOrFail($id);
        return view('buku.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Buku::findOrFail($id);
        $kategori = kategori::all();
        return view('buku.edit', compact('data', 'kategori'));
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
        $data = Buku::findOrFail($id);
        $data->update($request->all()); 
        if($request->hasFile('ava')){
            $request->file('ava')->move('images/',$request->file('ava')->getClientOriginalName());
            $data->ava = $request->file('ava')->getClientOriginalName();
            $data->save();
        }
        $data->save();
        return redirect('/buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Buku::findOrFail($id);
        $data->delete();
        return redirect('/buku');
    }
}

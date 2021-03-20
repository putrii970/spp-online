<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Kejuruan;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kejuruan_putri = Kejuruan::All();
        $kelas_putri = Kelas::select('*',  'putri_kelas.id_kelas as id_kelas_putri')->join('putri_jurusan', 'putri_kelas.jurusan_id', '=', 'putri_jurusan.id_jurusan' )
                            ->orderBy('putri_kelas.id_kelas')->get();

        return view('admin.kelas.index_kelas', compact('kelas_putri', 'kejuruan_putri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //insert
        $kelas_putri = new Kelas;
        $kelas_putri->nama_kelas = $request->nama_kelas;
        $kelas_putri->jurusan_id = $request->nama_jurusan;
        $kelas_putri->save();

        return redirect('/kelas')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas_putri = Kelas::find($id);
        // dd($kelas_putri);
        // $kejuruan_putri = Kejuruan::All();
        $kejuruan_putri = Kejuruan::pluck('nama_jurusan', 'id_jurusan');
	   
        return view('admin.kelas.edit_kelas', compact('kelas_putri', 'kejuruan_putri'));
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
        $kelas_putri = Kelas::find($id);
        $kelas_putri->update($request->all());

        return redirect('/kelas')->with('sukses', 'Data berhasil terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas_putri = Kelas::find($id);
        $kelas_putri->delete();
        return redirect('/kelas')->with('sukses', 'Data berhasil dihapus');
    }
}

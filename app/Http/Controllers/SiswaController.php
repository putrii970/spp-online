<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Kelas;
use App\Spp;
use PDF;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa_putri = Siswa::with('putri_kelas')->with('putri_spp')->get();
        $kelas_putri = Kelas::with('kejuruan_putri')->get();
        $spp_putri = Spp::all();

        // dd($kelas_putri);

        return view ('admin.siswa.index_siswa')
                ->with('siswa_putri',$siswa_putri)
                ->with('kelas_putri', $kelas_putri)
                ->with('spp_putri', $spp_putri);
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
        $siswa_putri = new Siswa;
        $siswa_putri->nisn = $request->nisn;
        $siswa_putri->nis = $request->nis;
        $siswa_putri->nama = $request->nama;
        $siswa_putri->putri_kelas_id_kelas = $request->kelas;
        $siswa_putri->alamat = $request->alamat;
        $siswa_putri->no_telp = $request->no_telp;
        $siswa_putri->spp_id_spp = $request->spp;
        $siswa_putri->save();

        return redirect('/siswa')->with('sukses', 'Data berhasil ditambahkan');
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
        $siswa_putri = Siswa::find($id);
        $spp_putri = Spp::pluck('tahun', 'id_spp');
        $kelas_putri = Kelas::with('kejuruan_putri')->get();
        
        return view('admin.siswa.edit_siswa', compact('siswa_putri', 'spp_putri', 'kelas_putri'));
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
        $siswa_putri = Siswa::find($id);
        $siswa_putri->update($request->all());

        return redirect('/siswa')->with('sukses', 'Data berhasil terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa_putri = Siswa::find($id);
        $siswa_putri->delete();
        return redirect('/siswa')->with('sukses', 'Data berhasil dihapus');
    }

    public function exportPdf()
    {
        $siswa_putri = Siswa::with('putri_kelas')->with('putri_spp')->get();
        $pdf = PDF::loadView('laporan.siswa_pdf', ['siswa_putri' => $siswa_putri]);
        
        return $pdf->stream();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use PDF;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayat_putri = Pembayaran::where('petugas_id',auth()->user()->id_petugas)
                                    ->where('jumlah_bayar', '!=', 0)
                                    ->with('petugas_putri')
                                    ->with('putri_siswa')
                                    ->with('spp_putri')
                                    ->with('putri_detail_pembayaran')
                                    ->get();
        return view('admin.riwayat.index_riwayat', compact('riwayat_putri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function exportPdf()
    {
        $riwayat_putri = Pembayaran::where('petugas_id',auth()->user()->id_petugas)
                                    ->where('jumlah_bayar', '!=', 0)
                                    ->with('petugas_putri')
                                    ->with('putri_siswa')
                                    ->with('spp_putri')
                                    ->with('putri_detail_pembayaran')
                                    ->get();

        $pdf = PDF::loadView('laporan.riwayat_pdf', ['riwayat_putri' => $riwayat_putri]);
        
        return $pdf->stream();
    }
}

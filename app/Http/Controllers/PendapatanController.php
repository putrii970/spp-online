<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\Kelas;
use App\Spp;
use PDF;

class PendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendapatan_putri = Pembayaran::with('petugas_putri')
                                    ->with('putri_siswa')
                                    ->with('spp_putri')
                                    ->where('jumlah_bayar', '!=', 0)
                                    ->get();
                                    
        $kelas_putri = Kelas::with('kejuruan_putri')->get();
        
        // $putri_spp = Spp::where('id_spp', $pendapatan_putri->id_spp)
        //                     ->orderBy('created_at','desc')->get();

        // dd($pendapatan_putri);
        $spp_putri = Spp::orderBy('created_at','desc')->get();

        return view ('admin.pendapatan.index_pendapatan')
                ->with('pendapatan_putri',$pendapatan_putri)
                ->with('kelas_putri',$kelas_putri)
                ->with('spp_putri',$spp_putri);
    }

    public function filter(Request $request)
    {
        // dd($request->query->all());

        $kelas_putri = $request->kelas;
        $tahun_putri = $request->tahun;
        $startDate = $request->startTime;
        $endDate = $request->endTime;

        $pendapatan_putri = Pembayaran::with('petugas_putri', 'putri_siswa', 'spp_putri');

        if(!empty($kelas_putri)) {
            $pendapatan_putri = $pendapatan_putri->whereHas('putri_siswa', function($query) use($kelas_putri){
                                        return $query->where('putri_kelas_id_kelas', $kelas_putri);
                                    });
        } 

        if(!empty($tahun_putri)) {
            $pendapatan_putri = $pendapatan_putri->whereHas('spp_putri', function($query) use($tahun_putri){
                                                return $query->where('tahun', $tahun_putri);
                                            });
        }

        if(!empty($startDate) && !empty($endDate)) {
            $pendapatan_putri = $pendapatan_putri->whereBetween('tgl_bayar', [
                                        $request->startTime.' 00:00:00',
                                        $request->endTime.' 23:59:59'
                                    ]);
                                    
        } 

        $pendapatan_putri = $pendapatan_putri->orderBy('tgl_bayar','desc')->where('jumlah_bayar', '!=', 0)->get();
        
        $kelas_putri = Kelas::with('kejuruan_putri')->get();
                
        $spp_putri = Spp::orderBy('created_at','desc')->get();
        
        
        return view ('admin.pendapatan.index_pendapatan')
                    ->with('pendapatan_putri',$pendapatan_putri)
                    ->with('kelas_putri',$kelas_putri)
                    ->with('spp_putri',$spp_putri);
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
        $pendapatan_putri = Pembayaran::with('petugas_putri')
                                    ->with('putri_siswa')
                                    ->with('spp_putri')
                                    ->where('jumlah_bayar', '!=', 0)
                                    ->get();
        $pdf = PDF::loadView('laporan.pendapatan_pdf', ['pendapatan_putri' => $pendapatan_putri]);
        
        return $pdf->stream();
    }
}

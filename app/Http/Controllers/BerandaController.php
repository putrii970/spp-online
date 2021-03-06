<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Kelas;
use App\Petugas;
use App\Pembayaran;
use App\Spp;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa_putri = Siswa::with('putri_kelas')->with('putri_spp')->count();
        $petugas_putri = Petugas::count();
        $riwayat_putri = Pembayaran::where('petugas_id',auth()->user()->id_petugas)
                                    ->with('petugas_putri')
                                    ->with('putri_siswa')
                                    ->with('spp_putri')
                                    ->count();

        $riwayat_nominal_putri = Pembayaran::where('petugas_id',auth()->user()->id_petugas)
                                    ->with('petugas_putri')
                                    ->with('putri_siswa')
                                    ->with('spp_putri')
                                    ->get();

        $nominal = 0;
        foreach($riwayat_nominal_putri as $value) {
            $nominal += $value->jumlah_bayar;
        }

        // dd($nominal);

        return view('beranda')
                    ->with('siswa_putri',$siswa_putri)
                    ->with('petugas_putri',$petugas_putri)
                    ->with('riwayat_putri',$riwayat_putri)
                    ->with('nominal',$nominal);
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
}

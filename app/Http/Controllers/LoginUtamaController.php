<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use Session;

class LoginUtamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa_info_putri = Session::get('siswa_putri');
        // dd($siswa_info_putri);

        $cek_transaksi_siswa_putri = Pembayaran::where('nisn',$siswa_info_putri->nisn)
                            ->latest('created_at')
                            ->first();
        if($cek_transaksi_siswa_putri != null) {
            $riwayat_cek_transaksi_siswa = Pembayaran::where('nisn',$siswa_info_putri->nisn)
                                                    ->where('bulan_dibayar', 12)
                                                    ->orderBy('tahun_dibayar', 'asc')
                                                    ->having('tahun_dibayar', '<=', $cek_transaksi_siswa_putri->tahun_dibayar)
                                                    ->get();
        } else {
            $riwayat_cek_transaksi_siswa = null;
        }
        // dd($check_transaksi_siswa);
        return view('user.profilUser')
                            ->with('cek_transaksi_siswa_putri', $cek_transaksi_siswa_putri)
                            ->with('riwayat_cek_transaksi_siswa', $riwayat_cek_transaksi_siswa);
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

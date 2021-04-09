<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bulan;
use App\Siswa;
use App\Pembayaran;
use App\DetailPembayaran;
use Session;

class KartuSppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $siswa_info_putri = Session::get('siswa_putri');
        $bulan_putri = Bulan::all();
        $siswa_putri = Siswa::with('putri_kelas.kejuruan_putri')
                            ->with('putri_spp')
                            ->where('nisn', $siswa_info_putri->nisn)
                            ->first();
        $cek_transaksi_siswa_putri = Pembayaran::where('nisn', $siswa_info_putri->nisn)
                                    ->with('putri_detail_pembayaran')
                                    ->latest('created_at')
                                    ->first();
        $jumlah_bayar = 0;
        if($cek_transaksi_siswa_putri != null) {
            $pembayaran_putri = Pembayaran::where('nisn', $siswa_info_putri->nisn)
                                            ->with('putri_detail_pembayaran')
                                            ->orderBy('tahun_dibayar', 'desc')
                                            ->where('tahun_dibayar','=', $cek_transaksi_siswa_putri->tahun_dibayar )
                                            ->get();
                    // dd($pembayaran_putri);

            foreach($pembayaran_putri as $value) {
                $jumlah_bayar += count($value->putri_detail_pembayaran);
            }
        } else {
            $pembayaran_putri = null;
        }

        if($request->ajax()){
            $pembayaran = Pembayaran::where('nisn', $siswa_info_putri->nisn)
                                    ->with('putri_detail_pembayaran')
                                    ->latest('created_at')
                                    ->get();
            $siswa_putri2 = Siswa::with('putri_kelas.kejuruan_putri')
                                    ->with('putri_spp')
                                    ->where('nisn', $siswa_info_putri->nisn)
                                    ->first();
            $response = [
                'status' => 'success',
                'data' => $pembayaran,
                'data_siswa' => $siswa_putri2,
                'jumlah_bayar' => $jumlah_bayar,
                'pembayaran' =>  $cek_transaksi_siswa_putri
            ];
    
            return response()->json($response, 200);
        }

       

        // dd($pembayaran_putri);
        return view('user.kartuSppUser')
                                ->with('data_siswa' , $siswa_putri)
                                ->with('pembayaran' , $cek_transaksi_siswa_putri)
                                ->with('jumlah-bayar' , $jumlah_bayar)
                                ->with('bulan_putri' , $bulan_putri);
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

    public function cari() {
        $siswa_info_putri = Session::get('siswa_putri');
        $siswa_putri = Siswa::with('putri_kelas.kejuruan_putri')
                            ->with('putri_spp')
                            ->where('nisn', $siswa_info_putri->nisn)
                            ->get();
                    // dd($siswa_putri);
        $cek_transaksi_siswa_putri = Pembayaran::where('nisn', $siswa_info_putri->nisn)
                                    ->with('putri_detail_pembayaran')
                                    ->latest('created_at')
                                    ->first();
        $jumlah_bayar = 0;
        if($cek_transaksi_siswa_putri != null) {
            $pembayaran_putri = Pembayaran::where('nisn', $siswa_info_putri->nisn)
                                            ->with('putri_detail_pembayaran')
                                            ->orderBy('tahun_dibayar', 'desc')
                                            ->where('tahun_dibayar','=', $cek_transaksi_siswa_putri->tahun_dibayar )
                                            ->get();
            foreach($pembayaran_putri as $value) {
                $jumlah_bayar += count($value->putri_detail_pembayaran);
            }
        } else {
            $pembayaran_putri = null;
        }

        return response()->json(['data-siswa' => $siswa_putri,
                                'pembayaran' => $cek_transaksi_siswa_putri,
                                'jumlah-bayar' => $jumlah_bayar]);
                    

        
    }
}

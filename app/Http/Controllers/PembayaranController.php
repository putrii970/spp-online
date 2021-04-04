<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Siswa;
use App\Bulan;
use App\Pembayaran;
use App\DetailPembayaran;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $spp_putri = Siswa::select('*',  'putri_siswa.nisn as nisn')->join('putri_spp', 'putri_siswa.spp_id_spp', '=', 'putri_spp.id_spp' )
        // ->orderBy('putri_siswa.nisn')->get();
        $bulan_putri = Bulan::all();
        return view('admin.pembayaran.index_pembayaran', compact('bulan_putri'));
    }

    public function filterData(Request $request)
    {
    	if ($request->has('q')) {
    		$cari_putri = $request->q;
    		$data  = DB::table('putri_siswa')->select('nisn', 'nama')
                                ->where('nisn', 'LIKE', '%'.$cari_putri.'%')
                                ->orWhere("nama","LIKE",'%'.$cari_putri.'%')
                                ->get();
    		return response()->json($data);
    	}
    }

    public function cari(Request $request) {
        $siswa_putri = Siswa::with('putri_kelas.kejuruan_putri')
                            ->with('putri_spp')
                            ->where('nisn', $request->data)
                            ->get();
                    // dd($siswa_putri);
        $cek_transaksi_siswa_putri = Pembayaran::where('nisn', $request->data)
                                    ->with('putri_detail_pembayaran')
                                    ->latest('created_at')
                                    ->first();
        $jumlah_bayar = 0;
        if($cek_transaksi_siswa_putri != null) {
            $pembayaran_putri = Pembayaran::where('nisn', $request->data)
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
                    // dd($request->all());
        $date = date("Y-m-d 00:00:00");

        $pembayaran_putri = new Pembayaran;
        $pembayaran_putri->petugas_id = $request->id_petugas;
        $pembayaran_putri->nisn = $request->nisn;
        $pembayaran_putri->tgl_bayar = $date;
        $pembayaran_putri->bulan_dibayar = count($request->bulan);
        $pembayaran_putri->tahun_dibayar = $request->tahun;
        $pembayaran_putri->spp_id = $request->id_spp;
        $pembayaran_putri->jumlah_bayar = $request->jumlah_bayar;
        $pembayaran_putri->save();

        for ($i=0; $i < count($request->bulan) ; $i++){
            // dd($request->bulan[$i]);
            $bulan_detail = $request->bulan[$i];
            $detail_pembayaran_putri = new DetailPembayaran;
            $detail_pembayaran_putri->pembayaran_id_pembayaran = $pembayaran_putri->id_pembayaran;
            $detail_pembayaran_putri->bulan_id = $bulan_detail;
            $detail_pembayaran_putri->harga_spp = $request->nominal;
            $detail_pembayaran_putri->save();
        }


        return redirect('/pembayaran')->with('sukses', 'Data berhasil ditambahkan');
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

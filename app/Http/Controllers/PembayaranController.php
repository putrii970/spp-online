<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Siswa;
use App\Bulan;

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
        // $siswa_putri = Siswa::all();
        $siswa_putri = Siswa::with('putri_kelas.kejuruan_putri')
                            ->with('putri_spp')
                            ->where('nisn', $request->data)
                            ->get();
                    // dd($siswa_putri);

        return response()->json($siswa_putri);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spp;
use PDF;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $spp_putri = Spp::all();
        return view('admin.spp.index_spp', compact('spp_putri'));
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
        $angka_nominal_putri = str_replace(".","", $request->nominal);

        $this->validate($request, [
            'tahun' =>'required|unique:putri_spp',
            'nominal' => 'required'
        ]);
        //insert
        $spp_putri = new Spp;
        $spp_putri->tahun = $request->tahun;
        $spp_putri->nominal = $request->nominal;
        $spp_putri->save();

        return redirect('/spp')->with('sukses', 'data berhasil ditambahkan');
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
        $spp_putri = Spp::where('id_spp',$id)->get();
	   
        return view('admin.spp.edit_spp', compact('spp_putri'));
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
        $spp_putri = Spp::find($id);
        $spp_putri->update($request->all());

        return redirect('/spp')->with('sukses', 'Data berhasil terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spp_putri = Spp::find($id);
        $spp_putri->delete();
        return redirect('/spp')->with('sukses', 'Data berhasil dihapus');
    }

    public function exportPdf()
    {
        $spp_putri = Spp::all();
        $pdf = PDF::loadView('laporan.spp_pdf', ['spp_putri' => $spp_putri]);
        
        return $pdf->stream();
    }
}

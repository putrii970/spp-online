<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kejuruan;
use PDF;

class KejuruanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kejuruans_putri = Kejuruan::all();
        return view('admin.kejuruan.index_kejuruan', compact('kejuruans_putri'));
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
        $kejuruans_putri = new Kejuruan;
        $kejuruans_putri->nama_jurusan = $request->nama_jurusan;
        $kejuruans_putri->save();

        return redirect('/kejuruan')->with('sukses', 'Data berhasil ditambahkan');
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
        $kejuruans_putri = Kejuruan::where('id_jurusan',$id)->get();
	   
        return view('admin.kejuruan.edit_kejuruan', compact('kejuruans_putri'));
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
        $kejuruans_putri = Kejuruan::find($id);
        $kejuruans_putri->update($request->all());

        return redirect('/kejuruan')->with('sukses', 'Data berhasil terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kejuruans_putri = Kejuruan::find($id);
        $kejuruans_putri->delete();
        return redirect('/kejuruan')->with('sukses', 'Data berhasil dihapus');
    }

    public function exportPdf()
    {
        $kejuruan_putri = Kejuruan::all();
        $pdf = PDF::loadView('laporan.kejuruan_pdf', ['kejuruan_putri' => $kejuruan_putri]);
        
        return $pdf->stream();
    }
}

<?php

namespace App\Http\Controllers;
use App\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use PDF;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas_putri = Petugas::all();
        return view('admin.petugas.index_petugas', compact('petugas_putri'));
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
        
        if($request->password != $request->k_password ){
            return redirect('/petugas')->with('gagal', 'konfirmasi password tidak cocok'); 
        }
        //insert
        else{
            $petugas_putri = new Petugas;
        $petugas_putri->username = $request->username;
        $petugas_putri->password = Hash::make($request->password);
        $petugas_putri->nama_petugas = $request->nama_petugas;
        $petugas_putri->level = $request->level;
        $petugas_putri->save();

        return redirect('/petugas')->with('sukses', 'data berhasil ditambahkan');
        }
        
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
        $petugas_putri = Petugas::where('id_petugas',$id)->get();
	   
        return view('admin.petugas.edit_petugas', compact('petugas_putri'));
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
        // dd($request);
        $petugas_putri = Petugas::find($id);
        if($request->password != $request->k_password){
            Session::flash('salah','konfirmasi password tidak cocok');
            return redirect('/petugas/edit/'.$id);
        }else{
            $petugas_putri->update($request->all());
            Session::flash('benar','data berhasil diedit');
            return redirect('/petugas')->with('sukses', 'Data berhasil terupdate!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas_putri = Petugas::find($id);
        $petugas_putri->delete();
        return redirect('/petugas')->with('sukses', 'Data berhasil dihapus');
    }

    public function exportPdf()
    {
        $petugas_putri = Petugas::all();
        $pdf = PDF::loadView('laporan.petugas_pdf', ['petugas_putri' => $petugas_putri]);
        
        return $pdf->stream();
    }
}

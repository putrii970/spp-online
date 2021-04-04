<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Kelas;
use App\Tuition;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income_nioni = Payment::with('officers', 'students', 'tuition')
                                    ->where('jumlah_bayar', '!=', 0)
                                    ->get();
        
        $class_nioni = Kelas::with('vocational')
                            ->get();
        
        $tuition_nioni = Tuition::orderBy('created_at','desc')->get();

        // dd($request->query->all());
        return view ('income.income')
                ->with('income_nioni',$income_nioni)
                ->with('class_nioni',$class_nioni)
                ->with('tuition_nioni',$tuition_nioni);
        
    }

    public function filter(Request $request)
    {
        // dd($request->query->all());

        $kelas = $request->kelas;
        $tahun = $request->tahun;
        $startDate = $request->startTime;
        $endDate = $request->endTime;

        $income_nioni = Payment::with('officers', 'students', 'tuition');

        if(!empty($kelas)) {
            $income_nioni = $income_nioni->whereHas('students', function($query) use($kelas){
                                        return $query->where('kelas_id_kelas', $kelas);
                                    });
        } 

        if(!empty($tahun)) {
            $income_nioni = $income_nioni->whereHas('tuition', function($query) use($tahun){
                                                return $query->where('tahun', $tahun);
                                            });
        }

        if(!empty($startDate) && !empty($endDate)) {
            $income_nioni = $income_nioni->whereBetween('tgl_bayar', [
                                        $request->startTime.' 00:00:00',
                                        $request->endTime.' 23:59:59'
                                    ]);
                                    
        } 

        $income_nioni = $income_nioni->orderBy('tgl_bayar','desc')->where('jumlah_bayar', '!=', 0)->get();
        
        $class_nioni = Kelas::with('vocational')
                                ->get();
                
        $tuition_nioni = Tuition::orderBy('created_at','desc')->get();
        
        // dd($request->query->all());
        return view ('income.income')
                    ->with('income_nioni',$income_nioni)
                    ->with('class_nioni',$class_nioni)
                    ->with('tuition_nioni',$tuition_nioni);
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
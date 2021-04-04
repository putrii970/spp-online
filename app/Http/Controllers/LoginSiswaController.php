<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Alert;
use App\Siswa;
use App\Pembayaran;
use Session;

class LoginSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('user.profilUser');
        }
    }

    public function login(){
    	return view('user.login.login_user');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginPost(Request $request)
    {
        // dd($request->all());
         // Validate the form data
        $this->validate($request, [
          'nisn' => 'required'
        ]);
        
        $siswa_putri = Siswa::with('putri_kelas')
                            ->with('putri_spp')
                            ->where('nisn', $request->nisn)
                            ->first();
        
        if($siswa_putri == null){
            return redirect('/loginUser')->with('alert', 'Nisn tidak ditemukan');
         } else {
            if($request->nisn == $siswa_putri->nisn){
                Session::put('siswa_putri',$siswa_putri);
                Session::put('login',TRUE);
                return redirect('/profilUser');
             } else {
                return redirect('/loginUser')->with('alert', 'Nisn tidak ditemukan');
             }

         }
        
        return redirect('/loginUser')->with('alert', 'Nisn tidak ditemukan');
    }

    public function logout()
    {
        Session::put('login',FALSE);
        return redirect('/loginUser')->with('alert-success','Logout Success');
  
    }
}

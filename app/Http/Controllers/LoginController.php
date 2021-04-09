<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;
use App\Siswa;
use Auth;
use Redirect;

class LoginController extends Controller
{
  public function getLogin()
  {
    return view('login.login');
  }

  public function postLogin(Request $request)
  {
    // dd($request->all());
      // Validate the form data
    $this->validate($request, [
      'username' => 'required',
      'password' => 'required'
    ]);

      // Attempt to log the user in
      // Passwordnya pake bcrypt
    if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
      return redirect()->intended('/beranda');
    }
    return Redirect::back()->withErrors(
      [
        'username' => 'Username/password salah'
      ]
      );
 
    // else if (Auth::guard('siswa')->attempt(['username' => $request->username, 'password' => $request->password])) {
    //   return redirect()->intended('/');
    // }

  }

  public function logout()
  {
    if (Auth::guard('admin')->check()) {
      Auth::guard('admin')->logout();
    } else if (Auth::guard('user')->check()) {
      Auth::guard('user')->logout();
    }

    return redirect('/');

  }
}
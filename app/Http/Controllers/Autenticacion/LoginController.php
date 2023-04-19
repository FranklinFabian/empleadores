<?php

namespace App\Http\Controllers\Autenticacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    // Login Form
    public function loginForm(){
        // Verificamos si el usuario esta logueado
        if (Auth::check()) {
            return redirect()->intended('/dashboard');
        }

        $data = new stdClass();
        $data->page_title = 'Inicio de Sesión';
        $data->page_description = 'Emprendimiento';
        return view('pages.login')->with('data', $data);
    }


    public function login(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'id_estado' => 1])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Nombre de usuario o contraseña incorrectos.',
        ]);
    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

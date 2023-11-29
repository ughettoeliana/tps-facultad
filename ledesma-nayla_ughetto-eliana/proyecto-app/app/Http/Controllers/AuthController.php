<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    protected $authValidationRules = [
        'email' => 'required|min:2',
        'password' => 'required|min:4',
    ];

    protected $authValidationMessages = [
        'email.required'       => 'Ingrese su email',
        'email.min'            => 'El email debe contener al menos :min caracteres.',
        'password.required'       => 'Ingrese su contraseña',
        'password.min'          => 'La contraseña debe contener al menos :min caracteres.'
    ];

    public function home()
    {
        return view('admin.index');
    }
    public function formLogin()
    {
        return view('auth.form-login');
    }

    public function processLogin(Request $request)
    {
        $credenciales = $request->only(['email' , 'password']);
        $request->validate($this->authValidationRules, $this->authValidationMessages);

        if(!auth()->attempt($credenciales)){
            return back()
            ->with('message.error' , 'Las credenciales no coinciden con nuestros registros');
        }
        
        $request->session()->regenerate();
        return redirect()
        ->route('listado-libros')
        ->with('message.success' , '¡Bienvenido devuelta!');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
        ->route('auth.form-login')
        ->with('message.success' , 'Cerraste sesión con éxito.');

    }
}

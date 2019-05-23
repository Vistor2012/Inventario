<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use \Illuminate\Support\Facades\Validator ;
use Auth;


class LoginUsuarioController extends Controller
{
    public function username()
    {
        return 'usuario';
    }
    public  function  LoginUsuario(Request $request)
    {
        $user = Usuario::where('usuario', $request->input('usuario'))
                ->where('clave', md5($request->input('clave')))
                ->first();

        if ($user)
        {
            //dd('Entro');
            Auth::login($user);
            return view('home');
        }
        else{
            //return view('home');
            return back()
                ->withErrors(['usuario'=>trans('auth.failed')])
                ->withInput(request(['usuario']));
        }
    }
}

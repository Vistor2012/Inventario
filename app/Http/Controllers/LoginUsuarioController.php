<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use \Illuminate\Support\Facades\Validator ;
use Auth;


class LoginUsuarioController extends Controller
{
    public function RegistroCliente(Request $request)
    {
        $validacion = Validator ::make($request->all(),
            [
                'nro_dip' => 'required|max:50',
                'paterno' => 'required|max:50',
                'materno' => 'required|max:50',
                'nombres' => 'required|max:50',
                'usuario' => 'usuario|unique:Usuario',
                'clave' => 'required|min:6'
            ]);
        if ($validacion->fails())
        {
            return redirect('/#register')
                ->withInput()
                ->withErrors($validacion);
        }

        $user = new Usuario();
        $user->nro_dip = $request->nro_dip;
        $user->paterno = $request->paterno;
        $user->materno = $request->materno;
        $user->nombres = $request->nombres;
        $user->usuario = $request->usuario;
        $user->clave = bcrypt($request->clave);
        $user->save();

        return 'Completado';

    }


    public  function  LoginUsuario()
    {
        $credenciales = $this->Validate(request(),
        [
            'usuario' => 'usuario',
            'clave' => 'min:6'
        ]);

        if (Auth::attempt($credenciales))
        {
            returnview('/Welcome');
        }
        else
        {
            return back()
                ->withErrors(['usuario'=>trans('auth.failed')])
                ->withInput(request(['usuario']));
        }
    }
}

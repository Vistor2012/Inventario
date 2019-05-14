<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user=User::search($request->nro_dip)->orderBy('id_ra', 'ASC')->paginate(5);
        return view('users.index')->with('user',$user);
    }
    public function create(){
    	return view('users.create');
    }
    public function store(Request $request)
    {
    	$usu=new User($request->all());
        $usu->clave = bcrypt($request->clave);
        $usu->save();
        flash('Registro Completo', 'success');
        return redirect()->route('users.index',$usu->id_ra);
    }
    public function show($id_ra){
    	$usu = User::find($id_ra);
        return view('users.show')->with('usu',$usu);
    }
    public function edit($id_ra){
    	$user = User::find($id_ra);
        return view('users.edit')->with('user',$user);
    }
    public function update(Request $request, $id_ra){
    	$user = User::find($id_ra);
        $user->fill($request->all());
        $user->save();

        flash('Edicion completa', 'warning');
        return redirect()->route('users.index');
    }
    public function destroy($id_ra){
    	$user = User::find($id_ra);
        $user->delete();
        flash('a sido borrado de forma exitosa', 'danger');
        return redirect()->route('users.index');

    }
}
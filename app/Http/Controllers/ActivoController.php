<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activo;
use App\Oficina;

class ActivoController extends Controller
{
    public function index(Request $request)
  {
      $activo = Activo::orderBy('id_act', 'DESC')->get();
      //dd($activo);
      return view('activos.index')->with('activo', $activo);
  }
  public function create(){
    return view('activos.create');
  }
  public function store(Request $request)
  {
      $act=new Activo($request->all());
      $act->save();
      flash('Registro Completo', 'success');
      return redirect()->route('activos.index',$act->id_act);
  }
  public function show($id_act){
    $act=Activo::find($id_act);
      return view('activos.show')->with('act',$act);
  }
  public function edit($id_act){
    $activo=Activo::find($id_act);
      return view('activos.edit')->with('activo', $activo);
  }
  public function update(Request $request, $id_act){
      $activo = Activo::find($id_act);
      $activo->fill($request->all());
      $activo->save();

      flash('Edicion completa', 'warning');
      return redirect()->route('activos.index');
  }
  public function destroy($id_act){
    $activo = Activo::find($id_act);
      $activo->delete();
      flash('a sido borrado de forma exitosa', 'danger');
      return redirect()->route('activos.index');
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivoRev;
use App\Oficina;
use DB;

class ActivoRevController extends Controller
{
    public function index(Request $request)
  {
      $activorev = ActivoRev::OrderBy('id_act', 'DESC')->get();
      return view('activosrev.index')->with('activorev', $activorev);
  }
  public function create(){
      return view('activosrev.create');
  }
  public function store(Request $request)
  {
      $actr=new ActivoRev($request->all());
      $actr->save();
      flash('Registro Completo', 'success');
      return redirect()->route('activosrev.index',$actr->id_act);
  }
  public function show($id_act){
      $actr=ActivoRev::find($id_act);
      return view('activosrev.show')->with('actr',$actr);
  }
  public function edit($id_act){
      $activorev=ActivoRev::find($id_act);
      return view('activosrev.edit')->with('activorev', $activorev);
  }
  public function update(Request $request, $id_act){
      $activorev = ActivoRev::find($id_act);
      $activorev->fill($request->all());
      $activorev->save();
      flash('Edicion completa', 'warning');
      return redirect()->route('activosrev.index');
  }
  public function destroy($id_act){
      $activorev = ActivoRev::find($id_act);
      $activorev->delete();
      flash('a sido borrado de forma exitosa', 'danger');
      return redirect()->route('activosrev.index');
  }
}

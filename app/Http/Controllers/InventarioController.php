<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPJasper\PHPJasper;
use App\Inventario;
use App\InvenDetalle;
use App\Oficina;
use App\Activo;
use App\ActivoRev;

class InventarioController extends Controller
{
  public function index(Request $request)
  {
    $inventario = Inventario::orderby('inv_ofi_cod','DESC')->paginate(15);
    //dd($inventario);
    return view('inventarios.index')->with('inventario', $inventario);
  }
  public function create(){
  	$inventario=Inventario::orderby('id_inv','desc')->get();
  	$oficina=Oficina::orderby('ofc_cod','desc')->get();
  	//dd($oficina);
  	//dd($inventario);
    $detalle=InvenDetalle::orderby('id_inv_det','desc')->get();
    $activo=Activo::orderby('act_ofc_cod','desc')->get();
    $rev=ActivoRev::orderby('act_ofc_cod','desc')->get();
    return view('inventarios.create')->with('inventario', $inventario)->with('oficina',$oficina)->with('detalle',$detalle)->with('activo',$activo)->with('rev',$rev);
  }
  public function search(Request $request){
    $search = $request->get('search');
    //($search);
    $inventario = Inventario::where('id_inv', 'like', '%'.$search.'%')->paginate(5);
    //dd($inventario);
    return view('inventarios.index',['inventario' => $inventario]);
  }
  public function store(Request $request)
  { 
      $inv=new Inventario($request->all());
      $oficina=Oficina::orderby('ofc_cod','desc')->get()->last();
      $inv->save();
      //dd($inv);
      $det=new InvenDetalle($request->all());
      $activo=Activo::orderby('act_ofc_cod', 'desc')->get()->last();
      $rev=ActivoRev::orderby('act_ofc_cod', 'desc')->get()->last();
      $det->save();
      flash('Registro Completo', 'success');
      return redirect()->route('inventarios.index',$inv->inv_ofi_cod);
  }
  public function show($ofi_cod){
      $inv=Inventario::find($id_inv);
      return view('inventarios.show')->with('inv', $inv);
  }
  public function edit($id_inv){
    	$inventario=Inventario::find($id_inv);
        return view('inventarios.edit')->with('inventario', $inventario);
    }
    public function update(Request $request, $id_inv){
        $inventario = Inventario::find($id_inv);
        $inventario->fill($request->all());
        $inventario->save();

        flash('Edicion completa', 'warning');
        return redirect()->route('inventarios.index');
    }
    public function destroy($id_inv){
    	$inventario = Inventario::find($id_inv);
        $inventario->delete();
        flash('a sido borrado de forma exitosa', 'danger');
        return redirect()->route('inventarios.index');
    }
}

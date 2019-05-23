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
class InvenDetalleController extends Controller
{
    public function index(Request $request)
  {
    $detalle = InvenDetalle::orderby('act_codigo','DESC')->paginate(15);
    //dd($inventario);
    return view('invdetalles.index')->with('detalle', $detalle);
  }
  public function create(){
    $detalle=InvenDetalle::orderby('id_inv_det','desc')->get();
    $activo=Activo::orderby('act_ofc_cod','desc')->get();
    $rev=ActivoRev::orderby('act_ofc_cod','desc')->get();
    //dd($inventario);
    return view('invdetalles.create')->with('detalle', $detalle)->with('activo',$activo)->with('rev',$rev);
  }
  public function search(Request $request){
    $search = $request->get('search');
    //($search);
    $detalle = InvenDetalle::where('id_inv_det', 'like', '%'.$search.'%')->paginate(5);
    //dd($inventario);
    return view('invdetalles.index',['detalle' => $detalle]);
  }
  public function store(Request $request)
  {   
      //Primero recuperamos el codigo del activo a guardar, ya que es unico nos ayudara a buscar en las tablas
      $codigo = $request->codigo;

      //Buscamos primero en activos

      $activo = Activo::where('codigo',$codigo)->first();

      //Si el resultado es vacio, recien buscamos en activos revalorizados

      if (!$activo){
        $activo = ActivoRev::where('codigo',$codigo)->first();        
      }

      //Completamos el array para guardarlo

      $dataDetalle = array(
        'act_codigo' => $codigo,
        'act_des' => $activo->act_des,
        'act_des_det' => $activo->act_des_det,
        'act_can' => $activo->act_can,
        'act_estado' => $request->act_estado,
        'act_ofc_cod' => $activo->act_ofc_cod,
        'act_val_neto' => $activo->act_imp_bs,
        'exi_act' => ($request->exi_act == "true") ? '1' : '0',
        'observacion' => $request->observacion
      );
      $AddDetalle = new InvenDetalle($dataDetalle);  
      $AddDetalle->save();
      
      return response()->json($activo);
  }
  public function show($id_inv_det){
      $det=InvenDetalle::find($id_inv_det);
      return view('invdetalles.show')->with('det', $det);
  }
  public function edit($id_inv_det){
      $detalle=InvenDetalle::find($id_inv_det);
        return view('invdetalles.edit')->with('detalle', $detalle);
    }
    public function update(Request $request, $id_inv){
        $detalle = InvenDetalle::find($id_inv_det);
        $detalle->fill($request->all());
        $detalle->save();
        flash('Edicion completa', 'warning');
        return redirect()->route('invdetalles.index');
    }
    public function destroy($id_inv){
      $detalle = InvenDetalle::find($id_inv_det);
        $detalle->delete();
        flash('a sido borrado de forma exitosa', 'danger');
        return redirect()->route('invdetalles.index');
    }
}
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
    $inventario = Inventario::orderby('inv_ofi_cod','DESC')->paginate(10);
    //dd($inventario);
    return view('inventarios.index')->with('inventario', $inventario);
  }
  public function create(){
    $inventario=Inventario::orderby('id_inv','desc')->get();
    $oficina=Oficina::orderby('ofc_des','asc')->select('ofc_cod','ofc_des')->groupBy('ofc_cod','ofc_des')->get();
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
      \DB::beginTransaction();
      try{
        $inv=new Inventario($request->all());
        $inv->save();
        \DB::commit();
      }catch(\Illuminate\Database\QueryException $e) {
        \DB::rollback();
      }

      $activo = Activo::where('act_ofc_cod', $request->input('inv_ofi_cod'))
          ->select('codigo','act_des','act_des_det','act_can', 'act_imp_bs')
          ->orderby('act_ofc_cod', 'desc')
          ->get();
      $rev = ActivoRev::where('act_ofc_cod', $request->input('inv_ofi_cod'))
          ->select('codigo','act_des','act_des_det','act_can', 'act_imp_bs')
          ->orderby('act_ofc_cod', 'desc')
          ->get();
      $activos = $rev->concat($activo);
      //Aqui haces el cruzado
      /*$revisados = InvenDetalle::where('act_ofc_cod', $request->input('inv_ofi_cod'))
          ->select('codigo','act_des','act_des_det','act_can', 'act_imp_bs')
          ->orderby('act_ofc_cod', 'desc')
          ->get();*/
      //Revisa las funciones de las collections que evitan el duplicado
      /*if ($this->useAsCallable($callback)) {  
          return $this->filter(function ($revisados) use ($callback) {
              return ! $callback($revisados);
          });
      }
      return $this->filter(function ($revisados) use ($callback) {
          return $revisados != $callback;
      });*/

      return response()->json($activos);
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

    public function getInvInfo($id_ofi){
      $inv = Inventario::where('inv_ofi_cod',$id_ofi)->get();
      return response()->json($inv);
    }
    public function pdfInv($inv_ofi_cod){
      $input = public_path() . '/reports/prueb.jasper';
      $output = public_path() . '/reports/' . time() . '_Valores';

      $options = [
          'format' => ['pdf'],
          'locale' => 'es',
          'params' => ['test' => $inv_ofi_cod],
          'db_connection' => [
              'driver' => 'postgres', //mysql, ....
              'username' => 'postgres',
              'password' => '123456',
              'host' => '192.168.26.54',
              'database' => 'daf_test',
              'port' => '5432'
          ]
      ];
      $jasper = new PHPJasper;
      $jasper->process(
          $input,
          $output,
          $options
      )->execute();
      $file = $output . '.pdf';
      $path = $file;
      //en caso que el archivo no ha sido generado retorna un error 404
      if (!file_exists($file)) {
          abort(404);
      }
      //si se ha generado el contenido
      $file = file_get_contents($file);
      //el archivo generado, vamos a mandar el contenido al navegador
      unlink($path);
      //retornamos el contenido para abrir por el navegador que abrira un pdf
      return response($file, 200)
          ->header('Content-Type', 'application/pdf')
          ->header('Content-Disposition', 'inline; filename="cliente.pdf"');
      return view('inventarios.index');
  }
}
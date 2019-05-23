<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPJasper\PHPJasper;
use App\Oficina;
use App\Activo;
use App\ActivoRev;
use Carbon\Carbon;
use App\Imports\ActivosRevImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;
class OficinaController extends Controller
{
  public function index(Request $request)
  {
      $oficina = Oficina::select('ofc_cod','ofc_des')->orderby('ofc_cod','ASC')->groupBy('ofc_cod','ofc_des')->paginate(10);
      //$oficina=Oficina::
      //dd($oficina);
      return view('oficinas.index')->with('oficina', $oficina);
  }
  public function create(){
      return view('oficinas.create');
  }
  public function search(Request $request){
    $search = $request->get('search');
    //($search);
    $oficina = Oficina::where('ofc_des', 'like', '%'.$search.'%')->paginate(5);
    //dd($oficina);
    return view('oficinas.index',['oficina' => $oficina]);
  }
  public function store(Request $request)
  {
      $ofi=new Oficina($request->all());
      $ofi->save();
      flash('Registro Completo', 'success');
      return redirect()->route('oficinas.index',$ofi->ofc_cod);
  }
  public function show($ofc_cod){
      $ofi=Oficina::find($ofc_cod);
      return view('oficinas.show')->with('ofi', $ofi);
  }
  public function pdf($ofc_cod){
      $input = public_path() . '/reports/prueb.jasper';
      $output = public_path() . '/reports/' . time() . '_Valores';

      $options = [
          'format' => ['pdf'],
          'locale' => 'es',
          'params' => ['test' => $ofc_cod],
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
      return view('oficinas.index');
  }
  public function generarQR($criterioOficina, $criterioActivo)
  {
      $qrcode = new BaconQrCodeGenerator;
      $path = public_path() . '/imagenes/qr/';
      if (!file_exists($path)) {
          mkdir($path, 0777, true);
      }
      $oficina = DB::table('act.oficina')->distinct()->select('ofc_cod','ofc_des')->where('ofc_cod',$criterioOficina)->get();
      $activo  = DB::table('act.activos')->where('id_act',$criterioActivo)->get();
      //dd($oficina[0]->ofc_des);
      $datosQR = '';
      $datosQR = $datosQR . "Oficina: "     . $oficina[0]->ofc_des ."\n";
      $datosQR = $datosQR . "Codigo: "      . $activo[0]->codigo ."\n";
      $datosQR = $datosQR . "Descripcion: " . $activo[0]->act_des ."\n";
      $datosQR = $datosQR . "Adquisicion: "     . $activo[0]->act_imp_bs ."\n";
      $datosQR = $datosQR . "Estado: "      . $activo[0]->act_estado ."\n";
      $rutaImagen = $path . $activo[0]->id_act. '.png';
      $path = $activo[0]->id_act. '.png';
      $qrcode->format('png')
      ->size(200)
      ->generate($datosQR,$rutaImagen);

      return response()->json($path); 
  }
  public function generarQRC($criterioOficinarev, $criterioActivorev)
  {
      $qrcode = new BaconQrCodeGenerator;
      $path = public_path() . '/imagenes/qr/';
      if (!file_exists($path)) {
          mkdir($path, 0777, true);
      }
      $oficina = DB::table('act.oficina')->distinct()->select('ofc_cod','ofc_des')->where('ofc_cod',$criterioOficinarev)->get();
      $activorev  = DB::table('act.activos_rev')->where('id_act',$criterioActivorev)->get();
      //dd($oficina[0]->ofc_des);
      $datosQR = '';
      $datosQR = $datosQR . "Oficina: "     . $oficina[0]->ofc_des ."\n";
      $datosQR = $datosQR . "Codigo: "      . $activorev[0]->codigo ."\n";
      $datosQR = $datosQR . "Descripcion: " . $activorev[0]->act_des ."\n";
      $datosQR = $datosQR . "Adquisicion: " . $activorev[0]->act_fec_adq ."\n";
      $datosQR = $datosQR . "Estado: "      . $activorev[0]->act_estado ."\n";
      $rutaImagen = $path . $activorev[0]->id_act. '.png';
      $path = $activorev[0]->id_act. '.png';
      $qrcode->format('png')
      ->size(200)
      ->generate($datosQR,$rutaImagen);

      return response()->json($path); 
  }
  public function import(Request $request)
  {
      //$activorev=Excel::toCollection(new ActivosRevImport, $request->file('import_file'));
      //dd($activorev);
      Excel::import(new ActivosRevImport, $request->file('import_file'));
      return redirect()->route('activosrev.index')->with('success', 'All good!');
  }
}



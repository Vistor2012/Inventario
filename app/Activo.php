<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    protected $table = "act.activos";
  protected $fillable = [
    'id_act',
    'codigo',
    'act_cod_bar',
    'act_cod_aux',
    'act_des',
    'act_des_det',
    'act_can',
    'act_imp_bs',
    'act_imp_us',
    'act_fec_adq',
    'act_par_cod',
    'act_vida_util',
    'act_cod_con',
    'act_nro_doc',
    'act_nro_serie',
    'act_marca',
    'act_mod_tipo',
    'act_estado',
    'act_imp_dep_ini',
    'act_ges',
    'act_ci_resp',
    'act_cod_prg',
    'act_dias_vida_util',
    'act_ofc_cod',
    'act_con_cod',
    'estado',
    'par_cod',
    'tipoadq',
    'idx',
    'act_nro_fact',
    'act_nro_fabrica',
    'act_dimensiones',
    'act_resoluciones',
    'act_modelo',
    'act_nro_motor',
    'act_procedencia',
    'act_tipo',
    'act_color',
    'act_lote_compuesto',
    'fec_cre'
  ];
  protected $primaryKey = 'act_ofc_cod';

  public function Oficina()
  {
    return $this -> belongsTo('App\Oficina');
  }
  public function scopeSearch($query, $id_act)
  {
    return $query->where('id_act', 'LIKE', "%$id_act%");
  }
}

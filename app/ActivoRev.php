<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivoRev extends Model
{
    protected $table = "act.activos_rev";
    public $timestamps = false;
    
    protected $fillable = [
        'id_act',
        'codigo',
        'act_des',
        'act_des_det',
        'act_can',
        'act_fec_adq',
        'act_par_cod',
        'act_vida_util',
        'act_estado',
        'act_ges',
        'act_ofc_cod',
        'estado',
        'fec_cre',
        'act_imp_bs'
    ];
  protected $primaryKey = 'act_ofc_cod';

  public function Oficina()
  {
    return $this->belongsTo('App\Oficina');
  }
  public function scopeSearch($query, $id_act)
  {
    return $query->where('id_act', 'LIKE', "%$id_act%");
  }
}

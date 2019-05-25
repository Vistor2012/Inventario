<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class InvenDetalle extends Model
{
    protected $table = "act.inven_detalle";
    public $timestamps = false;
    
    protected $fillable = [
        'id_inv_det',
        'act_codigo',
        'act_des',
        'act_des_det',
        'act_can',
        'act_estado',
        'act_ofc_cod',
        'act_val_neto',
        'exi_act',
        'fec_cre',
        'observacion',
        'id_inv'
    ];
  protected $primaryKey = 'id_inv_det';
  public function Oficina()
  {
    return $this->belongsTo('App\Oficina');
  }
  public function Activo()
  {
    return $this->belongsTo('App\Activo');
  }
  public function ActivoRev()
  {
    return $this->belongsTo('App\Invetario');
  }
  public function Inventario()
  {
    return $this->belongsTo('App\Invetario');
  }
  public function scopeSearch($query, $id_inv)
  {
    return $query->where('id_inv_det', 'LIKE', "%$id_inv_det%");
  }
}
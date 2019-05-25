<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = "act.inventarios";
    public $timestamps = false;
    protected $fillable = [
        'id_inv',
        'inv_ofi_cod',
        'inv_ofi_des',
        'fec_inv',
        'inv_des',
        'inv_resp_actual',
        'inv_resp_nuevo',
        'obs_inv',
        'resp_inv',
        'fec_cre',
        'resp_unidad',
        'gestion',
        'estado'
    ];
  protected $primaryKey = 'id_inv';

  public function Oficina()
  {
    return $this->belongsTo('App\Oficina');
  }
  public function Activo()
  {
    return $this->hasMany('App\Activo');
  }
  public function ActivoRev()
  {
    return $this->hasMany('App\ActivoRev');
  }
  public function InvenDetalle()
  {
    return $this->belongsTo('App\InvenDetalle');
  }
  public function scopeSearch($query, $id_inv)
  {
    return $query->where('id_inv', 'LIKE', "%$id_inv%");
  }
}

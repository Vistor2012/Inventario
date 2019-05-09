<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $table = "act.oficina";
    protected $fillable = [
      'id_oficina',
      'ofc_cod',
      'soa_cod',
      'ofc_des',
      'ofi_ges',
      'ofi_des',

    ];
    protected $primaryKey = 'ofc_cod';
    public function Activo()
    {
      return $this -> hasMany('App\Activo');
    }
    public function Activorev()
    {
      return $this -> hasMany('App\Activorev');
    }
}

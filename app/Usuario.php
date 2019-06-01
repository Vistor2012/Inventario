<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Usuario extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $table ="personas";
    protected $connection = 'auth_db';
    protected $primaryKey = 'id_persona';
    public $remember_token=false;

	public function getAuthPassword()
	{
	    return $this->clave;
	}
}

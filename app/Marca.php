<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marca extends Model
{
	use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre', 'abreviatura'
    ];

    public function productos()
    {
        return $this->hasMany('App\Producto');
    }
}

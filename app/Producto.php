<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre', 'marca_id', 'categoria_id', 'unidad_id', 'p_c', 'p_v' 
    ];

    public function marca()
    {
        return $this->belongsTo('App\Marca');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');

    }

    public function unidad()
    {
        return $this->belongsTo('App\Unidad');
        
    }
}

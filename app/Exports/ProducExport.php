<?php

namespace App\Exports;

use App\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProducExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$productos =Producto::all();

    	$collection = collect([]);
    	$num = 1;
    	foreach ($productos as $product) {
    		$collection->offsetSet($num ,[$product->nombre, $product->categoria->nombre, $product->marca->nombre, $product->unidad->nombre, $product->p_c, $product->p_v] );
    		$num = $num +1;
    	}

    	return $collection;

    }
}

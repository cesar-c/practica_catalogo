<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ctgcontrol extends Controller
{
    
    public function inicio(){
    	$categorias = App\Categoria::orderBy('orden')->get();
    	$lista = App\Categoria::where('orden','=', 1)->get();

    	foreach ($lista as $catg) {
    		$productos = $catg->productos()->paginate(5);
    	}


    	return view('welcome',compact('categorias','productos'));

    }

    public function buscar(Request $request , $id){
    	
    	if($request->ajax()){
    		$productos = App\Categoria::find($id)->productos()->paginate(5);

//		    	foreach ($lista as $catg) {
//		    		$productos = $catg->productos()->get();
//		    	}

    	}

    	return view('tabla.catalogo',compact('productos'));

    }



}

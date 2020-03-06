<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;


use App\Exports\MarcaExport;
use App\Exports\UnidadExport;
use App\Exports\CategExport;
use App\Exports\ProducExport;

class ControlConfig extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function lista($elemento = 'marca'){

    	switch ($elemento) {
    		case 'marca':
    			$listatri = ['nombre', 'abreviatura'];

    			$tabla = App\Marca::paginate(8);
    			break;
    		
    		case 'unidad':
    			$listatri = ['nombre', 'abreviatura'];
    			$tabla = App\Unidad::paginate(8);
    			break;

    		case 'categoria':
    			$listatri = ['nombre', 'orden'];
//    			$tabla = App\Categoria::paginate(8);
                $tabla = App\Categoria::orderBy('orden')->paginate(8);
    			break;

    		default:
                $tabla = App\Producto::paginate(8);
                $marcas = App\Marca::select('id','nombre')->get();
                $categorias = App\Categoria::select('id','nombre')->get();
                $unidads = App\Unidad::select('id','nombre')->get();

    			break;
    	}


        if($elemento != 'producto'){
    	   return view('config', compact('listatri','elemento','tabla'));}
        else{
            return view('config', compact('elemento','tabla','marcas','categorias','unidads'));
        }
    }


    public function borrarm(Request $request, $id){
    	if($request->ajax()){
    		$elemento = $request->elemento;

    		switch ($elemento) {
    		case 'marca':
    			$object = App\Marca::find($id);
    			$object->delete();
    			break;
    		
    		case 'unidad':
    			$object = App\Unidad::find($id);
    			$object->delete();
    			break;

    		case 'categoria':
    			$object = App\Categoria::find($id);
    			$object->delete();
    			break;

    		default:
    			$object = App\Producto::find($id);
    			$object->delete();
    			break;
    	}

    }
    	
    }

    public function pasarpagina(Request $request){
    	if($request->ajax()){
    		$elemento = $request->elemento;
      		switch ($elemento) {
    		case 'marca':

    			$tabla = App\Marca::paginate(8);
    			break;
    		
    		case 'unidad':
    			$tabla = App\Unidad::paginate(8);
    			break;

    		case 'categoria':
    			$listatri = ['nombre', 'orden'];
                $tabla = App\Categoria::orderBy('orden')->paginate(8);
    			break;

    		default:
                $tabla = App\Producto::paginate(8);
                $marcas = App\Marca::select('id','nombre')->get();
                $categorias = App\Categoria::select('id','nombre')->get();
                $unidads = App\Unidad::select('id','nombre')->get();
    			break;
    	}

            if($elemento != 'producto'){
                return view('tabla.' . $elemento, compact('tabla'))->render();}
            else{
                return view('tabla.' . $elemento, compact('tabla','marcas','categorias','unidads'))->render();

            }

     	}

    }


    public function crear(Request $request){

        if($request->ajax()){
            $elemento = $request->elemento;
            switch ($elemento) {
            case 'marca':
                App\Marca::updateOrCreate(['id' => $request->id],
                ['nombre' => $request->nombre, 'abreviatura' => $request->abreviatura]);        
                $tabla = App\Marca::paginate(8);
                break;
            
            case 'unidad':
                App\Unidad::updateOrCreate(['id' => $request->id],
                ['nombre' => $request->nombre, 'abreviatura' => $request->abreviatura]); 
                $tabla = App\Unidad::paginate(8);
                break;

            case 'categoria':
                $evificar = App\Categoria::where('orden',$request->orden)->get();

                if(!($evificar->isEmpty())){
                $categs = App\Categoria::where('orden',$request->orden)->orWhere('orden','>',$request->orden)->get();
                foreach ($categs as $modelo) {
                    $numero = $modelo->orden; 
                    $modelo->orden = $numero +1;
                    $modelo->save();
                }

                }

                App\Categoria::updateOrCreate(['id' => $request->id],
                ['nombre' => $request->nombre, 'orden' => $request->orden]);
                $tabla = App\Categoria::orderBy('orden')->paginate(8);
                break;

            default:
                App\Producto::updateOrCreate(['id' => $request->id],
                ['nombre' => $request->nombre, 'marca_id' => $request->marca_id, 'categoria_id' => $request->categoria_id,
                'unidad_id' => $request->unidad_id, 'p_c' => $request->p_c, 'p_v' => $request->p_v]); 
                $tabla = App\Producto::paginate(8);
                $marcas = App\Marca::select('id','nombre')->get();
                $categorias = App\Categoria::select('id','nombre')->get();
                $unidads = App\Unidad::select('id','nombre')->get();

                break;
        }

            if($elemento != 'producto'){
                 return view('tabla.' . $elemento, compact('tabla'))->render();}
            else{
                return view('tabla.' . $elemento, compact('elemento','tabla','marcas','categorias','unidads'))->render();
            }
        }
    	
    }

    public function buscar(Request $request, $id){

        if($request->ajax()){
            $elemento = $request->elemento;
            switch ($elemento) {
            case 'marca':
                $object = App\Marca::find($id);
                break;
            
            case 'unidad':
                $object = App\Unidad::find($id);
                break;

            case 'categoria':
                $object = App\Categoria::find($id);
                break;

            default:
                $object = App\Producto::find($id);
                break;
        }

            return response()->json($object);
        }
        
    }


    public function exportPDF($elemento){
            switch ($elemento) {
            case 'marca':
                $object = App\Marca::all();
                break;
            
            case 'unidad':
                $object = App\Unidad::all();
                break;

            case 'categoria':
                $object = App\Categoria::all();
                break;

            default:
                $object = App\Producto::all();
                break;
            }
            $pdf = PDF::loadView('pdf.' . $elemento , compact('object'));



            return $pdf->download($elemento . '-lista.pdf');
        }

    public function exportEXCEL($elemento){

        switch ($elemento) {
            case 'marca':
                return  Excel::download(new MarcaExport, 'marca-list.xlsx');
                break;
            
            case 'unidad':
                return  Excel::download(new UnidadExport, 'unidad-list.xlsx');
                break;

            case 'categoria':
                return  Excel::download(new CategExport, 'categ-list.xlsx');
                break;

            default:
                return  Excel::download(new ProducExport, 'product-list.xlsx');
                break;
            }

    }


}

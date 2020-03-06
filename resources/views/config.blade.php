@extends('layouts.app')

@section('content')

	<div class="container">
	<div class="row">
	<div class="col-2 ">
		<div class="list-group">
			<a href="{{ route('config','marca') }}" class="list-group-item list-group-item-action">Marca</a>
			<a href="{{ route('config','unidad') }}" class="list-group-item list-group-item-action">Unidad</a>
			<a href="{{ route('config','categoria') }}" class="list-group-item list-group-item-action">Categoría</a>
			<a href="{{ route('config','producto') }}" class="list-group-item list-group-item-action">Producto</a>
			
		</div>

	</div>

	<div class="col-10 ">

	<div class="row justify-content-center">
		<h1>Tabla de registros: {{ $elemento }}</h1>
		<div class="w-75">
		<br>
		<br>
		<a class="btn btn-success" href="javascript:void(0)" id="createNewProduct" >Nuevo</a>
		<a class="btn btn-success" href="{{ route('datospdf', $elemento ) }}" >Exportar PDF</a>
		<a class="btn btn-success" href="{{ route('datosexcel', $elemento ) }}" >Exportar Excel</a>
		</div>
	<div class="col-10 ">	
	
	<br>
	<div id="table_data" class="table-responsive">
		@include('tabla.' . $elemento)
	</div>
	
	<input type="hidden" name="elemento" value="{{ $elemento }}">
	<a href="{{ route('pagination.fetch') }}" id="ruta"></a>
	<a href="{{ route('crear') }}" id="rutacrear"></a>
	<input type="hidden" name="pagina" value="1">
	</div>
	</div>

	</div>

	</div>
	</div>




@endsection

@section('script')
	@switch($elemento)
    @case('marca')
        <script type="text/javascript" src="{{ asset('js/marca.js') }}"></script>
        @break

    @case('unidad')
        <script type="text/javascript" src="{{ asset('js/marca.js') }}"></script>
        @break
    @case('categoria')
        <script type="text/javascript" src="{{ asset('js/categoria.js') }}"></script>
        @break
    @default
        <script type="text/javascript" src="{{ asset('js/producto.js') }}"></script>
	@endswitch

<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
@endsection
	

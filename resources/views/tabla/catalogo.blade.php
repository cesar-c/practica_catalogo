

<div class="row justify-content-start">

@foreach($productos as $producto)
		<div class="card border-primary mb-3 mr-3" style="width: 13rem;">
		  <div class="card-header">{{ $producto->marca->nombre }}</div>
		  <div class="card-body text-primary">
		    <h5 class="card-title">{{ $producto->nombre }}</h5>
		    <ul>
		    	<li>Unidad : {{ $producto->unidad->abreviatura }}</li>
		    	<li>P compra: {{ $producto->p_c }} $</li>
		    	<li>P venta: {{ $producto->p_v }} $</li>
		    </ul>
		  </div>
		</div>
@endforeach
</div>

{!! $productos->links() !!}

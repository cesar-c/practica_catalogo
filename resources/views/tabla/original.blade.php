<table>
			<tr>
				<th scope="col" >Nombre</th>
				@if($elemento == 'marca' or $elemento == 'unidad')
					<th scope="col" >Abreviatura</th>

				@elseif($elemento == 'categoria')
					<th scope="col" >Orden</th>

				@else
					<th scope="col" >Categoria</th>
					<th scope="col" >Marca</th>
					<th scope="col" >Unidad</th>
					<th scope="col" >P Compra</th>
					<th scope="col" >P Venta</th>
				@endif
				<th scope="col" >Operaciones</th>
			</tr>
				@foreach($tabla as $fila)
				<tr>
					@foreach($listatri as $atri)
						<td scope="row">{{ $fila->$atri }}</td>
					@endforeach
					<td scope="row">
						<form action="{{ route('borrar', $fila->id) }}" method="delete">
							<a href="#" class="btn-delete">X</a>
						</form>
					</td>
				</tr>
				@endforeach
		</table>
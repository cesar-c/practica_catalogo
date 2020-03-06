<table  class="table table-sm  text-center" id="tabla_elementos">
	<thead class="thead-dark">
	<tr>
		<th>Nombre</th>
		<th>Categoria</th>
		<th>Marca</th>
		<th>Unidad</th>
		<th>P de compra</th>
		<th>P de ventas</th>
		<th>Operaciones</th>
	</tr>
	</thead>
	@foreach($tabla as $fila)
		<tr>
			<td>{{ $fila->nombre }}</td>
			<td>{{ $fila->categoria->nombre }}</td>
			<td>{{ $fila->marca->abreviatura }}</td>
			<td>{{ $fila->unidad->abreviatura }}</td>
			<td>{{ $fila->p_c }}</td>
			<td>{{ $fila->p_v }}</td>
			<td scope="row">
				<form  method="delete">
				<a href="{{ route('buscar', $fila->id) }} " class="btn btn-primary btn-edit">Edit</a>
				    <a href="{{ route('borrar', $fila->id) }} " class="btn btn-danger btn-delete">X</a>
				</form>
			</td>
		</tr>
	@endforeach
</table>
{!! $tabla->links() !!}


<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="modalform" name="modalform" class="form-horizontal">
                   <input type="hidden" name="id" id="id" >
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" value="" maxlength="50" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 control-label">Categoria</label>
                        <div class="col-sm-12">
                        	<select class="form-control decimales" id="categ" name="categ">
                        		<option value="#">Seleccione categoria</option>
                        		@foreach($categorias as $ctg)
                        		<option value="{{ $ctg->id }}">{{ $ctg->nombre }}</option>
                        		@endforeach
                        	</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 control-label">Marca</label>
                        <div class="col-sm-12">
                        	<select class="form-control decimales" id="marc" name="marc">
                        		<option value="#">Seleccione marca</option>
                        		@foreach($marcas as $mrc)
                        		<option value="{{ $mrc->id }}">{{ $mrc->nombre }}</option>
                        		@endforeach
                        	</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 control-label">Unidad</label>
                        <div class="col-sm-12">
                        	<select class="form-control decimales" id="unid" name="unid">
                        		<option value="#">Seleccione unidad</option>
                        		@foreach($unidads as $uni)
                        		<option value="{{ $uni->id }}">{{ $uni->nombre }}</option>
                        		@endforeach
                        	</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 control-label">Precio de compra</label>
                        <div class="col-sm-12">
                        	<input type="decimal" min="1" pattern="^[0-9]+" class="form-control decimales" id="compra" name="compra" placeholder="Ingrese precio" value="" maxlength="50" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 control-label">Precio de venta</label>
                        <div class="col-sm-12">
                        	<input type="decimal" min="1" pattern="^[0-9]+" class="form-control decimales" id="venta" name="venta" placeholder="Ingrese precio" value="" maxlength="50" required>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

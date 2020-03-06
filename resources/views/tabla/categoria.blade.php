<table  class="table table-sm text-center" id="tabla_elementos">
    <thead class="thead-dark">
	<tr>
		<th>Nombre</th>
		<th>Orden</th>
		<th>Operaciones</th>
	</tr>
    </thead>
	@foreach($tabla as $fila)
		<tr>
			<td>{{ $fila->nombre }}</td>
			<td>{{ $fila->orden }}</td>
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
                        <label class="col-sm-2 control-label">Orden</label>
                        <div class="col-sm-12">
                        	<input type="number" min="1" pattern="^[0-9]+" class="form-control" id="orden" name="orden" placeholder="Ingrese numero" value="" maxlength="50" required>
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

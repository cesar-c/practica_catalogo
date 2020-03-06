<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		.table{
			width: 90%;
			text-align: center;
		}
		th, td {
		  	border-bottom: 2px solid #a4a691;
		  	padding: 8px;
				}
		th {
  			background-color: #4CAF50;
  			color: white;
		}
	</style>
</head>
<body>
	<h1>Lista de Productos</h1>
	<br>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th>Nombre</th>
				<th>Categoria</th>
				<th>Marca</th>
				<th>Unidad</th>
				<th>Precio de compra</th>
				<th>Precio de venta</th>
			</tr>
		</thead>
		<tbody>
		@foreach($object as $fila)
			<tr>
				<td>{{ $fila->nombre }}</td>
				<td>{{ $fila->categoria->nombre }}</td>
				<td>{{ $fila->marca->abreviatura }}</td>
				<td>{{ $fila->unidad->abreviatura }}</td>
				<td>{{ $fila->p_c }} $</td>
				<td>{{ $fila->p_v }} $</td>
			</tr>
		@endforeach
		</tbody>
	</table>

</body>
</html>
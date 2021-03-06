<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		.table{
			width: 70%;
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
	<h1>Lista de Marcas</h1>
	<br>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Abreviatura</th>
				<th>N° productos</th>
			</tr>
		</thead>
		<tbody>
		@foreach($object as $fila)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $fila->nombre }}</td>
				<td>{{ $fila->abreviatura }}</td>
				<td>{{ $fila->productos()->count() }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>

</body>
</html>
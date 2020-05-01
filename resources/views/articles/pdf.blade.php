<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Reporte en PDF Articles</title>
	<style>
		body {
			font-family: Helvetica;
		}
		table {
			border-collapse: collapse;
		}
		table th,
		table td {
			font-size: 14px !important;
		}
		table th {
			background-color: gray;
			color: white;
			text-align: center;
		}
		table td {
			border: 1px solid silver;
			padding: 10px;
		}
	</style>
</head>
<body>
	<table>
	<thead>
		<tr>
			<th> Id </th>
			<th> Nombre Articulo </th>
			<th> Descripción </th>
			<th> Usuario </th>
			<th> Categoria </th>
			<th> Imagen </th>
		</tr>
	</thead>
	@foreach($articles as $article)
		<tr>
			<td> {{ $article->id }} </td>
			<td> {{ $article->name }} </td>
			<td> {{ $article->description }} </td>
			@foreach($users as $user)
				@if ($article->user_id == $user->id)
					<td> {{ $user->fullname }} </td>
				@endif	
			@endforeach
			@foreach($categories as $category)
				@if ($article->category_id == $category->id)
					<td> {{ $category->name }} </td>				
				@endif
			@endforeach	
			<td> <img src="{{ public_path() . '/' . $article->image }}" width="40px"> </td>
		</tr>
	@endforeach
</table>
</body>
</html>
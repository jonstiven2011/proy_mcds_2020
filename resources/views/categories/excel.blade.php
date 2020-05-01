<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Reporte en PDF Categorias</title>
</head>
<body>
	<table>
        <thead>
            <tr>
                <th> Id </th>
                <th> Nombre Categoria </th>
                <th> Descripción </th>
                <th> Imagen </th>
            </tr>
        </thead>
	@foreach($categories as $category)
		<tr>
			<td> {{ $category->id }} </td>
			<td> {{ $category->name }} </td>
			<td> {{ $category->description }} </td>
            <td> <img src="{{ public_path() . '/' . $category->image }}" width="40px"> </td>
		</tr>
	@endforeach
</table>
</body>
</html>
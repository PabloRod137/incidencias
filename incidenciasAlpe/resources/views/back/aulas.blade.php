<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aulas - Academia Alpe</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Gestión de Aulas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ubicación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aulas as $aula)
            <tr>
                <td>{{ $aula->id }}</td>
                <td>{{ $aula->nombre }}</td>
                <td>{{ $aula->ubicacion }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

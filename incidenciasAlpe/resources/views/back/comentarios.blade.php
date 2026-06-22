<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comentarios - Academia Alpe</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Gestión de Comentarios</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Incidencia</th>
                <th>Autor</th>
                <th>Mensaje</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comentarios as $comentario)
            <tr>
                <td>{{ $comentario->id }}</td>
                <td>{{ $comentario->incidencia->titulo ?? 'N/A' }}</td>
                <td>{{ $comentario->user->name ?? 'Anónimo' }}</td>
                <td>{{ $comentario->mensaje }}</td>
                <td>{{ $comentario->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

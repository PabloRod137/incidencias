<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Incidencias - Academia Alpe</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .estado { font-weight: bold; text-transform: uppercase; font-size: 0.8em; }
    </style>
</head>
<body>

    <h1>Gestión de Incidencias - Academia Alpe</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Aula</th>
                <th>Categoría</th>
                <th>Creado por</th>
                <th>Prioridad</th>
                <th>Estado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($incidencias as $incidencia)
            <tr>
                <td>{{ $incidencia->id }}</td>
                <td><strong>{{ $incidencia->titulo }}</strong></td>
                <td>{{ $incidencia->aula->nombre ?? 'N/A' }}</td>
                <td>{{ $incidencia->categoria->nombre ?? 'N/A' }}</td>
                <td>{{ $incidencia->creator->name ?? 'Usuario borrado' }}</td>
                <td>{{ $incidencia->prioridad }}</td>
                <td><span class="estado">{{ $incidencia->estado }}</span></td>
                <td>{{ $incidencia->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($incidencias->isEmpty())
        <p>No hay incidencias registradas todavía.</p>
    @endif

</body>
</html>
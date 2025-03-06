<html xmlns:x="urn:schemas-microsoft-com:office:excel">';

<head>
    <meta charset="UTF-8">
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Numero</th>
                <th>nombre</th>
                <th>apellido</th>
                <th>email</th>
                <th>telefono</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $k => $v)
            <tr>
                <td>{{ $data[$k]->descripcion }}</td>
                <td>{{ $data[$k]->nombre }}</td>
                <td>{{ $data[$k]->apellido }}</td>
                <td>{{ $data[$k]->emailoculto }}</td>
                <td>{{ $data[$k]->telefonooculto }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
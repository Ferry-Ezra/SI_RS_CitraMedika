<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Tenaga Kesehatan</title>

    <style>
        body {
            box-sizing: border-box;
            font-size: 16px;
        }

        h1 {
            text-align: center;
        }

        table {
            box-sizing: border-box;
            border: 2px solid black;
            border-collapse: collapse;
            width: 100%;
        }

        thead {
            background-color: #3C91E6;
            color: white;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            text-align: left;
            padding: 10px;
        }

        .center {
            text-align: center;
        }

    </style>
</head>

<body>
    <h1>Data Tenaga Kesehatan</h1>
    <table align="center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Jenis Tenaga Kesehatan</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. Telp</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @forelse ($kesehatan as $data)
                <td>{{ $data->id }}</td>
                <td>{{ $data->jenis }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->telp }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" align="center">Tidak Ada Data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
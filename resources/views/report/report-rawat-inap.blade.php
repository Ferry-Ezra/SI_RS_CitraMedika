<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Rawat Inap</title>

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
    <h1>Data Rawat Inap</h1>
    <table align="center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Jenis Kamar</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Diagnosis</th>
                <th>Biaya</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @forelse ($rawat_inap as $data)
                <td>{{ $data->id }}</td>
                @foreach ($kamar as $item)
                <td>{{ $item->jenis }}</td>
                @endforeach
                <td>{{ $data->tanggal_masuk }}</td>
                <td>{{ $data->tanggal_keluar }}</td>
                <td>{{ $data->diagnosis }}</td>
                <td>{{ $data->biaya }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" align="center">Tidak Ada Data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>

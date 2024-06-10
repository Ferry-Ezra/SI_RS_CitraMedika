<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pemeriksaan Dokter</title>

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
    <h1>Data Pemeriksaan Dokter</h1>
    <table align="center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Dokter</th>
                <th>Nama Tenaga Kesehatan</th>
                <th>Nama Pasien</th>
                <th>Tanggal</th>
                <th>Diagnosa</th>
                <th>Perawatan ID</th>
                <th>Nama Obat</th>
                <th>Rencana</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @forelse ($pemeriksaan as $data)
                <td>{{ $data->id }}</td>
                @foreach ($dokter as $item)
                <td>{{ $item->nama }}</td>
                @endforeach
                @foreach ($tenagaKesehatan as $item)
                <td>{{ $item->nama }}</td>
                @endforeach
                @foreach ($pasien as $item)
                <td>{{ $item->nama }}</td>
                @endforeach
                <td>{{ $data->tanggal_pemeriksaan }}</td>
                <td>{{ $data->diagnosa }}</td>
                @foreach ($perawatan as $item)
                <td>{{ $item->id }}</td>
                @endforeach
                @foreach ($obat as $item)
                <td>{{ $item->nama }}</td>
                @endforeach
                <td>{{ $data->rencana_perawatan }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="9" align="center">Tidak Ada Data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>

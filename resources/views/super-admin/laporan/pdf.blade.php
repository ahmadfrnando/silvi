<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Aset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>{{ $nama_laporan }}</h2>
        <p>Tanggal: {{ $tanggal_mulai }} - {{ $tanggal_selesai }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Sumber Dana</th>
                <th>Nama Aset</th>
                <th>Kategori</th>
                <th>Jenis</th>
                <th>Merk</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $asset)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $asset->tanggal }}</td>
                <td>{{ $asset->sumber_aset }}</td>
                <td>{{ $asset->nama_aset }}</td>
                <td>{{ $asset->kategori }}</td>
                <td>{{ $asset->jenis }}</td>
                <td>{{ $asset->merk }}</td>
                <td>{{ $asset->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak pada: {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}</p>
    </div>
</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Aset</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Laporan Data Aset</h1>
    <span>Tanggal: {{ $tanggal_mulai }} - {{ $tanggal_selesai }}</span>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
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
                <td>{{ $asset->nama_aset }}</td>
                <td>{{ $asset->kategori }}</td>
                <td>{{ $asset->jenis }}</td>
                <td>{{ $asset->merk }}</td>
                <td>{{ $asset->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
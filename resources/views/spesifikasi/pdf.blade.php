<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Spesifikasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #333;
        }
        .header h2 {
            color: #555;
        }
        table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan untuk tampilan 3D */
    }
        table, th, td {
            border: 1px solid #ddd;
        }
        th {
            background-color: #007bff; /* Warna biru untuk header tabel */
            color: white;
            padding: 10px;
            text-align: center;
        }
        td {
            padding: 8px;
            text-align: center;
            color: #333; /* Warna teks isi tabel */
        }
        tr:nth-child(even) {
            background-color: #8FBC8F; /* Warna pink untuk baris genap */
        }
        tr:hover {
            background-color: #ddd; /* Warna saat baris dihover */
        }
        .action-buttons .edit {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            margin-right: 5px;
            cursor: pointer;
        }
        .action-buttons .delete {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2><center>Data Spesifikasi</center></h2>
    <h2><center>priode agustus 2024</center></h2>
    <table>
    

        <thead>
            <tr>
                <th>ID</th>
                <th>Brand</th>
                <th>Model</th>
                <th>RAM</th>
                <th>Processor</th>
                <th>Pixel Kamera</th>
                <th>Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($spesifikasis as $spesifikasi)
            <tr>
                <td>{{ $spesifikasi->id }}</td>
                <td>{{ $spesifikasi->brand }}</td>
                <td>{{ $spesifikasi->model }}</td>
                <td>{{ $spesifikasi->ram }}</td>
                <td>{{ $spesifikasi->processor }}</td>
                <td>{{ $spesifikasi->pixelkamera }}</td>
                <td>{{ $spesifikasi->transaksi ? $spesifikasi->transaksi->total : 'No Transaction' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

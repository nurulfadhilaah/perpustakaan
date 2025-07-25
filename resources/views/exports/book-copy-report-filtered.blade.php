<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Eksemplar Buku</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background-color: #f3f3f3; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Eksemplar Buku</h2>
    <p style="text-align: center;">Periode: {{ $startDate }} s.d {{ $endDate }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Total</th>
                <th>Tersedia</th>
                <th>Dipinjam</th>
                <th>Total Seluruh Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $i => $book)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td style="text-align: left;">{{ $book->judul_buku }}</td>
                    <td>{{ $book->total }}</td>
                    <td>{{ $book->tersedia_count }}</td>
                    <td>{{ $book->dipinjam_count }}</td>
                    <td>{{ $book->dikembalikan_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Perpustakaan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2>Laporan Peminjaman</h2>
    <p>Periode: {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loans as $loan)
            <tr>
                <td>{{ $loan->member->nama_anggota }}</td>
                <td>{{ $loan->book->judul_buku }}</td>
                <td>{{ $loan->tanggal_pinjam->format('d M Y') }}</td>
                <td>{{ $loan->tanggal_kembali->format('d M Y') }}</td>
                <td>{{ ucfirst($loan->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2 style="margin-top: 50px;">Laporan Pengembalian</h2>

    <table>
        <thead>
            <tr>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pengembalian</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($returns as $ret)
            <tr>
                <td>{{ $ret->loan->member->nama_anggota }}</td>
                <td>{{ $ret->loan->book->judul_buku }}</td>
                <td>{{ $ret->tanggal_pengembalian->format('d M Y') }}</td>
                <td>{{ ucfirst($ret->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

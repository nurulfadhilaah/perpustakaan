<x-filament::page>
    <form wire:submit.prevent="$refresh">
        {{ $this->form }}
        <x-filament::button type="submit">Tampilkan</x-filament::button>
    </form>


    @if($startDate && $endDate)
        <div class="mt-6">
            <h2 class="text-xl font-bold mb-4">Laporan Peminjaman</h2>
        <table class="table-auto w-full border mb-12">
            <thead style="background-color: #15803d; color: white;">
                <tr>
                    <th class="border px-4 py-2">Nama Anggota</th>
                    <th class="border px-4 py-2">Judul Buku</th>
                    <th class="border px-4 py-2">Tanggal Pinjam</th>
                    <th class="border px-4 py-2">Tanggal Kembali</th>
                    <th class="border px-4 py-2">Status</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($this->getLoanData() as $loan)
                        <tr>
                            <td class="border px-4 py-2">{{ $loan->member->nama_anggota }}</td>
                            <td class="border px-4 py-2">{{ $loan->book->judul_buku }}</td>
                            <td class="border px-4 py-2">{{ $loan->tanggal_pinjam->format('d M Y') }}</td>
                            <td class="border px-4 py-2">{{ $loan->tanggal_kembali->format('d M Y') }}</td>
                            <td class="border px-4 py-2">{{ ucfirst($loan->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="table-auto w-full border">
            <h2 class="text-xl font-bold mt-16 mb-4">Laporan Pengembalian</h2>
                <thead style="background-color: #15803d; color: white;">
                    <tr>
                        <th class="border px-4 py-2">Nama Anggota</th>
                        <th class="border px-4 py-2">Judul Buku</th>
                        <th class="border px-4 py-2">Tanggal Pengembalian</th>
                        <th class="border px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($this->getReturnData() as $ret)
                        <tr>
                            <td class="border px-4 py-2">{{ $ret->loan->member->nama_anggota }}</td>
                            <td class="border px-4 py-2">{{ $ret->loan->book->judul_buku }}</td>
                            <td class="border px-4 py-2">{{ $ret->tanggal_pengembalian->format('d M Y') }}</td>
                            <td class="border px-4 py-2">{{ ucfirst($ret->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <x-filament::button
                tag="a"
                href="{{ route('book-copies.export', ['startDate' => $startDate, 'endDate' => $endDate]) }}"
                target="_blank"
                color="primary">
                Cetak PDF
            </x-filament::button>

        </div>
    @endif
</x-filament::page>
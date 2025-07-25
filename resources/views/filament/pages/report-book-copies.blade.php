<x-filament::page>
    <form wire:submit.prevent="$refresh" class="space-y-4">
        {{ $this->form }}
        <x-filament::button type="submit">Tampilkan</x-filament::button>
    </form>

    @if ($startDate && $endDate)
        <div class="mt-8">
            <h2 class="text-xl font-bold mb-4">Laporan Eksemplar Buku</h2>

            <table class="w-full text-sm border">
                <thead style="background-color: #15803d; color: white;">
                    <tr>
                        <th class="border px-2 py-1">Judul Buku</th>
                        <th class="border px-2 py-1">Total</th>
                        <th class="border px-2 py-1">Tersedia</th>
                        <th class="border px-2 py-1">Dipinjam</th>
                        <th class="border px-2 py-1">Total Seluruh Pengembalian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->getFilteredBooks() as $book)
                    <tr>
                        <td class="border px-2 py-1">{{ $book->book->judul_buku }}</td>
                        <td class="border px-2 py-1">{{ $book->total }}</td>
                        <td class="border px-2 py-1">{{ $book->tersedia }}</td>
                        <td class="border px-2 py-1">{{ $book->dipinjam }}</td>
                        <td class="border px-2 py-1">{{ $book->dikembalikan }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <x-filament::button
                tag="a"
                color="primary"
                class="mt-4"
                target="_blank"
                href="{{ route('book-copies.export', ['startDate' => $startDate, 'endDate' => $endDate]) }}">
                Cetak PDF
            </x-filament::button>
        </div>
    @endif
</x-filament::page>

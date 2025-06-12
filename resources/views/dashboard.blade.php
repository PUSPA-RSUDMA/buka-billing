<x-layouts.app title="Dashboard" heading="Dashboard">

    <form action="" method="get" class="mb-4 grid grid-cols-1 gap-4 md:grid-cols-6 md:gap-2">
        <label class="floating-label">
            <input type="date" class="input input-sm" name="tanggal" value="{{ $filtered_date }}" onchange="this.form.submit()">
            <span>Tanggal</span>
        </label>

        <a href="{{ route('dashboard', ['tanggal' => '']) }}" class="btn btn-sm btn-outline">
            Semua tanggal
        </a>
    </form>

    <div class="grid gap-10 md:grid-cols-2">
        <!-- Aktifitas Card Section -->
        <div class="card gap-4 border p-4">
            <h3 class="text-lg"> Aktivitas </h3>
            <div class="grid grid-cols-3 gap-4">
                <a href="{{ route('permintaan.index', ['tanggal' => $filtered_date, 'status' => 'baru']) }}" wire:navigate>
                    <div class="flex flex-col items-center rounded-lg bg-red-50 p-4 shadow-sm">
                        <span class="text-sm text-gray-500">Baru</span>
                        <span class="text-2xl font-bold text-red-600">{{ $jumlah_aktivitas['baru'] }}</span>
                    </div>
                </a>
                <a href="{{ route('permintaan.index', ['tanggal' => $filtered_date, 'status' => 'proses']) }}" wire:navigate>
                    <div class="flex flex-col items-center rounded-lg bg-yellow-50 p-4 shadow-sm">
                        <span class="text-sm text-gray-500">Dibuka</span>
                        <span class="text-2xl font-bold text-yellow-600">{{ $jumlah_aktivitas['proses'] }}</span>
                    </div>
                </a>
            </div>
            <!-- Total Card Section -->
            <h3 class="text-lg"> Total Permintaan </h3>
            <div class="grid grid-cols-3 gap-4">
                @foreach ($alasans as $alasan)
                    <div class="flex flex-col items-center rounded-lg bg-blue-50 p-4 shadow-sm">
                        <span class="text-sm text-gray-500">{{ $alasan->label }}</span>
                        <span class="text-2xl font-bold text-blue-600">{{ $alasan->jumlah_permintaan }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Ruangan Table Section -->
        <div class="card gap-4 border pt-4">
            <h3 class="px-4 text-lg">Permintaan per Ruangan </h3>
            <div class="overflow-x-auto">
                <table class="table rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium uppercase text-gray-600">Ruangan</th>
                            <th class="px-4 py-2 text-left text-xs font-medium uppercase text-gray-600">Revisi</th>
                            <th class="px-4 py-2 text-left text-xs font-medium uppercase text-gray-600">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jumlah_permintaan_by_ruangan as $j)
                            <tr class="hover:bg-gray-100">
                                <td class="">{{ $j->ruangan }}</td>
                                <td class="">{{ $j->alasan }}</td>
                                <td class="">{{ $j->jumlah }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-gray-400">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>

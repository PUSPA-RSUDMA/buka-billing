<x-layouts.app title="Dashboard" heading="Dashboard">

    <div class="grid gap-10 md:grid-cols-2">

        <!-- Total Card Section -->
        <div class="card border p-4 gap-4">
            <h3 class="text-lg"> Total Permintaan </h3>
            <div class="grid gap-4 grid-cols-3">
                @foreach ($alasans as $alasan)
                    <div class="bg-blue-50 rounded-lg p-4 flex flex-col items-center shadow-sm">
                        <span class="text-sm text-gray-500">{{ $alasan->label }}</span>
                        <span class="text-2xl font-bold text-blue-600">{{ $alasan->jumlah_permintaan }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Ruangan Table Section -->
        <div class="card border pt-4 gap-4">
            <h3 class="text-lg px-4">Permintaan per Ruangan </h3>
            <div class="overflow-x-auto">
                <table class="table rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Ruangan</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Revisi</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Jumlah</th>
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
                                <td colspan="3" class=" text-center text-gray-400">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>

<x-layouts.app title="Dashboard" heading="Dashboard">

    <div class="grid gap-8">

        <div>
            <h3>Jumlah Semua Ruangan</h3>
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">

                @foreach ($alasans as $alasan)
                    <div class="card border">
                        <div class="card-body">
                            {{ $alasan->label }}
                            {{ $alasan->jumlah_permintaan }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <h3>Jumlah berdasarkan Ruangan</h3>
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                @foreach ($alasans as $alasan)
                    <div class="card border">
                        <div class="card-body">
                            {{ $alasan->label }}
                            {{ $alasan->jumlah_permintaan }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>

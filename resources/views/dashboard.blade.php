<x-layouts.app title="Dashboard" heading="Dashboard" >

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
</x-layouts.app>

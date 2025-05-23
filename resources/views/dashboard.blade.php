<x-layouts.app title="Dashboard" heading="Dashboard">

    <div class="grid gap-8">

        <div>
            <h3>Total</h3>
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
            <h3>Ruangan</h3>
            <div class="grid gap-4">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Ruangan</th>
                            <th>Revisi</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jumlah_permintaan_by_ruangan as $j)
                            <tr>
                                <td>{{$j->ruangan}}</td>
                                <td>{{$j->alasan}}</td>
                                <td>{{$j->jumlah}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>

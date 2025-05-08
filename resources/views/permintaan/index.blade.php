<x-layouts.app title="Permintaan" heading="Permintaan" subheading="Daftar permintaan perubahan">
    <div class="flex flex-col gap-4">
        <div class="flex justify-end">
            <a href="{{ route('permintaan.create') }}" class="btn btn-sm btn-primary">Tambah Permintaan</a>
        </div>
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                    <table class="table">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th class="w-4">No</th>
                          <th class="w-1/2">Perubahan</th>
                          <th>Alasan perubahan</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($permintaans as $permintaan)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{!! $permintaan->perubahan !!}</td>
                                <td>{{ $permintaan->alasan->label }}</td>
                                <td>
                                    @if ($permintaan->status == 'baru')
                                        <div class="badge badge-secondary">{{ $permintaan->status }}</div>
                                    @elseif($permintaan->status == 'warning')
                                        <div class="badge badge-secondary">{{ $permintaan->status }}</div>
                                    @else
                                        <div class="badge badge-secondary">{{ $permintaan->status }}</div>
                                    @endif

                                </td>
                                <td><a href="{{ route('permintaan.index') }}" class="btn btn-sm btn-error">Hapus</a></td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
</x-layouts.app>

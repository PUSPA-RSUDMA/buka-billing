<x-layouts.app title="Permintaan" heading="Permintaan" subheading="Daftar permintaan perubahan">
    <div class="flex flex-col gap-4">
        <div class="flex justify-end">
            <a href="{{ route('permintaan.create') }}" class="btn btn-sm btn-primary">Tambah Permintaan</a>
        </div>
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                    <table class="table table-sm">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th class="w-4">No</th>
                          <th>No Register</th>
                          <th>Alasan perubahan</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($permintaans as $index => $permintaan)
                            <tr>
                                <th>{{ $permintaans->firstItem() + $index }}</th>
                                <td>{{ $permintaan->no_register }}</td>
                                <td>{{ $permintaan->alasan->label }}</td>
                                <td>
                                    @if ($permintaan->status == 'baru')
                                        <a class="btn btn-outline btn-xs btn-secondary" onclick="my_modal_2.showModal()">{{ $permintaan->status }}</a>
                                    @elseif($permintaan->status == 'proses')
                                        <a class="btn btn-outline btn-xs btn-warning" onclick="my_modal_2.showModal()">{{ $permintaan->status }}</a>
                                    @else
                                        <a class="btn btn-outline btn-xs btn-success" onclick="my_modal_2.showModal()" data-status="{{ $permintaan->status }}" data-perubahan="{{ $permintaan->perubahan }}">{{ $permintaan->status }}</a>
                                    @endif
                                </td>
                                <td><a href="{{ route('permintaan.index') }}" class="btn btn-sm btn-error">Hapus</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                  </div>
                  <div class="mt-4">
                    {{ $permintaans->links() }}
                </div>
            </div>
        </div>
    </div>
    <dialog id="my_modal_2" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Hello!</h3>
            <p class="py-4">Press ESC key or click outside to close</p>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
</x-layouts.app>

<x-layouts.app title="Permintaan" heading="Permintaan" subheading="Daftar permintaan perubahan">
    <div class="flex flex-col gap-4">
        <div class="flex flex-col md:flex-row justify-between gap-4">
            <form action="" method="get" class="gap-4 grid grid-cols-2 md:grid-cols-6">
                <select name="alasan_id" class="select" onchange="this.form.submit()">
                    <option value="">Semua Revisi</option>
                    @foreach ($alasans as $alasan)
                        <option value="{{ $alasan->id }}" @selected(request('alasan_id') == $alasan->id)>{{ $alasan->label }}</option>
                    @endforeach
                </select>
                <select name="status" class="select" onchange="this.form.submit()">
                    <option value="">Semua Status</option>
                    <option value="baru" @selected(request('status') == 'baru')>Baru</option>
                    <option value="selesai" @selected(request('status') == 'selesai')>Selesai</option>
                </select>
                {{-- <button type="submit" class="btn btn-square btn-primary"><i class="ti ti-search text-xl"></i></button> --}}
            </form>
            <div class="justify-end card-actions">
                <a href="{{ route('permintaan.create') }}" class="btn btn-square btn-primary"> <i
                        class="ti ti-plus text-xl"></i></a>
            </div>
        </div>
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                    <table class="table table-sm">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th class="w-4">No</th>
                                <th>User</th>
                                <th>No Register</th>
                                <th>Revisi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permintaans as $index => $permintaan)
                                <tr>
                                    <th>{{ $permintaans->firstItem() + $index }}</th>
                                    <td>{{ $permintaan->user->name }}</td>
                                    <td>{{ $permintaan->no_register }}</td>
                                    <td>{{ $permintaan->alasan->label }}</td>
                                    <td>
                                        @php
                                            $btnClass = match ($permintaan->status) {
                                                'baru' => 'btn-secondary',
                                                'proses' => 'btn-warning',
                                                default => 'btn-success',
                                            };
                                        @endphp

                                        <a class="btn btn-outline btn-xs {{ $btnClass }}" onclick="openModal(this)"
                                            data-id="{{ $permintaan->id }}" data-status="{{ $permintaan->status }}"
                                            data-perubahan="{{ $permintaan->perubahan }}">
                                            {{ $permintaan->status }}
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('permintaan.destroy', $permintaan->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus permintaan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs btn-error">Hapus</button>
                                        </form>
                                    </td>
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
            <h3 class="text-lg font-bold">Detail Permintaan</h3>
            <p class="py-2"><strong>Status:</strong> <span id="modal-status"></span></p>
            <p class="py-2"><strong>Perubahan:</strong></p>
            <div id="modal-perubahan" class="bg-base-200 p-2 rounded text-sm"></div>
            <div class="modal-action">
                <form id="form-selesai" method="POST"
                    action="{{ route('permintaan.selesai', ['id' => 'ID_PLACEHOLDER']) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="input-id">
                    <button class="btn btn-sm btn-success" type="submit" id="btn-selesai">Selesai</button>
                    <button type="button" class="btn btn-sm" onclick="my_modal_2.close()">Tutup</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    <script>
        function openModal(button) {
            const status = button.getAttribute('data-status');
            const perubahan = button.getAttribute('data-perubahan');
            const id = button.getAttribute('data-id');

            document.getElementById('modal-status').textContent = status;
            document.getElementById('modal-perubahan').innerHTML = perubahan;

            if (status === 'selesai') {
                document.getElementById('btn-selesai').style.display = "none";
            }else{
                document.getElementById('btn-selesai').style.display = 'inline';
                document.getElementById('input-id').value = id;

                const formAction = '{{ route('permintaan.selesai', ['id' => '__ID__']) }}';
                document.getElementById('form-selesai').action = formAction.replace('__ID__', id);

            }

            my_modal_2.showModal();
        }
    </script>
</x-layouts.app>

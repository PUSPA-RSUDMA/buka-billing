<x-layouts.app title="Permintaan" heading="Permintaan" subheading="Daftar permintaan perubahan">

    <div class="flex flex-col gap-4">
        <div class="flex flex-col justify-between gap-4 md:flex-row">
            <form action="" method="get" class="grid grid-cols-2 gap-4 md:grid-cols-6">
                <label class="floating-label">
                    <input type="date" class="input input-sm" name="tanggal" value="{{ request('tanggal') }}" onchange="this.form.submit()">
                    <span>Tanggal</span>
                </label>
                <label class="floating-label">
                    <select name="processed_by" class="select input-sm" onchange="this.form.submit()">
                        <option value="">Semua IT</option>
                        @foreach ($admins as $admin)
                            <option value="{{ $admin->id }}" @selected(request('processed_by') == $admin->id)>{{ $admin->name }}</option>
                        @endforeach
                    </select>
                    <span>IT</span>
                </label>
                <label class="floating-label">
                    <select name="alasan_id" class="select input-sm" onchange="this.form.submit()">
                        <option value="">Semua Revisi</option>
                        @foreach ($alasans as $alasan)
                            <option value="{{ $alasan->id }}" @selected(request('alasan_id') == $alasan->id)>{{ $alasan->label }}</option>
                        @endforeach
                    </select>
                    <span>Revisi</span>
                </label>
                <label class="floating-label">
                    <select name="status" class="select input-sm" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="baru" @selected(request('status') == 'baru')>Baru</option>
                        <option value="proses" @selected(request('status') == 'proses')>Sudah Dibuka</option>
                        <option value="selesai" @selected(request('status') == 'selesai')>Selesai</option>
                    </select>
                    <span>Status</span>
                </label>

                {{-- <button type="submit" class="btn btn-square btn-primary"><i class="ti ti-search text-xl"></i></button> --}}
            </form>
            <div class="card-actions justify-end">
                <a href="{{ route('permintaan.create') }}" class="btn btn-square btn-primary" wire:navigate> <i class="ti ti-plus text-xl"></i></a>
            </div>
        </div>

        <div class="card border">
            <div class="card-body p-0">
                <div class="overflow-x-auto rounded-lg">
                    <table class="table table-sm border-b">
                        <thead>
                            <tr class="bg-base-200">
                                <th class="w-4">No</th>
                                <th>Tanggal</th>
                                <th>User</th>
                                <th>No Register</th>
                                <th>Revisi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permintaans as $index => $permintaan)
                                <tr class="hover:bg-gray-50">
                                    <td>{{ $permintaans->firstItem() + $index }}</td>
                                    <td>{{ $permintaan->created_at }}</td>
                                    <td>{{ $permintaan->user->name }}</td>
                                    <td>{{ $permintaan->no_register }}</td>
                                    <td>{{ $permintaan->alasan->label }}</td>
                                    <td>
                                        @php
                                            $btnClass = match ($permintaan->status) {
                                                'baru' => 'btn-info',
                                                'proses' => 'btn-warning',
                                                default => 'btn-success',
                                            };
                                        @endphp

                                        <a class="btn btn-soft btn-sm {{ $btnClass }} cursor-pointer" onclick="openModal(this)" data-id="{{ $permintaan->id }}" data-status="{{ $permintaan->status }}" data-tanggal="{{ $permintaan->created_at }}" data-perubahan="{{ $permintaan->perubahan }}">
                                            {{ $permintaan->status_label }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($permintaan->status == 'baru')
                                            <form action="{{ route('permintaan.destroy', $permintaan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus permintaan ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-soft btn-sm btn-error">Hapus</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-2 px-3">
                    {{ $permintaans->links() }}
                </div>
            </div>
        </div>
    </div>

    <dialog id="my_modal_2" class="modal">
        <div class="modal-box">
            <div class="text-lg font-bold mb-2">Perubahan
                <div class="badge badge-soft badge-primary uppercase text-xs" id="label-status"></div>
            </div>
            <div id="label-tanggal" class="bg-base-200 rounded p-2 text-sm"></div>
            <div id="label-perubahan" class="bg-base-200 rounded p-2 text-sm"></div>
            <div class="modal-action">
                <form id="form-selesai" method="POST" action="{{ route('permintaan.selesai', ['permintaan' => 'ID_PLACEHOLDER']) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="input-id">

                    <button class="btn btn-success" type="submit" id="btn-selesai"></button>
                    <button type="button" class="btn" onclick="my_modal_2.close()">Kembali</button>
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
            const tanggal = button.getAttribute('data-tanggal');
            const perubahan = button.getAttribute('data-perubahan');
            const id = button.getAttribute('data-id');

            document.getElementById('label-status').textContent = status;
            document.getElementById('label-perubahan').innerHTML = perubahan;
            document.getElementById('label-tanggal').innerHTML = tanggal;

            var btn_label = (status == 'baru' ? 'Buka Billing' : 'Tutup Billing')

            if (status === 'selesai') {
                document.getElementById('btn-selesai').style.display = "none";
            } else {
                document.getElementById('btn-selesai').style.display = 'inline';
                document.getElementById('btn-selesai').innerHTML = btn_label;
                document.getElementById('input-id').value = id;

                const formAction = '{{ route('permintaan.selesai', ['permintaan' => '__ID__']) }}';
                document.getElementById('form-selesai').action = formAction.replace('__ID__', id);

            }

            my_modal_2.showModal();
        }
    </script>
</x-layouts.app>

<x-layouts.app title="Permintaan" heading="Permintaan" subheading="Tambah permintaan perubahan baru">

    <div class="card border lg:w-1/2">
        <div class="card-body">
            <h2 class="card-title">Form</h2>
            <form action="{{ route('permintaan.store') }}" method="POST" class="form">
                @csrf
                <div>
                    <label class="input-label">No Register</label>
                    <input type="text" name="no_register" class="input" value="{{ old('no_register') }}" required />
                    <flux:error name="no_register" />
                </div>

                <div>
                    <label class="input-label">Perubahan</label>
                    <textarea name="perubahan" class="textarea" rows="5" placeholder="Buka tindakan ganti ke 2025-04-01" required>Buka __ ubah tgl ke __
                    </textarea>
                    <flux:error name="perubahan" />
                </div>

                <div>
                    <label class="input-label">Revisi Oleh</label>
                    <div class="flex flex-col gap-1">
                        @foreach ($alasans as $alasan)
                            <label class="flex items-center gap-1 cursor-pointer">
                                <input type="radio" name="alasan_id" class="radio radio-sm"
                                    value="{{ $alasan->id }}" checked required />
                                <span class="text-sm ">{{ $alasan->label }}</span>
                            </label>
                        @endforeach
                    </div>
                    <flux:error name="alasan_id" />
                </div>

                @role('admin')
                    <div>
                        <label class="input-label">Operator</label>
                        <select name="created_by" id="" class="select" required>
                            <option value="">Pilih</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endrole




                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>

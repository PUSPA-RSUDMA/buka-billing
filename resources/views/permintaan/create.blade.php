<x-layouts.app title="Permintaan" heading="Permintaan" subheading="Tambah permintaan perubahan baru">
    <div class="flex flex-col gap-4">
        <div class="flex justify-end">
            <a href="{{ route('permintaan.index') }}" class="btn btn-sm">Kembali</a>
        </div>
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <form action="{{ route('permintaan.store') }}" method="POST">
                    @csrf
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">No Register</legend>
                        <input type="text" name="no_register" class="input"/>
                        <flux:error name="no_register" />
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Perubahan</legend>
                        <textarea id="perubahan" name="perubahan"></textarea>
                        <flux:error name="perubahan" />
                    </fieldset>

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Alasan</legend>
                        <select class="select" name="alasan_id" required>
                            <option disabled selected>Pilih</option>
                            @foreach ($alasans as $alasan)
                                <option value="{{ $alasan->id }}">{{ $alasan->label }}</option>
                            @endforeach
                        </select>
                        <flux:error name="alasan_id" />
                    </fieldset>

                    <div class="flex justify-end mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#perubahan'), {
                toolbar: [
                    'undo',
                    'redo'
                ]
            })
            .then(editor => {
                editor.setData(`
                    <p>Tindakan : </p>
                    <p>Farmasi : </p>
                    <p>Askep : </p>
                    <p>Radiologi : </p>
                    <p>Lab : </p>
                    <p>Lainnya : </p>
                `);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</x-layouts.app>

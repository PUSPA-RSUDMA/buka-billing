<x-layouts.app title="Permintaan" heading="Tambah Permintaan" subheading="Tambah permintaan perubahan">
    <div class="flex flex-col gap-4">
        <div class="flex justify-end">
            <a href="{{ route('permintaan.index') }}" class="btn btn-sm btn-error">Kembali</a>
        </div>
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <form action="{{ route('permintaan.store') }}" method="POST">
                    @csrf
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Permintaan perubahan</legend>
                        <textarea id="perubahan" name="perubahan"></textarea>
                    </fieldset>

                    <fieldset class="fieldset w-full">
                        <legend class="fieldset-legend">Alasan perubahan</legend>
                        <select class="select w-full" name="alasan_id" required>
                            <option disabled selected>Pilih</option>
                            @foreach ($alasans as $alasan)
                                <option value="{{ $alasan->id }}">{{ $alasan->label }}</option>
                            @endforeach
                        </select>
                    </fieldset>

                    <div class="flex justify-end mt-4">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#perubahan'))
            .then(editor => {
                // Set content with newlines in CKEditor
                editor.setData(`
                    <p><b>No Register : </b></p>
                    <p></p>
                    <p>Tindakan : </p>
                    <p>Farmasi : </p>
                    <p>Askep : </p>
                    <p>Ambulan : </p>
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

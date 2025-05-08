<x-layouts.app title="Permintaan" heading="Permintaan" subheading="Tambah permintaan perubahan baru">
    <div class="flex flex-col gap-4">
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
                        <legend class="fieldset-legend">Revisi Oleh</legend>
                        <div class="flex flex-col gap-1">
                            @foreach ($alasans as $alasan)
                            <label class="flex items-center gap-1 cursor-pointer">
                                <input type="radio" name="alasan_id" class="radio radio-xs" value="{{ $alasan->id }}" />
                                <span class="label-text">{{ $alasan->label }}</span>
                            </label>
                            @endforeach
                        </div>
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

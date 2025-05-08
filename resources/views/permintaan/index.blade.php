<x-layouts.app title="Permintaan" heading="Permintaan" subheading="Daftar permintaan perubahan">
    <div class="flex flex-col gap-4">
        <div class="flex justify-end">
            <a href="{{ route('permintaan.create') }}" class="btn btn-sm btn-primary">Tambah Permintaan</a>
        </div>
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
                <div class="justify-end card-actions">
                    <!-- Aksi tambahan -->
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

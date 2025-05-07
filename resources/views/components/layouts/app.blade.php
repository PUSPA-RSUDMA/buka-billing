<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
        <flux:heading size="xl" level="1" class="mb-8 mt-2 ">{{ $heading }}</flux:heading>
        {{ $slot }}
    </flux:main>
</x-layouts.app.sidebar>

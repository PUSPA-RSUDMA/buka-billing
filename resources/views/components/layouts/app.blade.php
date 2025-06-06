@props([
    'heading' => null,
    'subheading' => null,
])

<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
        @if ($heading)
            <div class="relative mb-6 w-full">
                <flux:heading size="xl" class="text-xl" level="1">{{ $heading }}</flux:heading>
                @if ($subheading)
                    <flux:subheading size="lg">{{ $subheading }}</flux:subheading>
                @endif
                {{-- <flux:separator variant="subtle" class="mt-6" /> --}}
            </div>
        @endif

        {{ $slot }}

        {{ $scripts ?? '' }}
    </flux:main>
</x-layouts.app.sidebar>

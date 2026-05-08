<div>
    @props([
        'name',
        'mode' => '',
        'title' => '',
        'badge' => '',
        'description' => '',
        'maxWidth' => '2xl',
        'color' => '',
        'klik' => '',
        'warnaNama' => '',
        'warnaLabel' => '',
    ])

    <flux:modal :dismissible="false" :name="$name" class="w-full max-w-{{ $maxWidth }}">
        <div class="space-y-6">
            @if ($title || $description)
                <div>
                    @if ($title)
                        <flux:heading size="lg">
                            {{ $title }}
                            <flux:badge color="amber" inset="top bottom">{{ __('Ubah') }}</flux:badge>
                        </flux:heading>
                    @endif

                    @if ($description)
                        <flux:text class="mt-2">{{ $description }}</flux:text>
                    @endif
                </div>
            @endif

            {{ $slot }}
            <div class="flex">
                <flux:spacer />
                <flux:button wire:click="{{ $klik }}" type="submit" variant="primary" color="amber">
                    Ubah
                </flux:button>
            </div>
            {{-- <div class="flex">
                <flux:spacer />
                @if ($mode === 'tambah')
                    <flux:button wire:click="{{ $klik }}" type="submit" variant="primary">
                        Simpan
                    </flux:button>
                @elseif ($mode === 'ubah')
                    <flux:button wire:click="{{ $klik }}" type="submit" variant="primary" color="amber">
                        Ubah
                    </flux:button>
                @elseif ($mode === 'hapus')
                    <flux:button wire:click="{{ $klik }}" type="submit" variant="danger">
                        Hapus
                    </flux:button>
                @elseif ($mode === 'import')
                    <flux:button wire:click="{{ $klik }}" type="submit" variant="primary" color="indigo">
                        Import
                    </flux:button>
                @endif

            </div> --}}
        </div>
    </flux:modal>
</div>

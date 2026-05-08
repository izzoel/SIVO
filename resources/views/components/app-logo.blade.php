@props ([
    'sidebar' => false,
])

@if ($sidebar)
    <flux:sidebar.brand name="Depository Lab" {{ $attributes }}>
        {{-- <x-slot name="logo" class="flex aspect-square size-10 items-center justify-center rounded-md text-accent-foreground"> --}}
        {{-- <x-app-logo-icon class="size-5 fill-current text-white dark:text-black" /> --}}
        {{-- </x-slot> --}}
        {{-- <x-app-logo-icon class="size-5 fill-current text-white dark:text-black" /> --}}
        {{-- </flux:sidebar.brand> --}}
        {{-- <flux:sidebar.brand name="Depository Lab"> --}}
        {{-- <x-slot name="logo"> --}}
        <x-app-logo-icon class="size-5 fill-current text-white dark:text-black" />
        {{-- </x-slot> --}}
    </flux:sidebar.brand>
@else
    <flux:brand name="Depository Lab" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-8 items-center justify-center rounded-md bg-accent-content text-accent-foreground">
            <x-app-logo-icon class="size-5 fill-current text-white dark:text-black" />
        </x-slot>
    </flux:brand>
@endif

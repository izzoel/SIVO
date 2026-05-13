<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class ([
    'dark' => auth()->user()?->theme === 'dark',
    'theme-green' => auth()->user()?->theme === 'green',
])>
<head>
    @include ('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar
        sticky
        collapsible="mobile"
        class="border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900"
        x-data="{
            sidebarSearch: '',
            matches(text) {
                return this.sidebarSearch.trim() === '' || text.toLowerCase().includes(this.sidebarSearch.trim().toLowerCase());
            },
            hasResults() {
                return ['dashboard', 'persediaan alat cair gas padat', 'laporan kerusakan alat', 'settings laboratorium satuan', 'akun profile security appearance', 'help'].some(
                    (item) => this.matches(item),
                );
            },
        }"
    >
        <flux:sidebar.header>
            <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
            <flux:sidebar.collapse class="lg:hidden" />
        </flux:sidebar.header>

        <div>
            <flux:input x-model="sidebarSearch" wire:model.live.debounce.300ms="search" icon="magnifying-glass" placeholder="cari menu ..." />
        </div>

        <flux:sidebar.nav class="space-y-2">
            <flux:sidebar.item x-show="matches('dashboard')" wire:navigate icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </flux:sidebar.item>

            <flux:sidebar.group x-show="matches('persediaan alat cair gas padat')" expandable heading="{{ __('Persediaan') }}" class="grid">
                <flux:sidebar.item
                    x-show="matches('persediaan alat')"
                    wire:navigate
                    icon="wrench-screwdriver"
                    :href="route('persediaan.alat')"
                    :current="request()->routeIs('persediaan.alat')"
                >
                    {{ __('Alat') }}
                </flux:sidebar.item>
                <flux:sidebar.item
                    x-show="matches('persediaan cair bahan cair')"
                    wire:navigate
                    icon="beaker"
                    :href="route('persediaan.cair')"
                    :current="request()->routeIs('persediaan.cair')"
                >
                    {{ __('Cair') }}
                </flux:sidebar.item>
                <flux:sidebar.item x-show="matches('persediaan gas')" wire:navigate icon="cloud" :href="route('persediaan.gas')" :current="request()->routeIs('persediaan.gas')">
                    {{ __('Gas') }}
                </flux:sidebar.item>
                <flux:sidebar.item
                    x-show="matches('persediaan padat bahan padat')"
                    wire:navigate
                    icon="archive-box"
                    :href="route('persediaan.padat')"
                    :current="request()->routeIs('persediaan.padat')"
                >
                    {{ __('Padat') }}
                </flux:sidebar.item>
            </flux:sidebar.group>

            <flux:sidebar.group x-show="matches('laporan kerusakan alat')" expandable heading="{{ __('Laporan') }}" class="grid">
                <flux:sidebar.item
                    x-show="matches('laporan kerusakan alat')"
                    wire:navigate
                    icon="exclamation-triangle"
                    :href="route('laporan.kerusakan')"
                    :current="request()->routeIs('laporan.kerusakan')"
                >
                    {{ __('Kerusakan Alat') }}
                </flux:sidebar.item>
            </flux:sidebar.group>

            <flux:sidebar.group x-show="matches('settings laboratorium satuan')" expandable heading="{{ __('Settings') }}" class="grid">
                <flux:sidebar.item
                    x-show="matches('settings laboratorium lab')"
                    wire:navigate
                    icon="home-modern"
                    :href="route('setting.laboratorium')"
                    :current="request()->routeIs('setting.laboratorium')"
                >
                    {{ __('Laboratorium') }}
                </flux:sidebar.item>
                <flux:sidebar.item x-show="matches('settings satuan')" wire:navigate icon="tag" :href="route('setting.satuan')" :current="request()->routeIs('setting.satuan')">
                    {{ __('Satuan') }}
                </flux:sidebar.item>
            </flux:sidebar.group>

            <flux:sidebar.group x-show="matches('akun profile security appearance')" expandable heading="{{ __('Akun') }}" class="grid">
                <flux:sidebar.item x-show="matches('akun profile profil')" wire:navigate icon="user" :href="route('profile.edit')" :current="request()->routeIs('profile.edit')">
                    {{ __('Profile') }}
                </flux:sidebar.item>
                <flux:sidebar.item
                    x-show="matches('akun security keamanan')"
                    wire:navigate
                    icon="shield-check"
                    :href="route('security.edit')"
                    :current="request()->routeIs('security.edit')"
                >
                    {{ __('Security') }}
                </flux:sidebar.item>
                <flux:sidebar.item
                    x-show="matches('akun appearance tampilan')"
                    wire:navigate
                    icon="swatch"
                    :href="route('appearance.edit')"
                    :current="request()->routeIs('appearance.edit')"
                >
                    {{ __('Appearance') }}
                </flux:sidebar.item>
            </flux:sidebar.group>

            <div x-show="!hasResults()" class="px-3 py-4 text-sm text-zinc-500 dark:text-zinc-400">{{ __('Menu tidak ditemukan.') }}</div>
        </flux:sidebar.nav>

        <flux:sidebar.spacer />

        <flux:sidebar.nav>
            <flux:sidebar.item x-show="matches('help bantuan')" icon="information-circle" href="#"> {{ __('Help') }} </flux:sidebar.item>
        </flux:sidebar.nav>
    </flux:sidebar>

    <flux:header class="block! border-b border-zinc-200 bg-white dark:border-zinc-700 dark:bg-zinc-900 lg:bg-zinc-50">
        <flux:navbar scrollable>
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
            <flux:navbar.item :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate> {{ __('Dashboard') }} </flux:navbar.item>
            <flux:navbar.item :href="route('persediaan.alat')" :current="request()->routeIs('persediaan.*')" wire:navigate> {{ __('Persediaan') }} </flux:navbar.item>
            <flux:navbar.item :href="route('laporan.kerusakan')" :current="request()->routeIs('laporan.*')" wire:navigate> {{ __('Laporan') }} </flux:navbar.item>
            <flux:navbar.item :href="route('setting.laboratorium')" :current="request()->routeIs('setting.*')" wire:navigate> {{ __('Settings') }} </flux:navbar.item>
            <flux:navbar.item
                :href="route('profile.edit')"
                :current="request()->routeIs('profile.edit') || request()->routeIs('security.edit') || request()->routeIs('appearance.edit')"
                wire:navigate
            >
                {{ __('Akun') }}
            </flux:navbar.item>

            <flux:spacer />

            <livewire:components::notification />

            <flux:dropdown position="top" align="start">
                <flux:profile :initials="auth()->user()->initials()" />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <flux:avatar :name="auth()->user()->name" :initials="auth()->user()->initials()" />

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.item :href="route('profile.edit')" icon="user" wire:navigate> {{ __('Profile') }} </flux:menu.item>
                    <flux:menu.item :href="route('security.edit')" icon="shield-check" wire:navigate> {{ __('Security') }} </flux:menu.item>
                    <flux:menu.item :href="route('appearance.edit')" icon="swatch" wire:navigate> {{ __('Appearance') }} </flux:menu.item>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full cursor-pointer" data-test="logout-button">
                            {{ __('Log out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:navbar>
    </flux:header>

    {{ $slot }}

    @persist ('toast')
        <flux:toast.group>
            <flux:toast />
        </flux:toast.group>
    @endpersist

    @fluxScripts
</body>
</html>

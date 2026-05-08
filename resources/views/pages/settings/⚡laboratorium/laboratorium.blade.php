<div class="space-y-6">
    <x-pages-navbar>
        <flux:breadcrumbs.item :href="route('setting.satuan')"> {{ __('Setting') }} </flux:breadcrumbs.item>

        <flux:breadcrumbs.item :href="route('setting.laboratorium')" :current="request()->routeIs('setting.laboratorium')"> {{ __('Laboratorium') }} </flux:breadcrumbs.item>
    </x-pages-navbar>

    <div class="space-y-2">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <flux:heading class="mb-0!" size="xl">{{ __('Laboratorium') }}</flux:heading>
            </div>
        </div>

        <flux:text class="text-zinc-600 dark:text-zinc-400"> {{ __('Data laboratorium') }} </flux:text>

        <div class="rounded-xl border border-zinc-200 bg-white p-4 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-1">
                    <flux:select wire:model.live="filterGedung" variant="listbox">
                        <flux:select.option value="">Semua</flux:select.option>
                        @foreach ($this->gedungs as $gedung)
                            <flux:select.option value="{{ $gedung }}">{{ $gedung }}</flux:select.option>
                        @endforeach
                    </flux:select>
                </div>
                <div class="col-span-3">
                    <flux:input wire:model.live.debounce.300ms="search" icon="magnifying-glass" placeholder="ketik sesuatu..." />
                </div>
            </div>

            <div class="overflow-x-auto mt-3">
                <flux:table :paginate="$this->laboratoriums">
                    <flux:table.columns>
                        <flux:table.column sortable :sorted="$sortBy === 'nama'" :direction="$sortDirection" wire:click="sort('nama')">{{ __('Nama') }}</flux:table.column>
                        <flux:table.column sortable :sorted="$sortBy === 'gedung'" :direction="$sortDirection" wire:click="sort('gedung')">{{ __('Gedung') }}</flux:table.column>
                        <flux:table.column>{{ __('Warna') }}</flux:table.column>
                        <flux:table.column class="w-px whitespace-nowrap"></flux:table.column>
                    </flux:table.columns>
                    <flux:table.rows>
                        @forelse ($this->laboratoriums as $laboratorium)
                            <flux:table.row :key="$laboratorium->id">
                                <flux:table.cell class="whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium"
                                        style="background-color: {{ $laboratorium->warna ?? '#f59e0b' }}; color: {{ \App\Support\ColorHelper::textColorForBackground($laboratorium->warna ?? '#f59e0b') }}"
                                    >
                                        {{ $laboratorium->nama ?? '-' }}
                                    </span>
                                </flux:table.cell>
                                <flux:table.cell>{{ $laboratorium->gedung }}</flux:table.cell>
                                <flux:table.cell>
                                    <div class="flex gap-2">
                                        <span class="size-8 rounded-full border" style="background-color: {{ $laboratorium->warna }}"></span>
                                    </div>
                                </flux:table.cell>
                                <flux:table.cell>
                                    <flux:dropdown position="bottom" align="end">
                                        <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom" />
                                        <flux:menu>
                                            <flux:menu.item wire:click="modalUbah({{ $laboratorium->id }})" icon="pencil-square"> Edit </flux:menu.item>
                                        </flux:menu>
                                    </flux:dropdown>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-6 text-center text-zinc-500">Belum ada data laboratorium.</td>
                            </tr>
                        @endforelse
                    </flux:table.rows>
                </flux:table>
            </div>
        </div>
    </div>

    <div class="space-y-2 mt-10">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <flux:heading class="mb-0!" size="xl">{{ __('Lokasi Penyimpanan') }}</flux:heading>
            </div>
        </div>

        <flux:text class="text-zinc-600 dark:text-zinc-400"> {{ __('Data lokasi penyimpanan') }} </flux:text>

        <div class="rounded-xl border border-zinc-200 bg-white p-4 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-1">
                    <flux:select wire:model.live="filterLaboratorium" variant="listbox">
                        <flux:select.option value="">Semua</flux:select.option>
                        @foreach ($this->laboratoriums as $laboratorium)
                            <flux:select.option value="{{ $laboratorium->id }}">{{ $laboratorium->nama }}</flux:select.option>
                        @endforeach
                    </flux:select>
                </div>
                <div class="col-span-3">
                    <flux:input wire:model.live.debounce.300ms="search" icon="magnifying-glass" placeholder="ketik sesuatu..." />
                </div>
            </div>

            <div class="overflow-x-auto mt-3">
                <flux:table :paginate="$this->lokasis">
                    <flux:table.columns>
                        <flux:table.column sortable :sorted="$sortBy === 'nama'" :direction="$sortDirection" wire:click="sort('nama')">{{ __('Nama') }}</flux:table.column>
                        <flux:table.column sortable :sorted="$sortBy === 'id_laboratorium'" :direction="$sortDirection" wire:click="sort('id_laboratorium')">
                            {{ __('Laboratorium') }}
                        </flux:table.column>
                        <flux:table.column>{{ __('Warna') }}</flux:table.column>
                        <flux:table.column class="w-px whitespace-nowrap"></flux:table.column>
                    </flux:table.columns>
                    <flux:table.rows>
                        @forelse ($this->lokasis as $lokasi)
                            <flux:table.row :key="$lokasi->id">
                                <flux:table.cell class="whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium"
                                        style="background-color: {{ $lokasi->warna ?? '#f59e0b' }}; color: {{ \App\Support\ColorHelper::textColorForBackground($lokasi->warna ?? '#f59e0b') }}"
                                    >
                                        {{ $lokasi->nama ?? '-' }}
                                    </span>
                                </flux:table.cell>
                                <flux:table.cell class="whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium"
                                        style="background-color: {{ $lokasi->laboratorium?->warna ?? '#f59e0b' }}; color: {{ \App\Support\ColorHelper::textColorForBackground($lokasi->laboratorium?->warna ?? '#f59e0b') }}"
                                    >
                                        {{ $lokasi->laboratorium?->nama ?? '-' }}
                                    </span>
                                </flux:table.cell>
                                <flux:table.cell>
                                    <div class="flex gap-2">
                                        <span class="size-8 rounded-full border" style="background-color: {{ $lokasi->warna ?? '#f59e0b' }}"></span>
                                    </div>
                                </flux:table.cell>
                                <flux:table.cell>
                                    <flux:dropdown position="bottom" align="end">
                                        <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom" />
                                        <flux:menu>
                                            <flux:menu.item wire:click="modalUbahLokasi({{ $lokasi->id }})" icon="pencil-square"> Edit </flux:menu.item>
                                        </flux:menu>
                                    </flux:dropdown>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-6 text-center text-zinc-500">Belum ada data lokasi.</td>
                            </tr>
                        @endforelse
                    </flux:table.rows>
                </flux:table>
            </div>
        </div>
    </div>
    <x-colorpicker
        name="modal-laboratorium-ubah"
        mode="ubah"
        title="{{ __('Laboratorium') }}"
        description="Ubah data laboratorium."
        maxWidth="lg"
        color="amber"
        klik="ubah({{ $editId }})"
    >
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-3">
                <flux:input wire:model="nama" variant="filled" label="Laboratorium" readonly />
            </div>

            <div class="col-span-1">
                <flux:field>
                    <flux:label>Warna</flux:label>
                    <input type="color" wire:model="warna" class="h-10 w-full rounded-lg border border-zinc-300 bg-white p-1" />
                </flux:field>
            </div>
        </div>
        <flux:input wire:model="gedung" variant="filled" label="Gedung" readonly />
    </x-colorpicker>

    <x-colorpicker
        name="modal-lokasi-ubah"
        mode="ubah"
        title="{{ __('Lokasi') }}"
        description="Ubah nama dan warna lokasi penyimpanan."
        maxWidth="lg"
        color="amber"
        klik="ubahLokasi({{ $editLokasiId }})"
    >
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-3">
                <flux:input wire:model="lokasiNama" label="Lokasi" variant="filled" readonly />
            </div>
            <div class="col-span-1">
                <flux:field>
                    <flux:label>Warna</flux:label>
                    <input type="color" wire:model="lokasiWarna" class="h-10 w-full rounded-lg border border-zinc-300 bg-white p-1" />
                </flux:field>
            </div>
        </div>
        <flux:input wire:model="lokasiLaboratorium" label="Laboratorium" variant="filled" readonly />
    </x-colorpicker>
</div>

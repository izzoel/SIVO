<div class="space-y-6">
    <x-pages-navbar>
        <flux:breadcrumbs.item :href="route('laporan.kerusakan')"> {{ __('Laporan') }} </flux:breadcrumbs.item>

        <flux:breadcrumbs.item :href="route('laporan.kerusakan')" :current="request()->routeIs('laporan.kerusakan')"> {{ __('Kerusakan') }} </flux:breadcrumbs.item>
    </x-pages-navbar>

    <div class="space-y-2">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <flux:heading class="mb-0!" size="xl">{{ __('Kerusakan Alat') }}</flux:heading>
                <flux:button wire:click="modalTambah" size="xs" variant="primary" icon="plus"></flux:button>
            </div>
        </div>

        <flux:text class="text-zinc-600 dark:text-zinc-400"> {{ __('Kata laporan kerusakan alat di sini.') }} </flux:text>
    </div>

    <div class="rounded-xl border border-zinc-200 bg-white p-4 dark:border-zinc-700 dark:bg-zinc-900">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-1">
                <flux:select wire:model.live="filterLaboratorium" variant="listbox" searchable placeholder="Pilih laboratorium...">
                    <flux:select.option value="">Semua</flux:select.option>
                    @foreach ($this->laboratoriums as $laboratorium)
                        <flux:select.option :value="$laboratorium->id"> {{ $laboratorium->nama }} </flux:select.option>
                    @endforeach
                </flux:select>
            </div>
            <div class="col-span-3">
                <flux:input wire:model.live.debounce.300ms="search" icon="magnifying-glass" placeholder="ketik sesuatu..." />
            </div>
        </div>

        <div class="overflow-x-auto mt-3">
            <flux:table :paginate="$this->kerusakans">
                <flux:table.columns>
                    <flux:table.column sortable :sorted="$sortBy === 'nama'" :direction="$sortDirection" wire:click="sort('nama')">{{ __('Nama') }}</flux:table.column>
                    <flux:table.column>{{ __('Spesifikasi') }}</flux:table.column>
                    <flux:table.column sortable :sorted="$sortBy === 'laboratorium'" :direction="$sortDirection" wire:click="sort('laboratorium')">
                        {{ __('Lokasi Alat') }}
                    </flux:table.column>
                    <flux:table.column sortable :sorted="$sortBy === 'kondisi'" :direction="$sortDirection" wire:click="sort('kondisi')">{{ __('Kondisi') }}</flux:table.column>
                    <flux:table.column sortable :sorted="$sortBy === 'jumlah'" :direction="$sortDirection" wire:click="sort('jumlah')">{{ __('Jumlah') }}</flux:table.column>
                    <flux:table.column sortable :sorted="$sortBy === 'status'" :direction="$sortDirection" wire:click="sort('status')"> {{ __('Status') }} </flux:table.column>
                    <flux:table.column class="w-px whitespace-nowrap"></flux:table.column>
                </flux:table.columns>
                <flux:table.rows>
                    @forelse ($this->kerusakans as $kerusakan)
                        <flux:table.row :key="$kerusakan->id">
                            <flux:table.cell class="whitespace-nowrap">{{ $kerusakan->persediaan?->nama ?? '-' }}</flux:table.cell>
                            <flux:table.cell>{{ $kerusakan->persediaan?->spesifikasi ?? '-' }}</flux:table.cell>
                            <flux:table.cell>
                                <x-text-cell text="{{ $kerusakan->laboratorium?->nama ?? '-' }}" warna="{{ $kerusakan->laboratorium?->warna ?? '#f59e0b' }}" />
                            </flux:table.cell>
                            <flux:table.cell>{{ $kerusakan->kondisi }}</flux:table.cell>
                            <flux:table.cell>{{ $kerusakan->jumlah }}</flux:table.cell>
                            <flux:table.cell>
                                <x-text-cell text="{{ $kerusakan->statusKerusakan?->nama ?? '-' }}" warna="{{ $kerusakan->statusKerusakan?->warna ?? '#f59e0b' }}" />
                            </flux:table.cell>
                            <flux:table.cell>
                                <flux:dropdown position="bottom" align="end">
                                    <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom" />
                                    <flux:menu>
                                        <flux:menu.item wire:click="modalUbah({{ $kerusakan->id }})" icon="pencil-square"> Edit </flux:menu.item>

                                        <flux:menu.item wire:click="modalHapus({{ $kerusakan->id }})" icon="trash" variant="danger"> Hapus </flux:menu.item>
                                    </flux:menu>
                                </flux:dropdown>
                            </flux:table.cell>
                        </flux:table.row>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-zinc-500">Belum ada data kerusakan alat.</td>
                        </tr>
                    @endforelse
                </flux:table.rows>
            </flux:table>
        </div>
    </div>

    <x-modal
        name="modal-alat-tambah"
        mode="tambah"
        title="{{ __('Kerusakan Alat') }}"
        description="{{ __('Menambahkan kerusakan alat baru') }}"
        maxWidth="2xl"
        color="lime"
        klik="simpan"
    >
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-2">
                <flux:select wire:model.live="id_laboratorium" variant="listbox" label="Laboratorium" placeholder="--pilih--" searchable>
                    @foreach ($this->laboratoriums as $laboratorium)
                        <flux:select.option :value="$laboratorium->id"> {{ $laboratorium->nama }} </flux:select.option>
                    @endforeach
                </flux:select>
            </div>
            <div class="col-span-2">
                <flux:select wire:model="select_alat" variant="listbox" label="Alat" placeholder="--pilih--" searchable>
                    @foreach ($this->selectAlats as $selectAlat)
                        <flux:select.option :value="$selectAlat->id"> {{ $selectAlat->nama }} </flux:select.option>
                    @endforeach
                </flux:select>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-2">
                <flux:input wire:model="kondisi" label="Kondisi" placeholder="kondisi alat saat ini" />
            </div>
            <div class="col-span-1">
                <flux:input wire:model="jumlah" label="Jumlah" placeholder="jumlah alat" />
            </div>
            <div class="col-span-1">
                <flux:select wire:model="id_status" variant="listbox" label="Status" placeholder="--pilih--">
                    @foreach ($this->statusKerusakans as $statusKerusakan)
                        <flux:select.option :value="$statusKerusakan->id"> {{ $statusKerusakan->nama }} </flux:select.option>
                    @endforeach
                </flux:select>
            </div>
        </div>
    </x-modal>

    <x-modal name="modal-alat-ubah" mode="ubah" title="{{ __('Alat') }}" description="Ubah data alat." maxWidth="2xl" color="amber" klik="ubah({{ $editId }})">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-2">
                <flux:select wire:model.live="id_laboratorium" variant="listbox" label="Laboratorium" placeholder="--pilih--" searchable>
                    @foreach ($this->laboratoriums as $laboratorium)
                        <flux:select.option :value="$laboratorium->id"> {{ $laboratorium->nama }} </flux:select.option>
                    @endforeach
                </flux:select>
            </div>
            <div class="col-span-2">
                <flux:select wire:model.live="select_alat" variant="listbox" label="Alat" placeholder="--pilih--" searchable>
                    @foreach ($this->selectAlats as $selectAlat)
                        <flux:select.option :value="$selectAlat->id"> {{ $selectAlat->nama }} </flux:select.option>
                    @endforeach
                </flux:select>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-2">
                <flux:input wire:model="kondisi" label="Kondisi" placeholder="kondisi alat saat ini" />
            </div>
            <div class="col-span-1">
                <flux:input wire:model="jumlah" label="Jumlah" placeholder="jumlah alat" />
            </div>
            <div class="col-span-1">
                <flux:select wire:model="id_status" variant="listbox" label="Status" placeholder="--pilih--">
                    @foreach ($this->statusKerusakans as $statusKerusakan)
                        <flux:select.option :value="$statusKerusakan->id"> {{ $statusKerusakan->nama }} </flux:select.option>
                    @endforeach
                </flux:select>
            </div>
        </div>
    </x-modal>

    <x-modal name="modal-alat-hapus" mode="hapus" title="{{ __('Kerusakan Alat') }}" description="Yakin ingin menghapus data ini?" maxWidth="lg" color="red" klik="hapus">
        <flux:text> Data <strong>{{ $hapusNama }}</strong> akan dihapus. </flux:text>
    </x-modal>
</div>

<div class="space-y-6">
    <x-pages-navbar>
        <flux:breadcrumbs.item :href="route('persediaan.alat')"> {{ __('Persediaan') }} </flux:breadcrumbs.item>

        <flux:breadcrumbs.item :href="route('persediaan.alat')" :current="request()->routeIs('persediaan.alat')"> {{ __('Alat') }} </flux:breadcrumbs.item>
    </x-pages-navbar>

    <div class="space-y-2">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <flux:heading class="mb-0!" size="xl">{{ __('Alat') }}</flux:heading>
                <flux:button wire:click="modalTambah" size="xs" variant="primary" icon="plus"></flux:button>
                <flux:modal.trigger name="modal-alat-masal">
                    <flux:button size="xs" variant="primary" color="indigo" icon="document-plus"></flux:button>
                </flux:modal.trigger>
            </div>
        </div>

        <flux:text class="text-zinc-600 dark:text-zinc-400"> {{ __('Kelola data persediaan alat di sini.') }} </flux:text>
    </div>

    <div class="rounded-xl border border-zinc-200 bg-white p-4 dark:border-zinc-700 dark:bg-zinc-900">
        @if (session('bulk-success'))
            <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">{{ session('bulk-success') }}</div>
        @endif

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
            <flux:table :paginate="$this->alat">
                <flux:table.columns>
                    <flux:table.column sortable :sorted="$sortBy === 'nama'" :direction="$sortDirection" wire:click="sort('nama')">{{ __('Nama') }}</flux:table.column>
                    <flux:table.column sortable :sorted="$sortBy === 'stok'" :direction="$sortDirection" wire:click="sort('stok')">{{ __('Stok') }}</flux:table.column>
                    <flux:table.column sortable :sorted="$sortBy === 'spesifikasi'" :direction="$sortDirection" wire:click="sort('spesifikasi')">
                        {{ __('Spesifikasi') }}
                    </flux:table.column>
                    <flux:table.column sortable :sorted="$sortBy === 'laboratorium'" :direction="$sortDirection" wire:click="sort('laboratorium')">
                        {{ __('Laboratorium') }}
                    </flux:table.column>
                    <flux:table.column sortable :sorted="$sortBy === 'lokasi'" :direction="$sortDirection" wire:click="sort('lokasi')">{{ __('Lokasi') }} </flux:table.column>
                    <flux:table.column sortable :sorted="$sortBy === 'status'" :direction="$sortDirection" wire:click="sort('status')">{{ __('Status') }} </flux:table.column>
                    <flux:table.column class="w-px whitespace-nowrap"></flux:table.column>
                </flux:table.columns>
                <flux:table.rows>
                    @forelse ($this->alat as $alat)
                        <flux:table.row :key="$alat->id">
                            <flux:table.cell class="whitespace-nowrap">
                                {{ $alat->nama }}

                                @if ($alat->kerusakan_exists)
                                    <flux:button
                                        :href="route('laporan.kerusakan', ['cari' => $alat->nama, 'laboratorium' => $alat->id_laboratorium])"
                                        wire:navigate
                                        size="xs"
                                        variant="subtle"
                                        icon:trailing="arrow-top-right-on-square"
                                    />
                                @endif
                            </flux:table.cell>
                            <flux:table.cell class="whitespace-nowrap">
                                <flux:badge color="lime">{{ $alat->stok }}</flux:badge>
                                <x-text-cell text="{{$alat->satuan?->nama}}" warna="{{$alat->satuan?->warna}}" />
                            </flux:table.cell>
                            <flux:table.cell>{{ $alat->spesifikasi }}</flux:table.cell>
                            <flux:table.cell>
                                <x-text-cell text="{{$alat->laboratorium?->nama}}" warna="{{$alat->laboratorium?->warna}}" />
                            </flux:table.cell>
                            <flux:table.cell>
                                <x-text-cell text="{{$alat->lokasi?->nama}}" warna="{{$alat->lokasi?->warna}}" />
                            </flux:table.cell>
                            <flux:table.cell>
                                <x-text-cell text="{{$alat->statusKerusakan?->nama ?? '-'}}" warna="{{$alat->statusKerusakan?->warna}}" />
                            </flux:table.cell>
                            <flux:table.cell>
                                <flux:dropdown position="bottom" align="end">
                                    <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom" />
                                    <flux:menu>
                                        <flux:menu.item wire:click="modalUbah({{ $alat->id }})" icon="pencil-square"> Edit </flux:menu.item>

                                        <flux:menu.item wire:click="modalHapus({{ $alat->id }})" icon="trash" variant="danger"> Hapus </flux:menu.item>
                                    </flux:menu>
                                </flux:dropdown>
                            </flux:table.cell>
                        </flux:table.row>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-zinc-500">Belum ada data alat.</td>
                        </tr>
                    @endforelse
                </flux:table.rows>
            </flux:table>
        </div>
    </div>

    <x-modal name="modal-alat-tambah" mode="tambah" title="{{ __('Alat') }}" description="{{ __('Menambahkan persediaan alat baru') }}" maxWidth="2xl" color="lime" klik="simpan">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-2">
                <flux:input wire:model="nama" label="Nama" placeholder="nama alat" />
            </div>

            <div class="col-span-2">
                <flux:input wire:model="spesifikasi" label="Spesifikasi" placeholder="merk" />
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-1">
                <flux:input wire:model="stok" label="Stok" type="number" placeholder="jumlah" />
            </div>

            <div class="col-span-1">
                <flux:select wire:model="id_satuan" variant="listbox" searchable label="Satuan" placeholder="--pilih--">
                    @foreach ($this->satuans as $satuan)
                        <flux:select.option :value="$satuan->id"> {{ $satuan->nama }} </flux:select.option>
                    @endforeach
                </flux:select>
            </div>
            <div class="col-span-2">
                <flux:select wire:model.live="id_laboratorium" variant="listbox" label="Laboratorium" placeholder="--pilih--" searchable>
                    @foreach ($this->laboratoriums as $laboratorium)
                        <flux:select.option :value="$laboratorium->id"> {{ $laboratorium->nama }} </flux:select.option>
                    @endforeach
                </flux:select>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-2">
                <flux:select wire:model="id_lokasi" variant="listbox" label="Lokasi" placeholder="{{ $id_laboratorium ? '--pilih--' : 'Pilih laboratorium dulu' }}" searchable>
                    @foreach ($this->lokasis as $lokasi)
                        <flux:select.option :value="$lokasi->id"> {{ $lokasi->nama }} </flux:select.option>
                    @endforeach
                </flux:select>
            </div>

            <div class="col-span-2">
                <flux:select wire:model="id_status" variant="listbox" searchable label="Status" placeholder="--pilih--">
                    @foreach ($this->statusKerusakans as $statusKerusakan)
                        <flux:select.option :value="$statusKerusakan->id"> {{ $statusKerusakan->nama }} </flux:select.option>
                    @endforeach
                </flux:select>
            </div>
        </div>
    </x-modal>

    <x-modal
        name="modal-alat-masal"
        mode="import"
        title="{{ __('Persediaan') }}"
        description="{{ __('Menambahkan semua jenis persediaan baru secara masal') }}"
        maxWidth="2xl"
        color="indigo"
        klik="import"
    >
        <flux:file-upload wire:model="xlsx_file" label="Upload files">
            <flux:file-upload.dropzone heading="Drop files disini atau klik untuk memilih" text="xlsx" />
        </flux:file-upload>
        @if ($xlsx_file)
            <div class="mt-4 flex flex-col gap-2">
                <flux:file-item :heading="$xlsx_file->getClientOriginalName()" :size="$xlsx_file->getSize()">
                    <x-slot name="actions">
                        <flux:file-item.remove wire:click="$set('xlsx_file', null)" />
                    </x-slot>
                </flux:file-item>
            </div>
        @endif
    </x-modal>

    <x-modal name="modal-alat-ubah" mode="ubah" title="{{ __('Alat') }}" description="Ubah data alat." maxWidth="2xl" color="amber" klik="ubah({{ $editId }})">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-2">
                <flux:input wire:model="nama" label="Nama" placeholder="nama alat" />
            </div>

            <div class="col-span-2">
                <flux:input wire:model="spesifikasi" label="Spesifikasi" placeholder="merk" />
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-1">
                <flux:input wire:model="stok" label="Stok" type="number" placeholder="jumlah" />
            </div>

            <div class="col-span-1">
                <flux:select wire:model="id_satuan" variant="listbox" searchable label="Satuan" placeholder="--pilih--">
                    @foreach ($this->satuans as $satuan)
                        <flux:select.option :value="$satuan->id"> {{ $satuan->nama }} </flux:select.option>
                    @endforeach
                </flux:select>
            </div>

            <div class="col-span-2">
                <flux:select wire:model.live="id_laboratorium" variant="listbox" searchable label="Laboratorium" placeholder="--pilih--">
                    @foreach ($this->laboratoriums as $laboratorium)
                        <flux:select.option :value="$laboratorium->id"> {{ $laboratorium->nama }} </flux:select.option>
                    @endforeach
                </flux:select>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-2">
                <flux:select
                    wire:model="id_lokasi"
                    variant="listbox"
                    searchable
                    label="Lokasi"
                    placeholder="{{ $id_laboratorium ? '--pilih--' : 'Pilih laboratorium dulu' }}"
                    :disabled="! $id_laboratorium"
                >
                    @foreach ($this->lokasis as $lokasi)
                        <flux:select.option :value="$lokasi->id"> {{ $lokasi->nama }} </flux:select.option>
                    @endforeach
                </flux:select>
            </div>

            <div class="col-span-2">
                <flux:select wire:model="id_status" variant="listbox" searchable label="Status" placeholder="--pilih--">
                    @foreach ($this->statusKerusakans as $statusKerusakan)
                        <flux:select.option :value="$statusKerusakan->id"> {{ $statusKerusakan->nama }} </flux:select.option>
                    @endforeach
                </flux:select>
            </div>
        </div>
    </x-modal>

    <x-modal name="modal-alat-hapus" mode="hapus" title="{{ __('Alat') }}" description="Yakin ingin menghapus data ini?" maxWidth="lg" color="red" klik="hapus">
        <flux:text> Data <strong>{{ $hapusNama }}</strong> akan dihapus. </flux:text>
    </x-modal>
</div>

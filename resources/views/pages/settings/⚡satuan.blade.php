<?php

use App\Models\Satuan;
use App\Support\ColorHelper;
use Flux\Flux;
use Illuminate\Database\QueryException;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public $nama, $jenis, $warna;

    public $editId = null;
    public $hapusId = null;
    public $hapusNama = '';

    public $warnaNama = '';
    public $warnaId = null;
    public $warnaSatuan = '';
    public $warnaLabel = '';

    public $filterJenis = '';
    public string $search = '';
    public $sortBy = 'nama';
    public $sortDirection = 'asc';

    protected function rules()
    {
        return [
            'nama' => 'required',
            'jenis' => 'required',
            'warna' => 'required',
        ];
    }

    protected function messages()
    {
        return [
            'nama.required' => 'Tulis nama satuan.',
            'jenis.required' => 'Pilih jenis persediaan.',
            'warna.required' => 'Pilih warna label.',
        ];
    }

    public function sort($column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function updatedFilterJenis()
    {
        $this->resetPage();
    }

    #[Computed]
    public function satuan()
    {
        return Satuan::query()
            ->when($this->filterJenis, function ($query) {
                $query->where('jenis', $this->filterJenis);
            })
            ->when($this->search, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('nama', 'like', '%' . $this->search . '%')->orWhere('jenis', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate();
    }

    public function simpan()
    {
        $this->validate(
            [
                'nama' => $this->rules()['nama'],
                'jenis' => $this->rules()['jenis'],
                'warna' => $this->rules()['warna'],
            ],
            $this->messages(),
        );

        Satuan::create([
            'nama' => $this->nama,
            'jenis' => $this->jenis,
            'warna' => $this->warna,
        ]);

        $this->reset(['nama', 'jenis', 'warna']);
        $this->dispatch('modal-close', name: 'modal-satuan-tambah');
        Flux::toast(variant: 'success', text: __('Data satuan berhasil disimpan.'));
    }

    public function ubah($id)
    {
        $this->validate(
            [
                'nama' => $this->rules()['nama'],
                'jenis' => $this->rules()['jenis'],
                'warna' => $this->rules()['warna'],
            ],
            $this->messages(),
        );

        $satuan = Satuan::findOrFail($id);

        $satuan->update([
            'nama' => $this->nama,
            'jenis' => $this->jenis,
            'warna' => $this->warna,
        ]);

        $this->editId = null;
        $this->reset(['nama', 'jenis', 'warna']);
        $this->dispatch('modal-close', name: 'modal-satuan-ubah');
        Flux::toast(variant: 'success', text: __('Data padat berhasil diubah.'));
    }

    public function hapus()
    {
        $satuan = Satuan::findOrFail($this->hapusId);
        $satuan->delete();

        $this->reset(['hapusId', 'hapusNama']);
        $this->dispatch('modal-close', name: 'modal-satuan-hapus');

        Flux::toast(variant: 'success', text: __('Data Satuan berhasil dihapus.'));
    }

    public function modalUbah($id)
    {
        $satuan = Satuan::findOrFail($id);

        $this->editId = $satuan->id;
        $this->nama = $satuan->nama;
        $this->jenis = $satuan->jenis;
        $this->warna = $satuan->warna;

        $this->dispatch('modal-show', name: 'modal-satuan-ubah');
    }

    public function modalHapus($id)
    {
        $satuan = Satuan::findOrFail($id);

        $this->hapusId = $satuan->id;
        $this->hapusNama = $satuan->nama;

        $this->dispatch('modal-show', name: 'modal-satuan-hapus');
    }

    public function modalColorpicker($id)
    {
        $satuan = Satuan::findOrFail($id);

        $this->warnaId = $satuan->id;
        $this->warnaNama = $satuan->nama;
        $this->warnaSatuan = $satuan->warna;
        $this->warnaLabel = $satuan->warna ?: '#f59e0b';

        $this->dispatch('modal-show', name: 'modal-colorpicker');
    }

    public function simpanWarna()
    {
        $this->validate(
            [
                'warnaLabel' => 'required',
            ],
            [
                'warnaLabel.required' => 'Pilih warna label.',
            ],
        );

        $satuan = Satuan::findOrFail($this->warnaId);

        $satuan->update([
            'warna' => $this->warnaLabel,
        ]);

        $this->reset(['warnaId', 'warnaNama', 'warnaSatuan', 'warnaLabel']);
        $this->dispatch('modal-close', name: 'colorpicker');
        Flux::toast(variant: 'success', text: __('Warna satuan berhasil diubah.'));
    }
};
?>

<div class="space-y-6">
    <x-pages-navbar>
        <flux:breadcrumbs.item :href="route('setting.satuan')">
            {{ __('Setting') }}
        </flux:breadcrumbs.item>

        <flux:breadcrumbs.item :href="route('setting.satuan')" :current="request()->routeIs('setting.satuan')">
            {{ __('Satuan') }}
        </flux:breadcrumbs.item>
    </x-pages-navbar>

    <div class="space-y-2">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <flux:heading class="mb-0!" size="xl">{{ __('Satuan') }}</flux:heading>
                <flux:modal.trigger name="modal-satuan-tambah">
                    <flux:button size="xs" variant="primary" icon="plus"></flux:button>
                </flux:modal.trigger>
            </div>
        </div>

        <flux:text class="text-zinc-600 dark:text-zinc-400">
            {{ __('Kelola data satuan persediaan di sini.') }}
        </flux:text>
    </div>

    <div class="rounded-xl border border-zinc-200 bg-white p-4 dark:border-zinc-700 dark:bg-zinc-900">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-1">
                <flux:select wire:model.live="filterJenis" variant="listbox">
                    <flux:select.option value="">Semua</flux:select.option>
                    <flux:select.option value="alat">Alat</flux:select.option>
                    <flux:select.option value="cair">Cair</flux:select.option>
                    <flux:select.option value="gas">Gas</flux:select.option>
                    <flux:select.option value="padat">Padat</flux:select.option>
                </flux:select>
            </div>
            <div class="col-span-3">
                <flux:input wire:model.live.debounce.300ms="search" icon="magnifying-glass"
                    placeholder="ketik sesuatu..." />
            </div>
        </div>

        <div class="overflow-x-auto mt-3">

            <flux:table :paginate="$this->satuan">
                <flux:table.columns>
                    <flux:table.column sortable :sorted="$sortBy === 'nama'" :direction="$sortDirection"
                        wire:click="sort('nama')">{{ __('Nama') }}</flux:table.column>
                    <flux:table.column sortable :sorted="$sortBy === 'jenis'" :direction="$sortDirection"
                        wire:click="sort('jenis')">{{ __('Jenis') }}</flux:table.column>
                    <flux:table.column>{{ __('Warna') }}</flux:table.column>
                    <flux:table.column class="w-px whitespace-nowrap"></flux:table.column>
                </flux:table.columns>
                <flux:table.rows>
                    @forelse ($this->satuan as $satuan)
                        <flux:table.row :key="$satuan->id">
                            <flux:table.cell class="whitespace-nowrap">
                                <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium"
                                    style="background-color: {{ $satuan->warna ?? '#f59e0b' }}; color: {{ ColorHelper::textColorForBackground($satuan->warna ?? '#f59e0b') }}">
                                    {{ $satuan->nama ?? '-' }}
                                </span>
                            </flux:table.cell>

                            <flux:table.cell>{{ $satuan->jenis }}</flux:table.cell>

                            <flux:table.cell>
                                <div class="flex gap-2">
                                    <flux:modal.trigger name="modal-colorpicker">
                                        <button type="button" wire:click="modalColorpicker({{ $satuan->id }})"
                                            class="size-8 rounded-full border"
                                            style="background-color: {{ $satuan->warna }}"></button>
                                    </flux:modal.trigger>
                                </div>
                            </flux:table.cell>
                            <flux:table.cell>
                                <flux:dropdown position="bottom" align="end">
                                    <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal"
                                        inset="top bottom" />
                                    <flux:menu>
                                        <flux:menu.item wire:click="modalUbah({{ $satuan->id }})"
                                            icon="pencil-square">
                                            Edit
                                        </flux:menu.item>

                                        <flux:menu.item wire:click="modalHapus({{ $satuan->id }})" icon="trash"
                                            variant="danger">
                                            Hapus
                                        </flux:menu.item>
                                    </flux:menu>
                                </flux:dropdown>
                            </flux:table.cell>
                        </flux:table.row>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-zinc-500">
                                Belum ada data satuan.
                            </td>
                        </tr>
                    @endforelse
                </flux:table.rows>
            </flux:table>
        </div>
    </div>

    <x-modal name="modal-satuan-tambah" mode="tambah" title="{{ __('Satuan') }}"
        description="{{ __('Menambahkan satuan persediaan baru') }}" maxWidth="md" color="lime" klik="simpan">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-2">
                <flux:input wire:model="nama" label="Satuan" placeholder="nama satuan" />
            </div>

            <div class="col-span-1">
                <flux:select wire:model='jenis' label="Jenis" variant="listbox" placeholder="--pilih--">
                    <flux:select.option value="alat">Alat</flux:select.option>
                    <flux:select.option value="cair">Cair</flux:select.option>
                    <flux:select.option value="gas">Gas</flux:select.option>
                    <flux:select.option value="padat">Padat</flux:select.option>
                </flux:select>
            </div>

            <flux:field>
                <flux:label>Warna</flux:label>

                <input type="color" wire:model="warna"
                    class="h-10 w-full rounded-lg border border-zinc-300 bg-white p-1" />
            </flux:field>

        </div>

    </x-modal>

    <x-modal name="modal-satuan-ubah" mode="ubah" title="{{ __('Satuan') }}" description="Ubah data satuan."
        maxWidth="md" color="amber" klik="ubah({{ $editId }})">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-2">
                <flux:input wire:model="nama" label="Satuan" placeholder="nama satuan" />
            </div>

            <div class="col-span-1">
                <flux:select wire:model='jenis' label="Jenis" variant="listbox" placeholder="--pilih--">
                    <flux:select.option value="alat">Alat</flux:select.option>
                    <flux:select.option value="cair">Cair</flux:select.option>
                    <flux:select.option value="gas">Gas</flux:select.option>
                    <flux:select.option value="padat">Padat</flux:select.option>
                </flux:select>
            </div>

            <div class="col-span-1">
                <flux:field>
                    <flux:label>Warna</flux:label>

                    <input type="color" wire:model="warna"
                        class="h-10 w-full rounded-lg border border-zinc-300 bg-white p-1" />
                </flux:field>
            </div>
        </div>
    </x-modal>

    <x-modal name="modal-satuan-hapus" mode="hapus" title="{{ __('Satuan') }}"
        description="Yakin ingin menghapus data ini?" maxWidth="lg" color="red" klik="hapus">
        <flux:text>
            Data <strong>{{ $hapusNama }}</strong> akan dihapus.
        </flux:text>
    </x-modal>



</div>

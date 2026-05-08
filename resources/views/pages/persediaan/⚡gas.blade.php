<?php

use App\Models\Laboratorium;
use App\Models\Lokasi;
use App\Models\Persediaan;
use App\Models\Satuan;
use App\Models\StatusKerusakan;
use App\Services\PersediaanImportService;
use App\Support\ColorHelper;
use Flux\Flux;
use Illuminate\Database\QueryException;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

new class extends Component {
    use WithFileUploads;
    use WithPagination;

    public $nama;
    public $stok;
    public $spesifikasi;
    public $id_satuan = 1;
    public $id_laboratorium;
    public $id_lokasi;
    public $id_status = 1;
    public $xlsx_file;

    public $editId = null;
    public $hapusId = null;
    public $hapusNama = '';

    public $filterLaboratorium = '';
    public string $search = '';
    public $sortBy = 'nama';
    public $sortDirection = 'asc';

    protected function rules()
    {
        return [
            'nama' => 'required',
            'stok' => 'required',
            'spesifikasi' => 'required',
            'id_laboratorium' => 'required|integer',
            'id_satuan' => 'nullable|integer',
            'id_lokasi' => 'required|integer',
            'id_status' => 'nullable|integer',
            'xlsx_file' => 'required|file|mimes:xlsx|max:5120',
        ];
    }

    protected function messages()
    {
        return [
            'nama.required' => 'Tulis nama gas.',
            'stok.required' => 'Isi jumlah stok.',
            'spesifikasi.required' => 'Tulis spesifikasi.',
            'id_laboratorium.required' => 'Pilih laboratorium.',
            'id_lokasi.required' => 'Pilih lokasi.',
            'xlsx_file.required' => 'Pilih file Excel.',
            'xlsx_file.file' => 'File tidak valid.',
            'xlsx_file.mimes' => 'File harus berformat .xlsx.',
            'xlsx_file.max' => 'Ukuran file maksimal 5 MB.',
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

    public function updatedFilterLaboratorium()
    {
        $this->resetPage();
    }

    public function updatedIdLaboratorium()
    {
        $this->id_lokasi = null;
    }

    #[Computed]
    public function gas()
    {
        $sortBy = match ($this->sortBy) {
            'laboratorium' => 'id_laboratorium',
            'lokasi' => 'id_lokasi',
            'status' => 'id_status',
            default => $this->sortBy,
        };

        return Persediaan::query()
            ->with(['satuan', 'laboratorium', 'lokasi', 'statusKerusakan'])
            ->where('jenis', 'gas')
            ->when($this->filterLaboratorium, function ($query) {
                $query->where('id_laboratorium', $this->filterLaboratorium);
            })
            ->when($this->search, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery
                        ->where('nama', 'like', '%' . $this->search . '%')
                        ->orWhere('stok', 'like', '%' . $this->search . '%')
                        ->orWhere('spesifikasi', 'like', '%' . $this->search . '%')
                        ->orWhere('id_lokasi', 'like', '%' . $this->search . '%')
                        ->orWhere('id_status', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy($sortBy, $this->sortDirection)
            ->paginate();
    }

    #[Computed]
    public function satuans()
    {
        return Satuan::query()->where('jenis', 'gas')->orderBy('nama')->get();
    }

    #[Computed]
    public function statusKerusakans()
    {
        return StatusKerusakan::query()->orderBy('id')->get();
    }

    #[Computed]
    public function laboratoriums()
    {
        return Laboratorium::query()->orderBy('nama')->get();
    }

    #[Computed]
    public function lokasis()
    {
        return Lokasi::query()
            ->when($this->id_laboratorium, function ($query) {
                $query->where('id_laboratorium', $this->id_laboratorium);
            })
            ->orderBy('nama')
            ->get();
    }

    public function import()
    {
        $this->resetErrorBag('xlsx_file');
        $this->validate(
            [
                'xlsx_file' => $this->rules()['xlsx_file'],
            ],
            $this->messages(),
        );

        try {
            $rows = app(PersediaanImportService::class)->importFromXlsx($this->xlsx_file->getRealPath());
            Persediaan::insert($rows);
        } catch (QueryException $exception) {
            $this->addError('xlsx_file', $this->ringkasErrorImport($exception->getMessage()));
            return;
        } catch (\RuntimeException $exception) {
            $this->addError('xlsx_file', $exception->getMessage());
            return;
        }

        $totalImported = count($rows);

        $this->resetPage();
        $this->reset('xlsx_file');
        $this->resetErrorBag('xlsx_file');
        $this->dispatch('modal-close', name: 'modal-gas-masal');

        Flux::toast(variant: 'success', text: __(':total data persediaan berhasil diimport.', ['total' => $totalImported]));
    }

    public function simpan()
    {
        $this->validate(
            [
                'nama' => $this->rules()['nama'],
                'stok' => $this->rules()['stok'],
                'spesifikasi' => $this->rules()['spesifikasi'],
                'id_laboratorium' => $this->rules()['id_laboratorium'],
                'id_satuan' => $this->rules()['id_satuan'],
                'id_lokasi' => $this->rules()['id_lokasi'],
                'id_status' => $this->rules()['id_status'],
            ],
            $this->messages(),
        );

        Persediaan::create([
            'jenis' => 'gas',
            'nama' => $this->nama,
            'stok' => $this->stok,
            'spesifikasi' => $this->spesifikasi,
            'id_satuan' => $this->id_satuan ?? 1,
            'id_laboratorium' => $this->id_laboratorium,
            'id_lokasi' => $this->id_lokasi ?? 1,
            'id_status' => $this->id_status ?? 1,
        ]);

        $this->reset(['nama', 'stok', 'spesifikasi', 'id_satuan', 'id_laboratorium', 'id_lokasi', 'id_status']);
        $this->resetValidation();
        $this->dispatch('modal-close', name: 'modal-gas-tambah');
        Flux::toast(variant: 'success', text: __('Data gas berhasil disimpan.'));
    }

    public function ubah($id)
    {
        $this->validate(
            [
                'nama' => $this->rules()['nama'],
                'stok' => $this->rules()['stok'],
                'spesifikasi' => $this->rules()['spesifikasi'],
                'id_laboratorium' => $this->rules()['id_laboratorium'],
                'id_satuan' => $this->rules()['id_satuan'],
                'id_lokasi' => $this->rules()['id_lokasi'],
                'id_status' => $this->rules()['id_status'],
            ],
            $this->messages(),
        );

        $persediaan = Persediaan::findOrFail($id);

        $persediaan->update([
            'nama' => $this->nama,
            'stok' => $this->stok,
            'spesifikasi' => $this->spesifikasi,
            'id_satuan' => $this->id_satuan ?? 1,
            'id_laboratorium' => $this->id_laboratorium,
            'id_lokasi' => $this->id_lokasi ?? 1,
            'id_status' => $this->id_status ?? 1,
        ]);

        $this->editId = null;
        $this->reset(['nama', 'stok', 'spesifikasi', 'id_satuan', 'id_laboratorium', 'id_lokasi', 'id_status']);
        $this->resetValidation();
        $this->dispatch('modal-close', name: 'modal-gas-ubah');
        Flux::toast(variant: 'success', text: __('Data gas berhasil diubah.'));
    }

    public function hapus()
    {
        $persediaan = Persediaan::findOrFail($this->hapusId);
        $persediaan->delete();

        $this->reset(['hapusId', 'hapusNama']);
        $this->dispatch('modal-close', name: 'modal-gas-hapus');

        Flux::toast(variant: 'success', text: __('Data gas berhasil dihapus.'));
    }

    public function modalUbah($id)
    {
        $this->resetValidation();

        $persediaan = Persediaan::findOrFail($id);

        $this->editId = $persediaan->id;
        $this->nama = $persediaan->nama;
        $this->stok = $persediaan->stok;
        $this->spesifikasi = $persediaan->spesifikasi;
        $this->id_satuan = $persediaan->id_satuan;
        $this->id_laboratorium = $persediaan->id_laboratorium;
        $this->id_lokasi = $persediaan->id_lokasi;
        $this->id_status = $persediaan->id_status;

        $this->dispatch('modal-show', name: 'modal-gas-ubah');
    }

    public function modalTambah()
    {
        $this->editId = null;
        $this->reset(['nama', 'stok', 'spesifikasi', 'id_satuan', 'id_laboratorium', 'id_lokasi', 'id_status']);
        $this->resetValidation();
        $this->dispatch('modal-show', name: 'modal-gas-tambah');
    }

    public function modalHapus($id)
    {
        $this->resetValidation();

        $persediaan = Persediaan::findOrFail($id);

        $this->hapusId = $persediaan->id;
        $this->hapusNama = $persediaan->nama;

        $this->dispatch('modal-show', name: 'modal-gas-hapus');
    }

    protected function ringkasErrorImport($message)
    {
        if (str_contains($message, "Unknown column 'jenis'")) {
            return 'Import gagal karena kolom "jenis" belum ada di tabel database persediaans.';
        }
        if (str_contains($message, "Unknown column 'spesifikasi'")) {
            return 'Import gagal karena kolom "spesifikasi" belum ada di tabel database persediaans.';
        }

        if (str_contains($message, "Unknown column 'stok'")) {
            return 'Import gagal karena kolom "stok" belum ada di tabel database persediaans.';
        }

        if (str_contains($message, "Unknown column 'nama'")) {
            return 'Import gagal karena kolom "nama" belum ada di tabel database persediaans.';
        }

        if (str_contains($message, "Unknown column 'id_satuan'")) {
            return 'Import gagal karena kolom "id_satuan" belum ada di tabel database persediaans.';
        }

        if (str_contains($message, "Unknown column 'id_lokasi'")) {
            return 'Import gagal karena kolom "id_lokasi" belum ada di tabel database persediaans.';
        }

        if (str_contains($message, "Unknown column 'id_status'")) {
            return 'Import gagal karena kolom "id_status" belum ada di tabel database persediaans.';
        }

        if (str_contains($message, 'Column not found')) {
            return 'Import gagal karena ada kolom Excel yang belum sesuai dengan struktur tabel database.';
        }

        return 'Import gagal. Periksa format file Excel dan struktur tabel database.';
    }
};
?>

<div class="space-y-6">
    <x-pages-navbar>
        <flux:breadcrumbs.item :href="route('persediaan.gas')"> {{ __('Persediaan') }} </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('persediaan.gas')" :current="request()->routeIs('persediaan.gas')"> {{ __('Gas') }} </flux:breadcrumbs.item>
    </x-pages-navbar>

    <div class="space-y-2">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <flux:heading class="mb-0!" size="xl">{{ __('Gas') }}</flux:heading>
                <flux:button wire:click="modalTambah" size="xs" variant="primary" icon="plus"></flux:button>
                <flux:modal.trigger name="modal-gas-masal">
                    <flux:button size="xs" variant="primary" color="indigo" icon="document-plus"></flux:button>
                </flux:modal.trigger>
            </div>
        </div>

        <flux:text class="text-zinc-600 dark:text-zinc-400"> {{ __('Kelola data persediaan gas di sini.') }} </flux:text>
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
                        <flux:select.option :value="$laboratorium->id">{{ $laboratorium->nama }}</flux:select.option>
                    @endforeach
                </flux:select>
            </div>
            <div class="col-span-3">
                <flux:input wire:model.live.debounce.300ms="search" icon="magnifying-glass" placeholder="ketik sesuatu..." />
            </div>
        </div>

        <div class="overflow-x-auto mt-3">
            <flux:table :paginate="$this->gas">
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
                    @forelse ($this->gas as $gas)
                        <flux:table.row :key="$gas->id">
                            <flux:table.cell class="whitespace-nowrap">{{ $gas->nama }}</flux:table.cell>
                            <flux:table.cell class="whitespace-nowrap">
                                <flux:badge color="lime">{{ $gas->stok }}</flux:badge>
                                <x-text-cell text="{{$gas->satuan?->nama}}" warna="{{$gas->satuan?->warna}}" />
                            </flux:table.cell>
                            <flux:table.cell>{{ $gas->spesifikasi }}</flux:table.cell>
                            <flux:table.cell>
                                <x-text-cell text="{{$gas->laboratorium?->nama}}" warna="{{$gas->laboratorium?->warna}}" />
                            </flux:table.cell>
                            <flux:table.cell>
                                <x-text-cell text="{{$gas->lokasi?->nama}}" warna="{{$gas->lokasi?->warna}}" />
                            </flux:table.cell>
                            <flux:table.cell>
                                <x-text-cell text="{{$gas->statusKerusakan?->nama ?? '-'}}" warna="{{$gas->statusKerusakan?->warna}}" />
                            </flux:table.cell>
                            <flux:table.cell>
                                <flux:dropdown position="bottom" align="end">
                                    <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom" />
                                    <flux:menu>
                                        <flux:menu.item wire:click="modalUbah({{ $gas->id }})" icon="pencil-square"> Edit </flux:menu.item>

                                        <flux:menu.item wire:click="modalHapus({{ $gas->id }})" icon="trash" variant="danger"> Hapus </flux:menu.item>
                                    </flux:menu>
                                </flux:dropdown>
                            </flux:table.cell>
                        </flux:table.row>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-zinc-500">Belum ada data gas.</td>
                        </tr>
                    @endforelse
                </flux:table.rows>
            </flux:table>
        </div>
    </div>

    <x-modal name="modal-gas-tambah" mode="tambah" title="{{ __('Gas') }}" description="{{ __('Menambahkan persediaan gas baru') }}" maxWidth="2xl" color="lime" klik="simpan">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-2">
                <flux:input wire:model="nama" label="Nama" placeholder="nama persediaan" />
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
                        <flux:select.option :value="$laboratorium->id">{{ $laboratorium->nama }}</flux:select.option>
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
                        <flux:select.option :value="$lokasi->id">{{ $lokasi->nama }}</flux:select.option>
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
        name="modal-gas-masal"
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

    <x-modal name="modal-gas-ubah" mode="ubah" title="{{ __('Gas') }}" description="Ubah data gas." maxWidth="2xl" color="amber" klik="ubah({{ $editId }})">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-2">
                <flux:input wire:model="nama" label="Nama" placeholder="nama persediaan" />
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
                        <flux:select.option :value="$laboratorium->id">{{ $laboratorium->nama }}</flux:select.option>
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
                        <flux:select.option :value="$lokasi->id">{{ $lokasi->nama }}</flux:select.option>
                    @endforeach
                </flux:select>
            </div>

            <div class="col-span-2">
                <flux:select wire:model="id_status" label="Status" placeholder="--pilih--">
                    @foreach ($this->statusKerusakans as $statusKerusakan)
                        <flux:select.option :value="$statusKerusakan->id"> {{ $statusKerusakan->nama }} </flux:select.option>
                    @endforeach
                </flux:select>
            </div>
        </div>
    </x-modal>

    <x-modal name="modal-gas-hapus" mode="hapus" title="{{ __('Gas') }}" description="Yakin ingin menghapus data ini?" maxWidth="lg" color="red" klik="hapus">
        <flux:text> Data <strong>{{ $hapusNama }}</strong> akan dihapus. </flux:text>
    </x-modal>
</div>

<?php

use App\Models\Kerusakan;
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

    public $nama, $stok, $spesifikasi;
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
            'nama.required' => 'Tulis nama alat.',
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
    public function alat()
    {
        $sortBy = match ($this->sortBy) {
            'laboratorium' => 'id_laboratorium',
            'lokasi' => 'id_lokasi',
            'status' => 'id_status',
            default => $this->sortBy,
        };

        return Persediaan::query()
            ->with(['satuan', 'laboratorium', 'lokasi', 'statusKerusakan'])
            ->withExists('kerusakan')
            ->where('jenis', 'alat')
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
        return Satuan::query()->where('jenis', 'alat')->orderBy('nama')->get();
    }

    #[Computed]
    public function statusKerusakans()
    {
        return StatusKerusakan::query()->orderBy('id')->get();
    }

    #[Computed]
    public function laboratoriums()
    {
        return Laboratorium::all();
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
        $this->dispatch('modal-close', name: 'modal-alat-masal');

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
            'jenis' => 'alat',
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
        $this->dispatch('modal-close', name: 'modal-alat-tambah');
        Flux::toast(variant: 'success', text: __('Data alat berhasil disimpan.'));
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

        Kerusakan::updateOrCreate(
            ['id_persediaan' => $persediaan->id],
            [
                'id_laboratorium' => $this->id_laboratorium,
                'kondisi' => $this->spesifikasi,
                'jumlah' => 1,
                'id_status' => $this->id_status ?? 1,
            ],
        );

        $this->editId = null;
        $this->reset(['nama', 'stok', 'spesifikasi', 'id_satuan', 'id_laboratorium', 'id_lokasi', 'id_status']);
        $this->resetValidation();
        $this->dispatch('modal-close', name: 'modal-alat-ubah');
        Flux::toast(variant: 'success', text: __('Data alat berhasil diubah.'));
    }

    public function hapus()
    {
        $persediaan = Persediaan::findOrFail($this->hapusId);
        $persediaan->delete();

        $this->reset(['hapusId', 'hapusNama']);
        $this->dispatch('modal-close', name: 'modal-alat-hapus');

        Flux::toast(variant: 'success', text: __('Data alat berhasil dihapus.'));
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

        $this->dispatch('modal-show', name: 'modal-alat-ubah');
    }

    public function modalTambah()
    {
        $this->editId = null;
        $this->reset(['nama', 'stok', 'spesifikasi', 'id_satuan', 'id_laboratorium', 'id_lokasi', 'id_status']);
        $this->resetValidation();
        $this->dispatch('modal-show', name: 'modal-alat-tambah');
    }

    public function tutupModalUbah()
    {
        $this->editId = null;
        $this->reset(['nama', 'stok', 'spesifikasi', 'id_satuan', 'id_laboratorium', 'id_lokasi', 'id_status']);
        $this->resetValidation();
    }

    public function modalHapus($id)
    {
        $this->resetValidation();

        $persediaan = Persediaan::findOrFail($id);

        $this->hapusId = $persediaan->id;
        $this->hapusNama = $persediaan->nama;

        $this->dispatch('modal-show', name: 'modal-alat-hapus');
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

<?php

use App\Models\Kerusakan;
use App\Models\KerusakanStatusChange;
use App\Models\Laboratorium;
use App\Models\Persediaan;
use App\Models\StatusKerusakan;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public $nama, $kondisi, $jumlah;
    public $select_alat;

    public $id_alat, $id_status;
    public $id_laboratorium;

    public $editId = null;
    public $hapusId = null;
    public $hapusNama = '';

    #[Url(as: 'laboratorium', except: '')]
    public $filterLaboratorium = '';

    #[Url(as: 'cari', except: '')]
    public string $search = '';
    public $sortBy = 'nama';
    public $sortDirection = 'asc';

    protected function rules()
    {
        return [
            'select_alat' => 'required|integer',
            'id_laboratorium' => 'required|integer',
            'kondisi' => 'required',
            'jumlah' => 'required|integer',
            'id_status' => 'required',
        ];
    }

    protected function messages()
    {
        return [
            'select_alat.required' => 'Pilih alat.',
            'id_laboratorium.required' => 'Pilih laboratorium.',
            'kondisi.required' => 'Tulis kondisi alat.',
            'jumlah.required' => 'Tulis jumlah alat yang rusak.',
            'id_status.required' => 'Pilih status.',
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
        $this->select_alat = null;
    }

    #[Computed]
    public function kerusakans()
    {
        $sortBy = match ($this->sortBy) {
            'laboratorium' => 'id_laboratorium',
            'nama' => 'id_persediaan',
            'status' => 'id_status',
            default => $this->sortBy,
        };

        return Kerusakan::query()
            ->with(['laboratorium:id,nama,warna', 'persediaan:id,nama,spesifikasi', 'statusKerusakan:id,nama,warna'])
            ->when($this->filterLaboratorium, function ($query) {
                $query->where('id_laboratorium', $this->filterLaboratorium);
            })
            ->when($this->search, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery
                        ->where('id_persediaan', 'like', '%' . $this->search . '%')
                        ->orWhereHas('persediaan', function ($persediaanQuery) {
                            $persediaanQuery->where('nama', 'like', '%' . $this->search . '%')->orWhere('spesifikasi', 'like', '%' . $this->search . '%');
                        })
                        ->orWhere('kondisi', 'like', '%' . $this->search . '%')
                        ->orWhere('jumlah', 'like', '%' . $this->search . '%')
                        ->orWhere('id_status', 'like', '%' . $this->search . '%')
                        ->orWhere('id_laboratorium', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy($sortBy, $this->sortDirection)
            ->paginate();
    }

    #[Computed]
    public function laboratoriums()
    {
        return Laboratorium::query()->select('id', 'nama')->orderBy('nama')->get();
    }

    #[Computed]
    public function statusKerusakans()
    {
        return StatusKerusakan::query()->select('id', 'nama', 'warna')->orderBy('id')->get();
    }

    #[Computed]
    public function selectAlats()
    {
        if (!$this->id_laboratorium) {
            return collect();
        }

        return Persediaan::query()->select('id', 'nama')->where('jenis', 'alat')->where('id_laboratorium', $this->id_laboratorium)->orderBy('nama')->get();
    }

    public function simpan()
    {
        $this->validate(
            [
                'select_alat' => $this->rules()['select_alat'],
                'id_laboratorium' => $this->rules()['id_laboratorium'],
                'kondisi' => $this->rules()['kondisi'],
                'jumlah' => $this->rules()['jumlah'],
                'id_status' => $this->rules()['id_status'],
            ],
            $this->messages(),
        );

        Kerusakan::create([
            'id_persediaan' => $this->select_alat,
            'id_laboratorium' => $this->id_laboratorium,
            'kondisi' => $this->kondisi,
            'jumlah' => $this->jumlah,
            'id_status' => $this->id_status,
        ]);

$status = StatusKerusakan::where('id', $this->id_status)->first();
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                'target' => '628974183737',
                'message' => "*🔧 NOTIFIKASI KERUSAKAN ALAT*\n\n"
    . "📍 *Laboratorium*: {$this->id_laboratorium}\n"
    . "🧪 *Alat*: {$this->select_alat}\n"
    . "⚠️ *Kondisi*: {$this->kondisi}\n"
    . "📦 *Jumlah*: {$this->jumlah}\n"
    . "📊 *Status*: *{$status->nama}*\n\n"
    . "🕒 *Waktu*: " . now()->format('d-m-Y H:i') . "\n\n"
    ,
            ],
            CURLOPT_HTTPHEADER => ['Authorization: ySAm52vBc7AsrfkytNxr'],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        $this->reset(['nama', 'kondisi', 'jumlah', 'id_status', 'id_laboratorium', 'select_alat']);
        $this->resetValidation();
        $this->dispatch('modal-close', name: 'modal-alat-tambah');
        Flux::toast(variant: 'success', text: __('Data kerusakan alat berhasil disimpan.'));
    }

    public function ubah($id)
    {
        $this->validate(
            [
                'select_alat' => $this->rules()['select_alat'],
                'id_laboratorium' => $this->rules()['id_laboratorium'],
                'kondisi' => $this->rules()['kondisi'],
                'jumlah' => $this->rules()['jumlah'],
                'id_status' => $this->rules()['id_status'],
            ],
            $this->messages(),
        );

        $kerusakan = Kerusakan::query()->select('id', 'id_persediaan', 'id_status')->findOrFail($id);
        $statusLama = $kerusakan->id_status;

        $kerusakan->update([
            'id_persediaan' => $this->select_alat,
            'id_laboratorium' => $this->id_laboratorium,
            'kondisi' => $this->kondisi,
            'jumlah' => $this->jumlah,
            'id_status' => $this->id_status,
        ]);

        Persediaan::whereKey($this->select_alat)->update([
            'id_status' => $this->id_status,
        ]);

        if ((string) $statusLama !== (string) $this->id_status) {
            KerusakanStatusChange::create([
                'kerusakan_id' => $kerusakan->id,
                'status_lama' => $statusLama,
                'status_baru' => $this->id_status,
                'user_id' => auth()->id(),
            ]);

            $this->dispatch('notification-updated');
        }

        $this->editId = null;
        $this->reset(['nama', 'kondisi', 'jumlah', 'id_status', 'id_laboratorium', 'select_alat']);
        $this->resetValidation();
        $this->dispatch('modal-close', name: 'modal-alat-ubah');
        Flux::toast(variant: 'success', text: __('Data alat berhasil diubah.'));
    }

    public function hapus()
    {
        $kerusakan = Kerusakan::findOrFail($this->hapusId);
        $kerusakan->delete();

        $this->reset(['hapusId', 'hapusNama']);
        $this->dispatch('modal-close', name: 'modal-alat-hapus');

        Flux::toast(variant: 'success', text: __('Data kerusakan berhasil dihapus.'));
    }

    public function modalTambah()
    {
        $this->editId = null;
        $this->reset(['nama', 'kondisi', 'jumlah', 'id_status', 'id_laboratorium', 'select_alat']);
        $this->resetValidation();
        $this->dispatch('modal-show', name: 'modal-alat-tambah');
    }

    public function modalUbah($id)
    {
        $this->resetValidation();

        $kerusakan = Kerusakan::findOrFail($id);

        $this->editId = $kerusakan->id;
        $this->id_laboratorium = $kerusakan->id_laboratorium;
        $this->select_alat = $kerusakan->id_persediaan;
        $this->kondisi = $kerusakan->kondisi;
        $this->jumlah = $kerusakan->jumlah;
        $this->id_status = $kerusakan->id_status;

        $this->dispatch('modal-show', name: 'modal-alat-ubah');
    }

    public function modalHapus($id)
    {
        $this->resetValidation();

        $kerusakan = Kerusakan::query()->select('id', 'id_persediaan')->with('persediaan:id,nama')->findOrFail($id);

        $this->hapusId = $kerusakan->id;
        $this->hapusNama = $kerusakan->persediaan?->nama ?? '-';

        $this->dispatch('modal-show', name: 'modal-alat-hapus');
    }
};

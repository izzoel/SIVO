<?php

use App\Models\Laboratorium;
use App\Models\Lokasi;
use App\Support\ColorHelper;
use Flux\Flux;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public $nama, $gedung, $warna;
    public $lokasiNama, $lokasiLaboratorium, $lokasiWarna;

    public $editId = null;
    public $editLokasiId = null;
    public $hapusId = null;
    public $hapusNama = '';

    public $filterGedung = '';
    public $filterLaboratorium = '';
    public string $search = '';
    public $sortBy = 'nama';
    public $sortDirection = 'asc';

    protected function rules()
    {
        return [
            'nama' => 'required',
            'gedung' => 'required',
            'warna' => 'required',
            'lokasiNama' => 'required',
            'lokasiWarna' => 'required',
        ];
    }

    protected function messages()
    {
        return [
            'nama.required' => 'Tulis nama laboratorium.',
            'gedung.required' => 'Pilih gedung laboratorium.',
            'warna.required' => 'Pilih warna label.',
            'lokasiNama.required' => 'Tulis nama lokasi.',
            'lokasiWarna.required' => 'Pilih warna label lokasi.',
        ];
    }

    public function mount()
    {
        $this->syncLaboratorium();
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

    public function updatedFilterGedung()
    {
        $this->resetPage();
    }

    public function updatedFilterLaboratorium()
    {
        $this->resetPage();
    }

    #[Computed]
    public function laboratoriums()
    {
        $sortBy = in_array($this->sortBy, ['nama', 'gedung'], true) ? $this->sortBy : 'nama';

        return Laboratorium::query()
        ->when($this->filterGedung, function ($query) {
            $query->where('gedung', $this->filterGedung);
        })
        ->when($this->search, function ($query) {
            $query->where(function ($subQuery) {
                $subQuery->where('nama', 'like', '%' . $this->search . '%')->orWhere('gedung', 'like', '%' . $this->search . '%');
            });
        })
        ->orderBy($sortBy, $this->sortDirection)
        ->paginate();
    }

    #[Computed]
    public function gedungs()
    {
        return Laboratorium::query()
        ->whereNotNull('gedung')
        ->where('gedung', '!=', '')
        ->select('gedung')
        ->distinct()
        ->orderBy('gedung')
        ->pluck('gedung');
    }

    #[Computed]
    public function lokasis()
    {
        $sortBy = in_array($this->sortBy, ['nama', 'id_laboratorium'], true) ? $this->sortBy : 'nama';

        return Lokasi::query()
        ->with('laboratorium')
        ->when($this->filterLaboratorium, function ($query) {
            $query->where('id_laboratorium', $this->filterLaboratorium);
        })
        ->when($this->search, function ($query) {
            $query->where(function ($subQuery) {
                $subQuery->where('nama', 'like', '%' . $this->search . '%');
            });
        })
        ->orderBy($sortBy, $this->sortDirection)
        ->paginate();
    }

    public function syncLaboratorium()
    {
        $response = Http::timeout(30)->get(env('API_LAMDA'));

        if (!$response->successful()) {
            session()->flash('error', 'Gagal mengambil data API');
            return;
        }

        $data = $response->json('data');
        // dd($data);
        foreach ($data as $item)
            {
            Laboratorium::updateOrCreate([
                'id' => $item['id']
            ],
            [
                'nama' => $item['nama'] ?? null,
                'fakultas' => $item['fakultas'] ?? null,
                'gedung' => $item['gedung'] ?? null,
                'deskripsi' => $item['deskripsi'] ?? null,
                'gambar' => $item['gambar'] ?? null,
                'id_laboran' => $item['id_laboran'] ?? null,
                ]
            );
        }

        session()->flash('success', 'Data laboratorium berhasil disinkronkan');
    }

    public function ubah($id)
    {
        $this->validate(
            [
                'nama' => $this->rules()['nama'],
                'gedung' => $this->rules()['gedung'],
                'warna' => $this->rules()['warna'],
            ],
            $this->messages(),
        );

        $laboratorium = Laboratorium::findOrFail($id);

        $laboratorium->update([
            'nama' => $this->nama,
            'gedung' => $this->gedung,
            'warna' => $this->warna,
        ]);

        $this->editId = null;
        $this->reset(['nama', 'gedung', 'warna']);
        $this->dispatch('modal-close', name: 'modal-laboratorium-ubah');
        Flux::toast(variant: 'success', text: __('Data berhasil diubah.'));
    }

    public function modalUbah($id)
    {
        $laboratorium = Laboratorium::findOrFail($id);

        $this->editId = $laboratorium->id;
        $this->nama = $laboratorium->nama;
        $this->gedung = $laboratorium->gedung;
        $this->warna = $laboratorium->warna;

        $this->dispatch('modal-show', name: 'modal-laboratorium-ubah');
    }

    public function ubahLokasi($id)
    {
        $this->validate(
            [
                'lokasiNama' => $this->rules()['lokasiNama'],
                'lokasiWarna' => $this->rules()['lokasiWarna'],
            ],
            $this->messages(),
        );

        $lokasi = Lokasi::findOrFail($id);

        $lokasi->update([
            'nama' => $this->lokasiNama,
            'warna' => $this->lokasiWarna,
        ]);

        $this->editLokasiId = null;
        $this->reset(['lokasiNama', 'lokasiWarna']);
        $this->dispatch('modal-close', name: 'modal-lokasi-ubah');
        Flux::toast(variant: 'success', text: __('Data lokasi berhasil diubah.'));
    }

    public function modalUbahLokasi($id)
    {
        $lokasi = Lokasi::findOrFail($id);

        $this->editLokasiId = $lokasi->id;
        $this->lokasiNama = $lokasi->nama;
        $this->lokasiLaboratorium = $lokasi->laboratorium->nama;
        $this->lokasiWarna = $lokasi->warna;

        $this->dispatch('modal-show', name: 'modal-lokasi-ubah');
    }
};

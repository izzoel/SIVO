<?php

use App\Models\Kerusakan;
use App\Models\Laboratorium;
use App\Models\Persediaan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    private array $jenisLabels = [
        'alat' => 'Alat',
        'cair' => 'Bahan Cair',
        'padat' => 'Bahan Padat',
        'gas' => 'Gas',
    ];

    private array $jenisColors = [
        'alat' => 'bg-lime-500',
        'cair' => 'bg-sky-500',
        'padat' => 'bg-violet-500',
        'gas' => 'bg-amber-500',
    ];

    #[Computed]
    public function summary()
    {
        $totalAlat = Persediaan::query()->where('jenis', 'alat')->count();
        $totalBahan = Persediaan::query()->whereIn('jenis', ['cair', 'padat', 'gas'])->count();
        $stokTotal = (int) Persediaan::query()->sum('stok');
        $kerusakanAktif = Kerusakan::query()->count();
        $laboratorium = Laboratorium::query()->count();
        $prioritasInspeksi = Kerusakan::query()->distinct('id_laboratorium')->count('id_laboratorium');

        return [
            'totalAlat' => $totalAlat,
            'totalBahan' => $totalBahan,
            'stokTotal' => $stokTotal,
            'kerusakanAktif' => $kerusakanAktif,
            'laboratorium' => $laboratorium,
            'prioritasInspeksi' => $prioritasInspeksi,
            'stokAmanPersen' => $stokTotal > 0 ? round(Persediaan::query()->where('stok', '>', 0)->sum('stok') / $stokTotal * 100) : 0,
        ];
    }

    #[Computed]
    public function trend()
    {
        $months = collect(range(5, 0))->map(fn ($index) => Carbon::now()->subMonths($index)->startOfMonth());

        $persediaan = $this->monthlyCounts(Persediaan::query()->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as bulan, COUNT(*) as total")->groupBy('bulan')->pluck('total', 'bulan'));
        $kerusakan = $this->monthlyCounts(Kerusakan::query()->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as bulan, COUNT(*) as total")->groupBy('bulan')->pluck('total', 'bulan'));
        $max = max($persediaan->max() ?: 0, $kerusakan->max() ?: 0, 1);

        return [
            'labels' => $months->map(fn ($month) => $month->translatedFormat('M'))->values(),
            'persediaan' => $this->chartPoints($persediaan->values(), $max),
            'kerusakan' => $this->chartPoints($kerusakan->values(), $max),
        ];
    }

    private function monthlyCounts($counts)
    {
        return collect(range(5, 0))->map(function ($index) use ($counts) {
            $key = Carbon::now()->subMonths($index)->format('Y-m');

            return (int) ($counts[$key] ?? 0);
        });
    }

    private function chartPoints($values, int $max): string
    {
        return $values
            ->map(function ($value, $index) use ($max) {
                $x = 64 + ($index * 122);
                $y = 230 - (($value / $max) * 168);

                return $x . ',' . round($y, 1);
            })
            ->implode(' ');
    }

    #[Computed]
    public function composition()
    {
        $items = Persediaan::query()
            ->select('jenis', DB::raw('SUM(stok) as total'))
            ->groupBy('jenis')
            ->pluck('total', 'jenis');

        $total = max((int) $items->sum(), 1);

        return collect($this->jenisLabels)->map(function ($label, $jenis) use ($items, $total) {
            $value = (int) ($items[$jenis] ?? 0);

            return [
                'label' => $label,
                'value' => $value,
                'percent' => round($value / $total * 100),
                'color' => $this->jenisColors[$jenis],
            ];
        })->values();
    }

    #[Computed]
    public function labStatuses()
    {
        $stokByLab = Persediaan::query()->select('id_laboratorium', DB::raw('SUM(stok) as total'))->groupBy('id_laboratorium')->pluck('total', 'id_laboratorium');
        $kerusakanByLab = Kerusakan::query()->select('id_laboratorium', DB::raw('COUNT(*) as total'))->groupBy('id_laboratorium')->pluck('total', 'id_laboratorium');

        return Laboratorium::query()
            ->orderBy('nama')
            ->limit(5)
            ->get()
            ->map(function ($laboratorium) use ($stokByLab, $kerusakanByLab) {
                $kerusakan = (int) ($kerusakanByLab[$laboratorium->id] ?? 0);
                $stok = (int) ($stokByLab[$laboratorium->id] ?? 0);

                return [
                    'nama' => $laboratorium->nama,
                    'status' => $kerusakan > 0 ? $kerusakan . ' laporan kerusakan' : $stok . ' stok tersedia',
                    'badge' => $kerusakan > 0 ? 'Perlu Dicek' : 'Aktif',
                    'color' => $kerusakan > 0 ? 'amber' : 'lime',
                ];
            });
    }

    #[Computed]
    public function recentActivities()
    {
        $persediaans = Persediaan::query()
            ->select('nama', 'jenis', 'created_at')
            ->latest()
            ->limit(4)
            ->get()
            ->map(fn ($item) => [
                'time' => $item->created_at?->format('H:i') ?? '-',
                'text' => 'Persediaan ' . $item->nama . ' ditambahkan',
                'created_at' => $item->created_at,
            ]);

        $kerusakans = Kerusakan::query()
            ->with('persediaan:id,nama')
            ->latest()
            ->limit(4)
            ->get()
            ->map(fn ($item) => [
                'time' => $item->created_at?->format('H:i') ?? '-',
                'text' => 'Laporan kerusakan ' . ($item->persediaan?->nama ?? 'alat') . ' dibuat',
                'created_at' => $item->created_at,
            ]);

        return $persediaans
            ->merge($kerusakans)
            ->sortByDesc('created_at')
            ->take(5)
            ->values();
    }
}; ?>

<div class="space-y-6">
    <div class="rounded-xl border border-zinc-200 bg-white p-4 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')" :current="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
        <div class="space-y-2">
            <flux:heading class="mb-0!" size="xl">{{ __('Dashboard Laboratorium') }}</flux:heading>
            <flux:text class="text-zinc-600 dark:text-zinc-400">
                {{ __('Ringkasan persediaan, kondisi alat, dan aktivitas laboratorium.') }}
            </flux:text>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            <flux:button :href="route('persediaan.alat')" wire:navigate size="sm" variant="primary" icon="wrench-screwdriver">
                {{ __('Persediaan') }}
            </flux:button>
            <flux:button :href="route('laporan.kerusakan')" wire:navigate size="sm" variant="subtle" icon="document-text">
                {{ __('Laporan') }}
            </flux:button>
        </div>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-xl border border-zinc-200 bg-white p-4 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <flux:text class="text-sm text-zinc-500 dark:text-zinc-400">{{ __('Total Alat') }}</flux:text>
                    <div class="mt-2 text-3xl font-semibold tracking-normal text-zinc-950 dark:text-white">{{ number_format($this->summary['totalAlat'], 0, ',', '.') }}</div>
                </div>
                <div class="rounded-lg bg-lime-100 p-2 text-lime-700 dark:bg-lime-400/10 dark:text-lime-300">
                    <flux:icon.wrench-screwdriver class="size-5" />
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2 text-sm">
                <span class="rounded-md bg-lime-100 px-2 py-1 font-medium text-lime-700 dark:bg-lime-400/10 dark:text-lime-300">{{ number_format($this->summary['stokTotal'], 0, ',', '.') }}</span>
                <span class="text-zinc-500 dark:text-zinc-400">{{ __('total stok') }}</span>
            </div>
        </div>

        <div class="rounded-xl border border-zinc-200 bg-white p-4 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <flux:text class="text-sm text-zinc-500 dark:text-zinc-400">{{ __('Bahan Tersedia') }}</flux:text>
                    <div class="mt-2 text-3xl font-semibold tracking-normal text-zinc-950 dark:text-white">{{ number_format($this->summary['totalBahan'], 0, ',', '.') }}</div>
                </div>
                <div class="rounded-lg bg-sky-100 p-2 text-sky-700 dark:bg-sky-400/10 dark:text-sky-300">
                    <flux:icon.beaker class="size-5" />
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2 text-sm">
                <span class="rounded-md bg-sky-100 px-2 py-1 font-medium text-sky-700 dark:bg-sky-400/10 dark:text-sky-300">{{ $this->summary['stokAmanPersen'] }}%</span>
                <span class="text-zinc-500 dark:text-zinc-400">{{ __('stok tersedia') }}</span>
            </div>
        </div>

        <div class="rounded-xl border border-zinc-200 bg-white p-4 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <flux:text class="text-sm text-zinc-500 dark:text-zinc-400">{{ __('Kerusakan Aktif') }}</flux:text>
                    <div class="mt-2 text-3xl font-semibold tracking-normal text-zinc-950 dark:text-white">{{ number_format($this->summary['kerusakanAktif'], 0, ',', '.') }}</div>
                </div>
                <div class="rounded-lg bg-amber-100 p-2 text-amber-700 dark:bg-amber-400/10 dark:text-amber-300">
                    <flux:icon.exclamation-triangle class="size-5" />
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2 text-sm">
                <span class="rounded-md bg-amber-100 px-2 py-1 font-medium text-amber-700 dark:bg-amber-400/10 dark:text-amber-300">{{ number_format($this->summary['prioritasInspeksi'], 0, ',', '.') }}</span>
                <span class="text-zinc-500 dark:text-zinc-400">{{ __('lab perlu inspeksi') }}</span>
            </div>
        </div>

        <div class="rounded-xl border border-zinc-200 bg-white p-4 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <flux:text class="text-sm text-zinc-500 dark:text-zinc-400">{{ __('Laboratorium') }}</flux:text>
                    <div class="mt-2 text-3xl font-semibold tracking-normal text-zinc-950 dark:text-white">{{ number_format($this->summary['laboratorium'], 0, ',', '.') }}</div>
                </div>
                <div class="rounded-lg bg-fuchsia-100 p-2 text-fuchsia-700 dark:bg-fuchsia-400/10 dark:text-fuchsia-300">
                    <flux:icon.home-modern class="size-5" />
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2 text-sm">
                <span class="rounded-md bg-fuchsia-100 px-2 py-1 font-medium text-fuchsia-700 dark:bg-fuchsia-400/10 dark:text-fuchsia-300">{{ $this->labStatuses->count() }}</span>
                <span class="text-zinc-500 dark:text-zinc-400">{{ __('ditampilkan') }}</span>
            </div>
        </div>
    </div>

    <div class="grid gap-4 xl:grid-cols-3">
        <div class="rounded-xl border border-zinc-200 bg-white p-4 xl:col-span-2 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <flux:heading class="mb-0!" size="lg">{{ __('Tren Data') }}</flux:heading>
                    <flux:text class="text-sm text-zinc-500 dark:text-zinc-400">{{ __('Persediaan baru dan laporan kerusakan selama 6 bulan.') }}</flux:text>
                </div>
                <div class="flex items-center gap-4 text-sm text-zinc-600 dark:text-zinc-400">
                    <span class="flex items-center gap-2"><span class="size-2 rounded-full bg-lime-500"></span>{{ __('Persediaan') }}</span>
                    <span class="flex items-center gap-2"><span class="size-2 rounded-full bg-sky-500"></span>{{ __('Kerusakan') }}</span>
                </div>
            </div>

            <div class="mt-6 overflow-hidden rounded-lg border border-zinc-100 bg-zinc-50 p-3 dark:border-zinc-800 dark:bg-zinc-950">
                <svg class="h-72 w-full" viewBox="0 0 760 280" role="img" aria-label="{{ __('Grafik tren data laboratorium') }}">
                    <g class="text-zinc-300 dark:text-zinc-700" stroke="currentColor" stroke-width="1">
                        <line x1="44" y1="30" x2="44" y2="230" />
                        <line x1="44" y1="230" x2="730" y2="230" />
                        <line x1="44" y1="180" x2="730" y2="180" opacity=".55" />
                        <line x1="44" y1="130" x2="730" y2="130" opacity=".55" />
                        <line x1="44" y1="80" x2="730" y2="80" opacity=".55" />
                    </g>
                    <polyline points="{{ $this->trend['persediaan'] }}" fill="none" stroke="#84cc16" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                    <polyline points="{{ $this->trend['kerusakan'] }}" fill="none" stroke="#0ea5e9" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                    <g class="fill-zinc-500 text-xs dark:fill-zinc-400">
                        @foreach ($this->trend['labels'] as $index => $label)
                            <text x="{{ 54 + ($index * 122) }}" y="258">{{ $label }}</text>
                        @endforeach
                    </g>
                </svg>
            </div>
        </div>

        <div class="rounded-xl border border-zinc-200 bg-white p-4 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:heading class="mb-0!" size="lg">{{ __('Komposisi Persediaan') }}</flux:heading>
            <flux:text class="text-sm text-zinc-500 dark:text-zinc-400">{{ __('Distribusi stok berdasarkan kategori.') }}</flux:text>

            <div class="mt-6 space-y-5">
                @foreach ($this->composition as $item)
                    <div>
                        <div class="mb-2 flex items-center justify-between text-sm">
                            <span class="font-medium text-zinc-700 dark:text-zinc-200">{{ $item['label'] }}</span>
                            <span class="text-zinc-500 dark:text-zinc-400">{{ $item['percent'] }}%</span>
                        </div>
                        <div class="h-2 rounded-full bg-zinc-100 dark:bg-zinc-800">
                            <div class="h-2 rounded-full {{ $item['color'] }}" style="width: {{ $item['percent'] }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="grid gap-4 lg:grid-cols-2">
        <div class="rounded-xl border border-zinc-200 bg-white p-4 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:heading class="mb-0!" size="lg">{{ __('Status Laboratorium') }}</flux:heading>
            <div class="mt-4 divide-y divide-zinc-100 dark:divide-zinc-800">
                @forelse ($this->labStatuses as $laboratorium)
                    <div class="flex items-center justify-between gap-3 py-3">
                        <div>
                            <div class="font-medium text-zinc-900 dark:text-white">{{ $laboratorium['nama'] }}</div>
                            <div class="text-sm text-zinc-500 dark:text-zinc-400">{{ $laboratorium['status'] }}</div>
                        </div>
                        <flux:badge :color="$laboratorium['color']">{{ $laboratorium['badge'] }}</flux:badge>
                    </div>
                @empty
                    <div class="py-6 text-center text-sm text-zinc-500">{{ __('Belum ada data laboratorium.') }}</div>
                @endforelse
            </div>
        </div>

        <div class="rounded-xl border border-zinc-200 bg-white p-4 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:heading class="mb-0!" size="lg">{{ __('Aktivitas Terbaru') }}</flux:heading>
            <div class="mt-4 space-y-4">
                @forelse ($this->recentActivities as $activity)
                    <div class="flex gap-3">
                        <div class="mt-1 size-2 rounded-full bg-lime-500"></div>
                        <div class="min-w-0">
                            <div class="text-sm font-medium text-zinc-900 dark:text-white">{{ $activity['text'] }}</div>
                            <div class="text-sm text-zinc-500 dark:text-zinc-400">{{ $activity['time'] }}</div>
                        </div>
                    </div>
                @empty
                    <div class="py-6 text-center text-sm text-zinc-500">{{ __('Belum ada aktivitas terbaru.') }}</div>
                @endforelse
            </div>
        </div>
    </div>
</div>

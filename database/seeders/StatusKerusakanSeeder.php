<?php

namespace Database\Seeders;

use App\Models\StatusKerusakan;
use Illuminate\Database\Seeder;

class StatusKerusakanSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['nama' => 'Tersedia', 'warna' => '#22c55e'],
            ['nama' => 'Pembelian', 'warna' => '#3b82f6'],
            ['nama' => 'Pengajuan', 'warna' => '#f59e0b'],
            ['nama' => 'Peninjauan', 'warna' => '#8b5cf6'],
            ['nama' => 'Perbaikan', 'warna' => '#f97316'],
            ['nama' => 'Rusak Total', 'warna' => '#ef4444'],
            ['nama' => 'Selesai', 'warna' => '#14b8a6'],
        ];

        foreach ($statuses as $status) {
            StatusKerusakan::updateOrCreate(
                ['nama' => $status['nama']],
                [
                    'nama' => $status['nama'],
                    'warna' => $status['warna'],
                ],
            );
        }
    }
}

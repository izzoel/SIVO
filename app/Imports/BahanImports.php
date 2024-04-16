<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use App\Models\Bahan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCharts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BahanImports implements ToModel, WithChunkReading, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        Bahan::updateOrCreate(
            ['nama' => $row['nama_bahan']],
            ['stok' => $row['stok'], 'lokasi' => $row['lokasi'], 'jenis' => $row['jenis']]
        );
    }

    public function chunkSize(): int
    {
        return 1000; // Adjust the chunk size according to your needs
    }
}

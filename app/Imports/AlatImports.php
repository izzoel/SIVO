<?php

namespace App\Imports;

use App\Models\Alat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class AlatImports implements ToModel, WithChunkReading, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        Alat::updateOrCreate(
            ['nama' => $row['nama_bahan']],
            ['stok' => $row['stok'], 'satuan' => $row['satuan'], 'jenis' => $row['jenis'], 'lokasi' => $row['lokasi']]
        );
    }

    public function chunkSize(): int
    {
        return 1000; // Adjust the chunk size according to your needs
    }
}

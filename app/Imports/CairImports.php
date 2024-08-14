<?php

namespace App\Imports;

use App\Models\Cair;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CairImports implements ToModel, WithChunkReading, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        Cair::updateOrCreate(
            ['nama' => $row['nama_bahan']],
            ['stok' => $row['stok'], 'satuan' => $row['satuan'], 'lokasi' => $row['lokasi'], 'jenis' => $row['jenis']]
        );
    }

    public function chunkSize(): int
    {
        return 1000; // Adjust the chunk size according to your needs
    }
}

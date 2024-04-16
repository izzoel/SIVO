<?php

namespace App\Imports;

use App\Models\Bahan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BahanImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Bahan([
            'nama' => $row[0],
            'stok' => $row[1],
            'jenis' => $row[2],
            'lokasi' => $row[3],
        ]);
    }
}

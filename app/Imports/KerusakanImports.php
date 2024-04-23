<?php

namespace App\Imports;

use App\Models\Kerusakan;
use Maatwebsite\Excel\Concerns\ToModel;

class KerusakanImports implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // return new Kerusakan([
        //     //

        // ]);
        return new Kerusakan([
            ['nama' => $row['nama_alat']],
            'lokasi' => $row['lokasi'], ['kondisi' => $row['kondisi'],  'status' => $row['status']]
        ]);
    }
}

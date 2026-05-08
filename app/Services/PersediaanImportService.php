<?php

namespace App\Services;

use App\Models\Persediaan;

class PersediaanImportService
{
    public function importFromXlsx(string $path): array
    {
        $sheetRows = $this->readXlsxRows($path);
        $rows = [];
        $line = 0;
        $existingNames = Persediaan::query()
            ->whereNotNull('nama')
            ->pluck('nama')
            ->map(fn ($nama) => $this->normalizeNama($nama))
            ->filter()
            ->flip();

        $importedNames = [];

        foreach ($sheetRows as $row) {
            $line++;

            if ($line === 1) {
                continue;
            }

            $jenis = isset($row[0]) ? trim((string) $row[0]) : null;
            $nama = isset($row[1]) ? trim((string) $row[1]) : null;
            $stok = isset($row[2]) && is_numeric($row[2]) ? (int) $row[2] : 0;
            $spesifikasi = isset($row[3]) ? trim((string) $row[3]) : null;

            if (blank($nama)) {
                continue;
            }

            $normalizedNama = $this->normalizeNama($nama);

            if (isset($existingNames[$normalizedNama]) || isset($importedNames[$normalizedNama])) {
                continue;
            }

            $rows[] = [
                'jenis' => $jenis,
                'nama' => $nama,
                'stok' => $stok,
                'spesifikasi' => filled($spesifikasi) ? $spesifikasi : '-',
                'id_satuan' => 1,
                'id_lokasi' => 1,
                'id_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $importedNames[$normalizedNama] = true;
        }

        if ($rows === []) {
            throw new \RuntimeException('Tidak ada data baru yang valid untuk diimport. Nama yang sudah ada akan dilewati.');
        }

        return $rows;
    }

    protected function readXlsxRows(string $path): array
    {
        $zip = new \ZipArchive();

        if ($zip->open($path) !== true) {
            throw new \RuntimeException('File XLSX tidak dapat dibuka.');
        }

        $sharedStringsXml = $zip->getFromName('xl/sharedStrings.xml');
        $sheetXml = $zip->getFromName('xl/worksheets/sheet1.xml');

        if ($sheetXml === false) {
            $zip->close();
            throw new \RuntimeException('Sheet pertama pada file XLSX tidak ditemukan.');
        }

        $sharedStrings = $this->parseSharedStrings($sharedStringsXml ?: '');
        $rows = $this->parseWorksheetRows($sheetXml, $sharedStrings);

        $zip->close();

        return $rows;
    }

    protected function parseSharedStrings(string $xml): array
    {
        if ($xml === '') {
            return [];
        }

        $document = simplexml_load_string($xml);

        if ($document === false) {
            return [];
        }

        $document->registerXPathNamespace('main', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');

        $result = [];

        foreach ($document->xpath('//main:si') ?: [] as $item) {
            $item->registerXPathNamespace('main', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');
            $texts = $item->xpath('.//main:t') ?: [];
            $result[] = collect($texts)->map(fn($text) => (string) $text)->implode('');
        }

        return $result;
    }

    protected function parseWorksheetRows(string $xml, array $sharedStrings): array
    {
        $document = simplexml_load_string($xml);

        if ($document === false) {
            throw new \RuntimeException('Isi sheet XLSX tidak dapat dibaca.');
        }

        $document->registerXPathNamespace('main', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');

        $rows = [];

        foreach ($document->xpath('//main:sheetData/main:row') ?: [] as $rowNode) {
            $rowNode->registerXPathNamespace('main', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');
            $row = [];

            foreach ($rowNode->xpath('./main:c') ?: [] as $cell) {
                $cell->registerXPathNamespace('main', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');
                $reference = (string) $cell['r'];
                $columnIndex = $this->columnReferenceToIndex($reference);
                $type = (string) $cell['t'];
                $valueNode = $cell->xpath('./main:v')[0] ?? null;
                $value = $valueNode ? (string) $valueNode : '';

                if ($type === 's') {
                    $value = $sharedStrings[(int) $value] ?? '';
                }

                $row[$columnIndex] = $value;
            }

            if ($row !== []) {
                ksort($row);
                $rows[] = $row;
            }
        }

        return $rows;
    }

    protected function columnReferenceToIndex(string $reference): int
    {
        $letters = preg_replace('/[^A-Z]/', '', strtoupper($reference));
        $index = 0;

        for ($i = 0; $i < strlen($letters); $i++) {
            $index = $index * 26 + (ord($letters[$i]) - 64);
        }

        return max(0, $index - 1);
    }

    protected function normalizeNama($nama): string
    {
        return mb_strtolower(trim((string) $nama));
    }
}

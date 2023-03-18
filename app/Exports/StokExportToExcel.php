<?php

namespace App\Exports;

use App\Models\Masterbarang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StokExportToExcel implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function headings(): array
    {
        return [
            'Kode Barang',
            'Nama Barang',
            'Jumlah',
            'Satuan',
            'Kategori',
            'Harga Beli ',
            'Harga Jual',

        ];
    }
    public function collection()
    {
        return Masterbarang::all();
    }
}

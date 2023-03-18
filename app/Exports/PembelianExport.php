<?php

namespace App\Exports;

use App\Pembelianbarang;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;

class PembelianExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function forDate($tgl1,$tgl2)
    {
        $this->tgl1 = $tgl1;
        $this->tgl2 = $tgl2;

        return $this;
    }

    public function query()
    {
        return DB::table('tabel_rinci_pembelian')
        ->select('no_faktur_pembelian','kd_barang','nm_barang','jumlah','harga','sub_total_beli','tgl_beli')
        ->whereDate('tgl_beli','>=',$this->tgl1)
        ->whereDate('tgl_beli','<=',$this->tgl2)
        ->OrderBy('tgl_beli');
    }
}

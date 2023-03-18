<?php

namespace App\Exports;

// use App\Models\Penjualan;

use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;

class TransaksiExport implements FromQuery
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
        // return Penjualan::all();
        return DB::table('tabel_nota')
        ->join('tabel_rinci_penjualan','tabel_nota.nota','=','tabel_rinci_penjualan.nota')
        ->select('tabel_nota.nota','tabel_nota.tgl_transaksi','tabel_rinci_penjualan.kd_barang','tabel_rinci_penjualan.nm_barang','tabel_rinci_penjualan.jumlah','tabel_rinci_penjualan.harga','tabel_rinci_penjualan.sub_total_jual')
        ->whereDate('tabel_nota.tgl_transaksi','>=',$this->tgl1)
        ->whereDate('tabel_nota.tgl_transaksi','<=',$this->tgl2)
        ->orderBy('tabel_nota.tgl_transaksi');
        
    }


}

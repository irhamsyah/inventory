<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransaksiExport;
use App\Exports\PembelianExport;
use App\Exports\StokExportToExcel;
use App\Exports\NominatifExport;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ExportController extends Controller
{
    //
    public function exporttoexcel(Request $request)
    {
        // dd($request);
        return (new TransaksiExport)->forDate($request->tgl_awal,$request->tgl_akhir)->download('Transaksiharian.xlsx');
    }

    public function exporttoexcelpembelian(Request $request)
    {
        return (new PembelianExport)->forDate($request->tgl_awal,$request->tgl_akhir)->download('Pembelian.xlsx');
    }

    public function exportstoktoexcel(Request $request)
    {
        var_dump( (new StokExportToExcel)->download('Stok.xlsx'))   ;

    }

    public function prosesnominatif(Request $request)
    {
        $tgl='2023-01-01';
        $tes=DB::select('select NO_REKENING,SALDO_AKHIR from tabung limit 1000');
        return(new NominatifExport($tes))->download('nominatif.xlsx');
        // dd($tes) ;

    }
}

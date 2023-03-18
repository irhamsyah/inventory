<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View as ViewView;
use Maatwebsite\Excel\Concerns\FromView;

class NominatifExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    use Exportable;
    private $tgl;

    public function __construct(array $tgl)
    {
        $this->tgl = $tgl;
    }

    // public function map($nominfield): array
    // {
    //     return [
    //         $nominfield->NO_REKENING,
    //         $nominfield->nasabah_id,
    //         $nominfield->nama_nasabah,
    //         $nominfield->SALDO_AKHIR,
    //         $nominfield->SALDO_EFEKTIF_BLN_INI
    //     ];
    // }
    // public function headings(): array
    // {
    //     return [
    //         'NO_REKENING',
    //         'nasabah_id',
    //         'nama_nasabah',
    //         'SALDO_AKHIR',
    //         'SALDO_EFEKTIF_BLN_INI',
    //     ];
    // }


    public function view(): View
    {
            //     $sql="SELECT
            //     a.NO_REKENING,
            //     a.nasabah_id,
            //     a.no_id,
            //     a.nama_nasabah,
            //     a.alamat,
            //     a.tempatlahir,
            //     a.tgllahir,
            //     a.npwp,
            //     a.suku_bunga,(
            //     IF
            //         ( ISNULL( a.SALDO_AWAL ), 0, a.SALDO_AWAL ) +
            //     IF
            //         ( ISNULL( a.saldokreditblnlalu ), 0, a.saldokreditblnlalu ) -
            //     IF
            //         ( ISNULL( a.saldodebetblnlalu ), 0, a.saldodebetblnlalu ) 
            //         ) AS saldo_bln_lalu,(
            //     IF
            //         ( ISNULL( a.SALDO_AWAL ), 0, a.SALDO_AWAL ) +
            //     IF
            //         ( ISNULL( a.saldokreditblnlalu ), 0, a.saldokreditblnlalu ) -
            //     IF
            //         ( ISNULL( a.saldodebetblnlalu ), 0, a.saldodebetblnlalu ) -
            //     IF
            //         ( ISNULL( a.bungabln ), 0, a.bungabln ) +
            //     IF
            //         ( ISNULL( a.adminbln ), 0, a.adminbln ) 
            //     ) AS saldo_eff_bln_ini,
            // IF
            //     ( ISNULL( a.mutasi_debet ), 0, a.mutasi_debet ) AS mutasi_debet,
            // IF
            //     ( ISNULL( a.mutasi_kredit ), 0, a.mutasi_kredit ) AS mutasi_kredit,(
            //     IF
            //         ( ISNULL( a.SALDO_AWAL ), 0, a.SALDO_AWAL ) + a.saldokredit -
            //     IF
            //         ( ISNULL( a.saldodebet ), 0, a.saldodebet ) -
            //     IF
            //         ( ISNULL( a.bungabln ), 0, a.bungabln ) +
            //     IF
            //         ( ISNULL( a.adminbln ), 0, a.adminbln ) 
            //     ) AS saldo_sbl_bunga,
            // IF
            //     ( ISNULL( a.bungabln ), 0, a.bungabln ) AS bunga_bln_ini,
            //     0 AS pajak_bln_ini,
            // IF
            //     ( ISNULL( a.adminbln ), 0, a.adminbln ) AS admin_bln_ini,(
            //     IF
            //         ( ISNULL( a.SALDO_AWAL ), 0, a.SALDO_AWAL ) + a.saldokredit -
            //     IF
            //         ( ISNULL( a.saldodebet ), 0, a.saldodebet ) 
            //     ) AS saldo_stl_bunga,
            //     0 AS kupon,(
            //     IF
            //         ( ISNULL( a.SALDO_AWAL ), 0, a.SALDO_AWAL ) + a.saldokredit -
            //     IF
            //         ( ISNULL( a.saldodebet ), 0, a.saldodebet ) 
            //     ) AS saldo_nominatif,
            //     a.SALDO_BLOKIR,
            //     a.KODE_BI_PEMILIK,
            //     a.KODE_GROUP1,
            //     a.KODE_GROUP2,
            //     a.KODE_GROUP3,
            //     a.CAB AS kode_cab,
            //     a.TGL_REGISTRASI,
            //     a.JENIS_TABUNGAN,
            //     a.DESKRIPSI_JENIS_TABUNGAN,
            //     a.SETORAN_PER_BLN,
            //     a.TGL_MULAI,
            //     a.JKW,
            //     a.TGL_JT,
            //     a.NISBAH,
            //     a.KODE_BI_HUBUNGAN 
            // FROM
            //     (
            //     SELECT
            //         tabung.NO_REKENING,
            //         nasabah.nasabah_id,
            //         nasabah.no_id,
            //         nasabah.nama_nasabah,
            //         nasabah.alamat,
            //         nasabah.tempatlahir,
            //         nasabah.tgllahir,
            //         nasabah.npwp,
            //         tabung.suku_bunga,
            //         tabung.SALDO_AWAL,
            //         tabung.SALDO_BLOKIR,
            //         tabung.KODE_BI_PEMILIK,
            //         tabung.KODE_GROUP1,
            //         tabung.KODE_GROUP2,
            //         tabung.KODE_GROUP3,
            //         tabung.CAB,
            //         tabung.TGL_REGISTRASI,
            //         tabung.JENIS_TABUNGAN,
            //         kodejenistabungan.DESKRIPSI_JENIS_TABUNGAN,
            //         tabung.SETORAN_PER_BLN,
            //         tabung.TGL_MULAI,
            //         tabung.JKW,
            //         tabung.TGL_JT,
            //         tabung.NISBAH,
            //         tabung.KODE_BI_HUBUNGAN,
            //         x.saldokredit,
            //         y.saldodebet,
            //         z.adminbln,
            //         mutasikredit.mutasi_kredit,
            //         mutasidebet.mutasi_debet,
            //         sldkrdblnlalu.saldokreditblnlalu,
            //         slddbtblnlalu.saldodebetblnlalu,
            //         u.bungabln 
            //     FROM ((((((((( tabung INNER JOIN nasabah ON tabung.NASABAH_ID = 
            //     nasabah.nasabah_id ) INNER JOIN kodejenistabungan ON tabung.JENIS_TABUNGAN = 
            //     kodejenistabungan.KODE_JENIS_TABUNGAN) INNER JOIN (SELECT NO_REKENING,sum( 
            //     saldo_trans ) AS saldokredit FROM tabtrans WHERE MY_KODE_TRANS LIKE '1%' AND 
            //     tabtrans.tgl_trans <= ':inputantgl' GROUP BY tabtrans.NO_REKENING) x 
            //     ON tabung.NO_REKENING = x.NO_REKENING) LEFT JOIN (SELECT NO_REKENING,sum( 
            //     saldo_trans ) AS saldodebet FROM tabtrans WHERE MY_KODE_TRANS LIKE '2%' AND 
            //     tabtrans.tgl_trans <= ':inputantgl' GROUP BY tabtrans.NO_REKENING) 
            //     y ON tabung.NO_REKENING = y.NO_REKENING) LEFT JOIN (SELECT 
            //     tabtrans.tabtrans_id,tabtrans.no_rekening,tabtrans.saldo_trans AS adminbln 
            //     FROM tabtrans INNER JOIN ( SELECT MAX( TABTRANS_ID ) AS tabid, NO_REKENING 
            //     FROM tabtrans WHERE KUITANSI LIKE '%sys-a%' AND TGL_TRANS <=':inputantgl' GROUP BY NO_REKENING ) yy ON tabtrans.TABTRANS_ID = 
            //     yy.tabid) z ON tabung.NO_REKENING = z.NO_REKENING) LEFT JOIN (SELECT 
            //     tabtrans.tabtrans_id,tabtrans.no_rekening, tabtrans.saldo_trans AS bungabln 
            //     FROM tabtrans INNER JOIN ( SELECT MAX( TABTRANS_ID ) AS tabid, NO_REKENING 
            //     FROM tabtrans WHERE KUITANSI LIKE '%sys-b%' AND TGL_TRANS <=':inputantgl' GROUP BY NO_REKENING ) xx ON tabtrans.TABTRANS_ID = 
            //     xx.tabid) u ON tabung.NO_REKENING = u.NO_REKENING) LEFT JOIN (SELECT 
            //     NO_REKENING,sum( saldo_trans ) AS saldokreditblnlalu FROM tabtrans WHERE 
            //     MY_KODE_TRANS LIKE '1%' AND tabtrans.tgl_trans <= DATE_ADD(':inputantgl', 
            //     INTERVAL - DAY ( DATE(':inputantgl')) DAY ) GROUP BY 
            //     tabtrans.NO_REKENING) sldkrdblnlalu ON tabung.NO_REKENING = 
            //     sldkrdblnlalu.NO_REKENING) LEFT JOIN (SELECT NO_REKENING,sum( saldo_trans ) 
            //     AS saldodebetblnlalu FROM tabtrans WHERE MY_KODE_TRANS LIKE '2%' AND 
            //     tabtrans.tgl_trans <= DATE_ADD( ':inputantgl', INTERVAL - DAY ( date( 
            //     ':inputantgl' )) DAY ) GROUP BY tabtrans.NO_REKENING) slddbtblnlalu ON 
            //     tabung.NO_REKENING = slddbtblnlalu.NO_REKENING) LEFT JOIN (SELECT 
            //     NO_REKENING,sum( saldo_trans ) AS mutasi_kredit FROM tabtrans WHERE 
            //     MY_KODE_TRANS LIKE '1%' AND (tabtrans.tgl_trans > DATE_ADD(':inputantgl', 
            //     INTERVAL - DAY ( date(':inputantgl')) DAY ) AND tabtrans.tgl_trans <= 
            //     date(':inputantgl')) GROUP BY tabtrans.NO_REKENING) mutasikredit ON 
            //     tabung.NO_REKENING = mutasikredit.NO_REKENING) LEFT JOIN (SELECT NO_REKENING, 
            //     sum( saldo_trans ) AS mutasi_debet FROM tabtrans WHERE MY_KODE_TRANS LIKE 
            //     '2%' AND (tabtrans.tgl_trans > DATE_ADD(':inputantgl', INTERVAL - DAY ( 
            //     date(':inputantgl')) DAY) AND tabtrans.tgl_trans <= date(':inputantgl' 
            //     )) GROUP BY tabtrans.NO_REKENING) mutasidebet ON tabung.NO_REKENING = 
            //     mutasidebet.NO_REKENING WHERE tabung.STATUS_AKTIF = 2 
            //     ) a ORDER BY a.NO_REKENING";


            return view('eksporttes', [
                'nomin' => $this->tgl
            ]);
        
    }
}

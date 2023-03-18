<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// use App\Http\Controllers\Auth;
use Illuminate\Auth\Middleware\Authenticate;
use illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Kategori;
use App\Models\Satuanbarang;
use App\Models\Masterbarang;
use App\Models\Pembelianbarang;
use App\Models\Keranjang;
use App\Models\Nota;
use App\Models\Penjualan;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpParser\Node\Expr\FuncCall;

class BarangController extends Controller
{

//     public function __construct()
// {
//     $this->middleware('auth');
// }

public function __construct()
{
    $this->middleware('auth');
}
    // public function logout()
    // {
    //     auth()->logout();
    //     redirect('/');
    // }
    public function inputdatabarang()
    {
        $items = Satuanbarang::all();
        $items2 = Kategori::all();


        return view('forminputdatabarang', compact('items','items2'));
    }

    public function createdatabarang(Request $request)
    {
        // dd($request);
        $this->validate($request, [ 

            'kd_barang' => 'required|unique:tabel_barang',
            'nm_barang' => 'required|string',
            'hrg_jual'=> 'required|numeric',
            'hrg_beli' => 'required|numeric',
        ]);
        
        if (!empty($request->kd_barang)){
            $data = $request->only('kd_barang', 'nm_barang','jml_barang','kd_satuan','kd_kategori','hrg_jual','hrg_beli');
        }

        $kategoribrg = Masterbarang::create($data);

            //To show flash message on input form ypu must specify variable to load message on form/blade/template such as 'message'   
            session()->flash('message', 'Barang dgn kode : ' . $request->kd_barang .' Saved');
            session()->flash('type', 'success');
            return redirect('/inputdatabarang');

    }
    //Munculkan form input belibarang
    public function inputbelibarang()
    {
        // $items = Satuanbarang::all();
        $items2 = Masterbarang::all();
        // $kdbrng = DB::table('tabel_barang')
        // ->join('tabel_satuan_barang', 'tabel_barang.kd_satuan', '=', 'tabel_satuan_barang.kd_satuan')
        // ->select('tabel_barang.kd_satuan', 'tabel_satuan_barang.nm_satuan')
        // ->get();

        return view('forminputbelibarang',compact('items2'));
    }

    //Simpan data beli barang untuk TOKO
    public function createbelibarang(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'no_faktur_pembelian'=>'required',
            'kd_barang'=> 'required',
            'nm_barang'=>'required',
            'tgl_beli'=>'required',
        ]);

        if(!empty($request->no_faktur_pembelian))
        {
            $data = $request->only('no_faktur_pembelian','kd_barang','nm_barang','satuan','harga','jumlah','sub_total_beli');
            $data['tgl_beli']=date('Y-m-d',strtotime($request->tgl_beli));
        }
            $trsbelibarang = Pembelianbarang::create($data);

            // Proses UPDATE Data Master Barang 
            $result = DB::table('tabel_barang')->where('kd_barang', $request->kd_barang)->first();
            // Jika harga dipasaran NAIK dan hrg belom diupdate
            if($request->harga>$result->hrg_beli){
                Masterbarang::where('kd_barang',$request->kd_barang)
                ->update(['hrg_beli'=>($result->harga)]);
            }
            Masterbarang::where('kd_barang',$request->kd_barang)
                        ->update(['jml_barang'=>($result->jml_barang+$request->jumlah)]);
            // Show message Flash message
            session()->flash('message','Data Pembelian barang '. $request->no_faktur_pembelian .'Tersimpan');
            session()->flash('type', 'sukses');
            return redirect('inputbelibarang');
    }
    // Menampilkan list master barang
    public function viewinputdatabarang()
    {
        $databarang = Masterbarang::all();
        return view('viewinputbarang', ['databarang'=>$databarang]);
    }

    //menampilkan form edit barang
    public function editbarang($id)
    {
        $databrg = Masterbarang::find($id);
        $items = Satuanbarang::all();
        $items2 = Kategori::all();

        return view('editdatabarang',['databrg'=>$databrg,'items'=>$items,'items2'=>$items2]);

    }

    //modul menUpdate Data Master Barang
    public function updatedatabarang(Request $request)
    {
        // dd($request);
        $data = Masterbarang::findOrFail($request->kd_barang);

        $this->validate($request, 
        [
            'kd_barang'=>'required',
            'nm_barang'=>'required',
            'kd_satuan'=>'required',
            'kd_kategori'=>'required',
            'hrg_beli'=>'required|numeric',
            'hrg_jual'=>'required|numeric',
        ]);

            $databarang = $request->only('kd_barang','nm_barang','kd_satuan','kd_kategori','hrg_jual','hrg_beli');
            $data->update($databarang);

        session()->flash('message','Data Barang : '.$request->kd_barang.' Berhasil DiUpdate');
        session()->flash('type','success');
        return redirect('/viewinputdatabarang');
    }
    // hapus master barang
    public function hapusbarang($id)
    {
        // dd($id);
        // $data = Masterbarang::find($id);
        $hapusbarang = Masterbarang::where('kd_barang','=', $id)->delete();
        return redirect()->route('viewinputdatabarang')->with('message',$id .' Deleted');
    }

    //Menampilkan List Pembelian barang All
    public function viewbelibarang()
    {
        $listpembelian = Pembelianbarang::all();
        return view('viewlistbelibarang',['listpembelian'=>$listpembelian]);
    }

    // Hapus transaksi pembelian barang
    public function hapusbelibarang($id)
    {
        // $data = Pembelianbarang::find($id);
        $data = Pembelianbarang::findorFail($id);

        $result = Masterbarang::findorFail($data->kd_barang);
        if(($result->jml_barang - $data->jumlah)<0)
        {
            return redirect()->route('viewbelibarang')->with('message',$data->nm_barang.' Minus Jika dikurangi pembelian No: '.$id);
        }
        else
        {
        Masterbarang:: where('kd_barang','=',$data->kd_barang)
                        ->update(['jml_barang'=>($result->jml_barang - $data->jumlah)]);
        $hapuslist=Pembelianbarang::where('id','=',$id)->delete();

        }
        return redirect()->route('viewbelibarang')->with('message','Pembelian no : '.$id.' Deleted');

    }
    // Menampilkan form Penjualan Barang -->
    public function penjualanbarang()
    {
        $listpembelian = Masterbarang::all();
        return view('frmtransaksi',['listpembelian'=>$listpembelian]);
        // return view('frmtransaksiajax');
    }

    // dapatin barang dengan AJAX
    public function caribarangajax()
    {   
        // $id=$request->kd_barang;
        $cari = Masterbarang::all();
        return response()->json(['cari'=>$cari]);
    }
    //Menampilkan Form Update Item yg akan dijual (RMTRANSAKSIEDIT)
    public function pembelian($id)
    {
        $produk = Masterbarang::findorFail($id);
        return view('frmtransaksiedit',['produk'=>$produk]);
    }

    //MENYIMPAN/UPDATE DATA BARANG2 YG DIBELI PELANGGAN KE TABEL KERANJANG
    // DAN DITERUSKAN KE FUNGSI KERANJANG VIEW UNTUK DITAMPILKAN
    public function listtransaksi(Request $request)
    {
        // dd($request);
        if($request->jumlah>$request->stok)
        {
            session()->flash('message', 'Jumlah Item yg dijual lebih besar dari persedian');
            session()->flash('type', 'error');
                return redirect('/pembelian/'.$$request->kd_barang);
        }
        else{
            // SIMPAN KE TABEL KERANJANG
            $this->validate($request,[
                'kd_barang'=>'required',
                'nm_barang'=>'required',
                'jumlah'=>'required|numeric',
                'harga'=>'required|numeric',
            ]);

            $data = $request->only('kd_barang','nm_barang','jumlah','harga','stok');

            // $cari = Keranjang::findorFail($request->kd_barang);
            $cari=Keranjang::where('kd_barang','=',trim($request->kd_barang))->get();
            // MENNETUKAN VARIABEL 
            $test=0;
            foreach($cari as $value)
            {
                $test = $value->jumlah;

            }
            if($test>0)
            {

                $jumlahitem = $request->jumlah+$test;
                // dd($jumlahitem);
                $req =Keranjang::where('kd_barang',$request->kd_barang)
                ->update( ['jumlah'=>$jumlahitem] );

            }else
            {
                Keranjang::create($data);
            }
        }
            return redirect()->route('keranjangview');
    }

    public function keranjangview()
    {
        $listpembelian=Keranjang::all();
        return view('listtransaksi',['listpembelian'=>$listpembelian]);
    }
// -------------------------------------------------------------

    //DELETE DATA TRANSAKSI PENJUALAN
    public function listtransaksdestroy($id)
    {
        // dd($id);
        $hapus = Keranjang::where('id',$id)->delete();
        return redirect()->route('keranjangview');
    }
    // -------------------------------

    // EDIT DATA TRANSAKSI PENJUALAN
    public function editlisttransaksi($id)
    {
        $cari=Keranjang::where('id',$id)->update([]);
    }
    public function keranjangupdate(Request $request)
    {
        // dd($request);
        $index=0;
        foreach($request->id as $id){

            $cari = Masterbarang::findorFail($request->kd_barang[$index]);
            if($request->jumlah[$index]>$cari->jml_barang)
            {
                // return redirect()->route('keranjangview');
                return redirect()->route('keranjangview')->with('message',$request->nm_barang[$index].' Minus Jika dikurangi pembelian No: '.$id);

            }else{
            Keranjang::where('id','=',$id)
            ->update(['jumlah'=>$request->jumlah[$index]]);

            }
            $index++;
        }
        return redirect()->route('keranjangview')->with('message',' Barang Berhasil Diupdate');


        }
        public function keranjangcheckout(Request $request)
        {
        $listpembelian = Keranjang::all();
        return view('checkouttransaksi',['listpembelian'=>$listpembelian]);
        }

        public function keranjangcetak(Request $request)
        {
            // dd($request);
            // echo(count($request->id));
            // PROSES CETAK STRUK

            $this->validate($request,
            [   'nota'=>'required',
                'kd_barang'=>'required',
                'nm_barang'=>'required',
                'jumlah'=>'required',
                'harga'=>'required',
                'tgl_transaksi'=>'required',
                'sub_total_jual'=>'required',
            ]);

            // $data[] = $request->only('nota','kd_barang','nm_barang','jumlah','harga','sub_total_jual');
            $tgl_transaksi=date('Y-m-d',strtotime($request->tgl_transaksi));

            $index=0;
            foreach($request->kd_barang as $value)
            {  
                $penjualan = new Penjualan;
                $penjualan->nota = $request->nota;
                $penjualan->kd_barang=$request->kd_barang[$index];
                $penjualan->nm_barang=$request->nm_barang[$index];
                $penjualan->jumlah=$request->jumlah[$index];
                $penjualan->harga=$request->harga[$index];
                $penjualan->sub_total_jual=$request->sub_total_jual[$index];
                $penjualan->save();

                //Update STOK BARANG DI MASTERBARANG
                $cari = Masterbarang::where('kd_barang','=',$request->kd_barang[$index])
                                    ->update(['jml_barang'=>($request->stok[$index]-$request->jumlah[$index])] );
                $index++;
            }
            $nota = new Nota;
            $nota->nota = $request->nota;
            $nota->totaltransaksi = $request->totaltransaksi;
            $nota->tgl_transaksi = $tgl_transaksi;
            $nota->save();
            // Hapus data keranjang
            DB::table('keranjang')->delete();
            $data = $request->only('nota','kd_barang','nm_barang','jumlah','harga','sub_total_jual','tgl_transaksi','username','totaltransaksi');

            return view('pdf.cetakstruk',['data'=>$data]);

            // return redirect()->route('penjualanbarang')->with('message','Transaksi Penjualan dengan Nota '.$request->nota.' Berhasil Disimpan');
        }   

        public function simpandatatransaksi(Request $request)
        {
            dd($request->input('username'));
        }
        public function canceltransaksi()
        {
            DB::table('keranjang')->delete();
            return redirect()->route('penjualanbarang');
        }

        public function frmreportdetail()
        {
            return view('frmcetaktransaksiharian');
        }

        public function viewreporttransharian(Request $request)
        {
            // dd($request);
            // return($tgl_awal);
            $tgl_awal=date('Y-m-d',strtotime($request->tgl_awal));
            $tgl_akhir=date('Y-m-d',strtotime($request->tgl_akhir));
            $cari = DB::table('tabel_nota')
            ->join('tabel_rinci_penjualan','tabel_nota.nota','=','tabel_rinci_penjualan.nota')
            ->select('tabel_nota.nota','tabel_nota.tgl_transaksi','tabel_rinci_penjualan.kd_barang','tabel_rinci_penjualan.nm_barang','tabel_rinci_penjualan.jumlah','tabel_rinci_penjualan.harga','tabel_rinci_penjualan.sub_total_jual')
            ->where('tabel_nota.tgl_transaksi','>=',$tgl_awal)
            ->where('tabel_nota.tgl_transaksi','<=',$tgl_akhir)
            ->get();
    
            return view('pdf.cetaktransaksiharian',['cari'=>$cari,'tgl_awal'=>$tgl_awal,'tgl_akhir'=>$tgl_akhir]);
        }

        public function print(Request $request)
        {
            // dd($request);
            $tgl_awal=date('Y-m-d',strtotime($request->tgl_awal));
            $tgl_akhir=date('Y-m-d',strtotime($request->tgl_akhir));

            $cari = DB::table('tabel_nota')
            ->join('tabel_rinci_penjualan','tabel_nota.nota','=','tabel_rinci_penjualan.nota')
            ->select('tabel_nota.nota','tabel_nota.tgl_transaksi','tabel_rinci_penjualan.kd_barang','tabel_rinci_penjualan.nm_barang','tabel_rinci_penjualan.jumlah','tabel_rinci_penjualan.harga','tabel_rinci_penjualan.sub_total_jual')
            ->where('tabel_nota.tgl_transaksi','>=',$tgl_awal)
            ->where('tabel_nota.tgl_transaksi','<=',$tgl_akhir)
            ->get();
            // MASUKAN KE PDF
            $pdf = PDF::loadview('pdf.cetaktransaksiharian',['cari'=>$cari,'tgl_awal'=>$tgl_awal,'tgl_akhir'=>$tgl_akhir])->setPaper('A4','potrait');
            return $pdf->download('transaksiharianrinci.pdf');
        }

        public function frmreportpembelian()
        {
            return view('frmcetakpembelian');
        }

        public function viewreportpembelian(Request $request)
        {
            $tgl_awal=date('Y-m-d',strtotime($request->tgl_awal));
            $tgl_akhir=date('Y-m-d',strtotime($request->tgl_akhir));
            $cari = DB::table('tabel_rinci_pembelian')
            ->select('no_faktur_pembelian','kd_barang','nm_barang','jumlah','harga','sub_total_beli')
            ->where('tgl_beli','>=',$tgl_awal)
            ->where('tgl_beli','<=',$tgl_akhir)
            ->get();
    
            return view('pdf.cetaktransaksipembelian',['cari'=>$cari,'tgl_awal'=>$tgl_awal,'tgl_akhir'=>$tgl_akhir]);
        }

        public function printpembelian(Request $request) 
        {
            $tgl_awal=date('Y-m-d',strtotime($request->tgl_awal));
            $tgl_akhir=date('Y-m-d',strtotime($request->tgl_akhir));

            $cari = DB::table('tabel_rinci_pembelian')
            ->select('no_faktur_pembelian','kd_barang','nm_barang','jumlah','harga','sub_total_beli','tgl_beli')
            ->where('tgl_beli','>=',$tgl_awal)
            ->where('tgl_beli','<=',$tgl_akhir)
            ->get();
            // MASUKAN KE PDF
            $pdf = PDF::loadview('pdf.cetaktransaksipembelian',['cari'=>$cari,'tgl_awal'=>$tgl_awal,'tgl_akhir'=>$tgl_akhir])->setPaper('A4','potrait');
            return $pdf->download('pembelian.pdf');
        }

        public function frmreportstok(){
            return view('frmcetakstok');
        }

        public function viewreportstok(Request $request)
        {
            $cari = DB::table('tabel_barang')
            ->join('tabel_satuan_barang','tabel_barang.kd_satuan','=','tabel_satuan_barang.kd_satuan')
            ->join('tabel_kategori_barang','tabel_barang.kd_kategori','=','tabel_kategori_barang.kd_kategori')
            ->select('tabel_barang.kd_barang as kd_barang','tabel_barang.nm_barang as nm_barang','tabel_barang.jml_barang as jml_barang','tabel_satuan_barang.nm_satuan as nm_satuan','tabel_kategori_barang.nm_kategori as nm_kategori','tabel_barang.hrg_beli as hrg_beli','tabel_barang.hrg_jual as hrg_jual')
            ->get();
            return view('pdf.cetakstok',['cari'=>$cari]);
        }

        public function printstokpdf()
        {
            $cari=DB::table('tabel_barang')
            ->join('tabel_satuan_barang','tabel_barang.kd_satuan','=','tabel_satuan_barang.kd_satuan')
            ->join('tabel_kategori_barang','tabel_barang.kd_kategori','=','tabel_kategori_barang.kd_kategori')
            ->select('tabel_barang.kd_barang','tabel_barang.nm_barang','tabel_barang.jml_barang','tabel_satuan_barang.nm_satuan','tabel_kategori_barang.nm_kategori','tabel_barang.hrg_beli','tabel_barang.hrg_jual')
            ->get();

            $pdf = PDF::loadview('pdf.cetakstok',['cari'=>$cari])->setPaper('A4','potrait');
            return $pdf->download('cetakstok.pdf');

        }

}

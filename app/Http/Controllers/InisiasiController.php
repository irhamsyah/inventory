<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use illuminate\Foundation\Validation\ValidatesRequests;

use App\Models\Kategori;
use App\Models\Satuanbarang;
use App\Models\Supplier;

use Illuminate\View\View;

class InisiasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function forminputkategori()
    {
        return view('forminputkategori');
    }

    
    public function storeinputkategori(Request $request)
    {
        //
        // dd($request);
        $this->validate($request, [ 
            'kd_kategori' => 'required|unique:tabel_kategori_barang',
            'nm_kategori' => 'unique:tabel_kategori_barang',
        ]);
        
        if (!empty($request->kd_kategori)){
            $data = $request->only('kd_kategori','nm_kategori');
        }

        $kategoribrg = Kategori::create($data);

            //To show flash message on input form ypu must specify variable to load message on form/blade/template such as 'message'   
            session()->flash('message', 'Kategori ID : ' . $request->kd_kategori .' Saved');
            session()->flash('type', 'success');
            return redirect('/inputdatakategori');
    }

    public function forminputsatuanbarang()
    {
        return view('forminputsatuan');
    } 

    public function createinputsatuan(Request $request)
    {
        // dd($request);
        $this->validate($request, [ 
            'kd_satuan' => 'required|unique:tabel_satuan_barang',
            'nm_satuan' => 'unique:tabel_satuan_barang',
        ]);
        
        if (!empty($request->kd_satuan)){
            $data = $request->only('kd_satuan','nm_satuan');
        }

        $satuanbrg = Satuanbarang::create($data);

            //To show flash message on input form ypu must specify variable to load message on form/blade/template such as 'message'   
            session()->flash('message', 'Satuan ID : ' . $request->kd_satuan .' Saved');
            session()->flash('type', 'success');
            return redirect('/inputsatuanbarang');
    }

    //----------------------------------------------------------------
    public function forminputsupplierbarang()
    {
        return view('forminputsupplier');
    } 

    public function createinputsupplierbarang(Request $request)
    {
        // dd($request);
        $this->validate($request, [ 
            'kd_supplier' => 'required|unique:tabel_supplier',
            'nm_supplier' => 'unique:tabel_supplier',
            'almt_supplier' => 'required',
        ]);
        
        if (!empty($request->kd_supplier)){
            $data = $request->only('kd_supplier','nm_supplier','almt_supplier','tlp_supplier','fax_supplier');
        }

        $supplier = Supplier::create($data);

            //To show flash message on input form ypu must specify variable to load message on form/blade/template such as 'message'   
            session()->flash('message', 'Supplier ID : ' . $request->kd_supplier .' Saved');
            session()->flash('type', 'success');
            return redirect('/inputsupplierbarang');
    }

}

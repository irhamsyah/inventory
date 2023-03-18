<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Pembelianbarang;
use App\Models\Keranjang;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Auth::routes(['register'=> false]);

//Route unutk menghindari langsung ke DASHBOARD
// Route::get('login', function(){
//     return view('auth.login1');
// })->name('login');
//-------Batas-----------


Route::get('/tes', function()
{
    return view('tes');
}
);


    Route::get('/',array('as'=>'home2', function () {
        return view('layout.layout');
    }));
    
    // to show Input form Kategori Barang
    Route::get('inputdatakategori',
        [
            // Route Name :
            'as'=>'inputdatakategori',
            // Render to Controller:
            'uses'=>'InisiasiController@forminputkategori'
        ]
    );
    
//to save data from input form Computer's data
Route::post('createinputkategori',
    [
        'as'=>'createinputkategori',
        'uses'=>'InisiasiController@storeinputkategori'
    ]
);

// to show Input form Satuan Barang
Route::get('inputsatuanbarang',
    [
        // Route Name :
        'as'=>'inputsatuanbarang',
        // Render to Controller:
        'uses'=>'InisiasiController@forminputsatuanbarang'
    ]
);
//Simpan satuan barang
Route::post('createinputsatuan',
    [
        // Route Name :
        'as'=>'createinputsatuan',
        // Render to Controller:
        'uses'=>'InisiasiController@createinputsatuan'
    ]
);
// to show Input form Supplier Barang
Route::get('inputsupplierbarang',
    [
        'as'=>'inputsupplierbarang',
        'uses'=>'InisiasiController@forminputsupplierbarang'
    ]
);
//Simpan Supplier barang
Route::post('createinputsupplierbarang',
    [
        // Route Name :
        'as'=>'createinputsupplierbarang',
        // Render to Controller:
        'uses'=>'InisiasiController@createinputsupplierbarang'
    ]
);

// to show Input Data Master Barang
Route::get('inputdatabarang',
    [
        'as'=>'inputdatabarang',
        'uses'=>'BarangController@inputdatabarang'
    ]
);
//Simpan data Master Barang
Route::post('createdatabarang',
    [
        'as'=>'createdatabarang',
        'uses'=>'BarangController@createdatabarang'
    ]
);
// to show Input Beli Barang / Transaksi beli barang
Route::get('inputbelibarang',
    [
        'as'=>'inputbelibarang',
        'uses'=>'BarangController@inputbelibarang'
    ]
);

//Simpan Data Pembelian barang
Route::post('createbelibarang',
    [
        'as'=>'createbelibarang',
        'uses'=>'BarangController@createbelibarang'
    ]
);
// MENU TENTANG BARANG - MASTER BARANG
Route::get('viewinputdatabarang',
[
    'as'=>'viewinputdatabarang',
    'uses'=>'BarangController@viewinputdatabarang'
]);

Route::get('editbarang/{id}',
    [
        'as'=>'editbarang',
        'uses'=>'BarangController@editbarang'
    ]
);

Route::post('updatedatabarang',
[
    'as'=>'updatedatabarang',
    'uses'=>'BarangController@updatedatabarang'
]);

Route::delete('hapusdatabarang/{id}',
[
    'as'=>'databarang.destroy',
    'uses'=>'BarangController@hapusbarang'
]);
// btatas route barang------------------------

// PEMBELIAN BARANG----------------------------
Route::get('viewbelibarang',
[
    'as'=>'viewbelibarang',
    'uses'=>'BarangController@viewbelibarang'
]);

Route::delete('viewlistbelibarang/{id}',
    [
        'as'=>'databelibarang.destroy',
        'uses'=>'BarangController@hapusbelibarang'
    ]
);
//ROUE ini mengatasi ERROR : THE DELELTE METHHOD IS NOT SUPPORTED FOR THIS ROUTE  
Route::get('viewlistbelibarang/{id}', function ($id) {
            
    $listpembelian = Pembelianbarang::all();
    return view('viewlistbelibarang',['listpembelian'=>$listpembelian]);

});

// BATAS ROUTE PEMBELIAN BARANG----------------------------

// TRANSAKSI PENJUALAN 
Route::get('penjualanbarang',
    [
        'as'=>'penjualanbarang',
        'uses'=>'BarangController@penjualanbarang'
    ]
);

// Dapatkan data barang dengan ajax
Route::get('caribarangajax',
[
    'as'=>'caribarangajax',
    'uses'=>'BarangController@caribarangajax'
]
);
//Route Menampilkan FRMTRANSAKSIEDIT untuk mengupdate Barang yang akan dipbeli PELANGGAN 
Route::get('pembelian/{id}',
    [
        'as'=>'pembelian',
        'uses'=>'BarangController@pembelian'
    ]
);
// Routing Unutk mengupdate list barang2 yg dibeli pelanggan dan merouting ke Route  KERANJANGVIEW UNTUK DITAMPILKAN
Route::post('listtransaksi/{id}',
[
    'as'=>'keranjang.list',
    'uses'=>'BarangController@listtransaksi'
]);
//
Route::get('keranjangview',
[
    'as'=>'keranjangview',
    'uses'=>'BarangController@keranjangview'
]);
// -----------------------------------
Route::post('keranjangupdate',
[
    'as'=>'keranjang.update',
    'uses'=>'BarangController@keranjangupdate'
]);

Route::get('listtransaksidestroy/{id}',
[
    'as'=>'keranjang.delete',
    'uses'=>'BarangController@listtransaksdestroy'
]);

Route::get('editlisttransaksi/[id]',
[
    'as'=>'editlisttransaksi',
    'uses'=>'BarangController@editlisttransaksi'
]);
Route::get('keranjangcheckout',
[
    'as'=>'keranjang.checkout',
    'uses'=>'BarangController@keranjangcheckout'
]);

Route::get('keranjangsimpan',
[
    'as'=>'keranjang.simpan.get',
    'uses'=>'BarangController@keranjangcheckout'
]);
// Route Simpan data transaksi
Route::post('keranjangsimpan',
[
    'as'=>'keranjang.simpan',
    'uses'=>'BarangController@keranjangcetak'
]);

Route::get('simpandatatransaksi',
[
    'as'=>'simpandatatransaksi',
    'uses'=>'BarangController@simpandatatransaksi'
]);
Route::get('canceltransaksi',
[
    'as'=>'canceltransaksi',
    'uses'=>'BarangController@canceltransaksi'
]);

// ROUTE REPORT ----------------
Route::get('frmreportdetail',
[
    'as'=>'frmreportdetail',
    'uses'=>'BarangController@frmreportdetail'
]);

Route::get('viewreporttransharian',
[
    'as'=>'viewreporttransharian',
    'uses'=>'BarangController@viewreporttransharian'
]);
Route::get('print',
[
    'as'=>'print',
    'uses'=>'BarangController@print'
]);

Route::get('exportexcel',
[
    'as'=>'exporttoexcel',
    'uses'=>'ExportController@exporttoexcel'
]);

Route::get('frmreportpembelian',
[ 
    'as'=>'frmreportpembelian',
    'uses'=>'BarangController@frmreportpembelian'
]);
Route::get('viewreportpembelian',
[
    'as'=>'viewreportpembelian',
    'uses'=>'BarangController@viewreportpembelian'
]);
Route::get('printpembelian',
[
    'as'=>'printpembelian',
    'uses'=>'BarangController@printpembelian'
]);

Route::get('exporttoexcelpembelian',
[
    'as'=>'exporttoexcelpembelian',
    'uses'=>'ExportController@exporttoexcelpembelian'
]);

Route::get('frmreportstok',
[
    'as'=>'frmreportstok',
    'uses'=>'BarangController@frmreportstok'
]);

Route::get('viewreportstok',
[
    'as'=>'viewreportstok',
    'uses'=>'BarangController@viewreportstok'
]);

Route::get('printstokpdf',
[
    'as'=>'printstokpdf',
    'uses'=>'BarangController@printstokpdf'
]);

Route::get('exportstoktoexcel',
[
    'as'=>'exportstoktoexcel',
    'uses'=>'ExportController@exportstoktoexcel'
]);
Route::get('testprintlangsung',
[
    'as'=>'testprintlangsung',
    'uses'=>'TestprintController@testprintlangsung'
]);
// 


Route::get('/logout','Auth\LoginController@logout');
// Route Authentkasi aplikasi 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('viewfrmnominatif',function()
{
    return view('frmnominatif');
});
Route::post('proseshitung',
[
    'as'=>'proseshitung',
    'uses'=>'ExportController@prosesnominatif'
]);
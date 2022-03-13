<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layout.layout');
});

// to show Input form Computer's Data
Route::get('inputdatakomputer',
    [
        // Route Name :
        'as'=>'inputdatakomputer',
        // Render to Controller:
        'uses'=>'InventoryController@createkomputer'
    ]
);

//to save data from input form Computer's data
Route::post('simpandatakomputer',
    [
        'as'=>'simpaninputkomputer',
        'uses'=>'InventoryController@store'
    ]
);

// to show Input form Printer's Data
Route::get('forminputprinter',
    [
        'as'=>'forminputprinter',
        'uses'=>'InventoryController@createprinter'
    ]
);

//to save data from input form printers data
Route::post('simpaninputprinter',
    [
        'as'=>'simpaninputprinter',
        'uses'=>'InventoryController@storeprinter'
    ]
);

//to show Form input printers, forminputhpaompantas on this route as link, 
//and on 'as'=>'forminputhpaompantas' -> ROUTE NAME
Route::get('forminputhpaompantas',
    [
        'as'=>'forminputhpaompantas',
        'uses'=>'InventoryController@createhpaompantas'
    ]
);

//To Save from input form HPAomPantas
Route::post('simpaninputhpaom', 
    [
        'as'=>'simpaninputhpaom',
        'uses'=>'InventoryController@storehpaompantas'
    ]
);

Route::get('simpaninputhpaom', 
    [
        'as'=>'simpaninputhpaom',
        'uses'=>'InventoryController@createhpaompantas'
    ]);

//Rooting to show ALL data table Datakomputer 
Route::get('viewdatakomputer',
[
    'as'=>'viewdatakomputer',
    'uses'=>'InventoryController@viewcomputerrecord'
]);
//Rooting to show PC's Data for Updating 
Route::get('editdatapc/{id}',
[
    'as'=>'editdatapc',
    'uses'=>'InventoryController@editdatapc'
]);
//Routing to Save Update Computer Database
Route::post('updatedatakomputer',
[
    'as'=>'updatedatakomputer',
    'uses'=>'InventoryController@updatedatakomputer'
]);

Route::delete('/deletedatapc/{id}',
[
    'as'=>'datapc.destroy',
    'uses'=>'InventoryController@pcdatadestroy'
]);

//Routing to show ALL Data table Dataprinter
Route::get('viewdataprinter',
[
    'as'=>'viewdataprinter',
    'uses'=>'InventoryController@viewprinterrecord'
]);
//Rooting to show PRINTER's Data for Updating 
Route::get('editdataprinter/{id}',
[
    'as'=>'editdataprinter',
    'uses'=>'InventoryController@editdataprinter'
]);
//Routing to Save Update PRINTER Database
Route::post('updatedataprinter',
[
    'as'=>'updatedataprinter',
    'uses'=>'InventoryController@updatedataprinter'
]);
//ROUTING TO DELETE DATA PRINTER
Route::delete('/deletedataprinter/{id}',
[
    'as'=>'dataprinter.destroy',
    'uses'=>'InventoryController@printerdatadestroy'
]);

//Routing to show ALL Data table Datahpaompantas
Route::get('viewdatahpaom',
[
    'as'=>'viewdatahpaom',
    'uses'=>'InventoryController@viewdatahpaomrecord'
]);
//Rooting to show HP AOM PANTAS's Data for Updating 
Route::get('editdataprinter/{id}',
[
    'as'=>'editdataprinter',
    'uses'=>'InventoryController@editdataprinter'
]);
//Routing to Save Updated Data HP AOM PANTAS Database
Route::post('updatedataprinter',
[
    'as'=>'updatedataprinter',
    'uses'=>'InventoryController@updatedataprinter'
]);
//ROUTING TO DELETE DATA Datahpaompantas
Route::delete('/deletedataprinter/{id}',
[
    'as'=>'dataprinter.destroy',
    'uses'=>'InventoryController@printerdatadestroy'
]);
//Fprm Input data Peminjaman LAPTOP /KOMPUTER BACKUP
Route::get('forminputpinjampclaptop',
[
    'as'=>'forminputpinjampclaptop',
    'uses'=>'InventoryController@forminputpinjampclaptop'
]);
//Routing to SAVE Form BA Komputer
Route::post('simpanformbakomputer',
[
    'as'=>'simpanformbakomputer',
    'uses'=>'InventoryController@simpanformbakomputer'
]);

// Routing to view bapinjamkomputer -> it can be conver to pdf file
Route::get('viewdatabakomputer', 
[
    'as'=>'viewdatabakomputer',
    'uses'=>'InventoryController@viewdatabakomputer'
]);
// Routing to Show Form EDITING BA pinjam komputer
Route::get('editbapinjamkomputer', 
[
    'as'=>'editbapinjamkomputer',
    'uses'=>'InventoryController@editbapinjamkomputer'
]);

//ROuting to Save Updating Data from Form BA pinjam komputer
Route::post('simpanupdatebakomputer',
[
    'as'=>'simpanupdatebakomputer',
    'uses'=>'InventoryController@simpanupdatebakomputer'
]);

Route::get('cetakberitaacara/{id}',
[
    'as'=>'cetakberitaacara',
    'uses'=>'InventoryController@cetakberitaacara'
]);

Route::get('cetakberitaacarakembali/{id}',function($id){
    return $id;
})->name('cetakberitaacarakembali');
//TO SHOW TESTING TEMPLATE FOR CHECKED box
Route::get('testcheckedbox',function()
{
    return view('testcheckedbox');
});

//TESTING TO SHOW REPORT WITH PDF FORMAT
Route::get('tesreport',
[
    'as'=>'tescreatepdffile',
    'uses'=>'InventoryController@tesreport'

]);
//Routing to create file PDF
Route::get('/downloadbacomp',
[
    'as'=>'createpdfbakomputer',
    'uses'=>'InventoryController@createpdfbakomputer'
]
);
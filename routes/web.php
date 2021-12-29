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
        'as'=>'inputdatakomputer',
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
    ]
);

//Rooting to show data table computer
Route::get('viewdatakomputer',
[
    'as'=>'viewdatakomputer',
    'uses'=>'InventoryController@viewcomputerrecord'
]
);
//Rooting to show PC's Data for Updating 
Route::get('editdatapc/{id}',
[
    'as'=>'editdatapc',
    'uses'=>'InventoryController@editdatapc'
]
);
//Routing to Save Update Computer Database
Route::post('updatedatakomputer',
[
    'as'=>'updatedatakomputer',
    'uses'=>'InventoryController@updatedatakomputer'
]
);
<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Datakomputer;
use App\Models\Dataprinter;
use App\Models\Datahpaompantas;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function createkomputer()
    {
        return view('input');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createprinter()
    {
        //
        return view('inputprinter');
    }

    public function createhpaompantas()
    {
        return view('inputhpaompantas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);=> this method for show all data which submited by form
        //below, this method to validate your input
        $this->validate($request, [ 
            'snidpc' => 'required|unique:datakomputer',
            'modelpc' => 'required',
            'typepc'=>'required',
        ]);
        
        if (!empty($request->snidpc)){
            $data = $request->only('snidpc', 'modelpc','typepc');
        }

        // Don't overcomplicate, just upload to public/img folder and log the file name
        // In the future, maybe we would do some processing like resize or crop it.

        $datakomputer = Datakomputer::create($data);

            //To show flash message on input form ypu must specify variable to load message on form/blade/template such as 'message'   
            session()->flash('message', 'Computer data which S/N : ' . $request->snidpc .' Saved');
            session()->flash('type', 'success');
            return redirect('/inputdatakomputer');

    }
    public function storeprinter(Request $request)
    {
        // dd($request);
        //below, this method to validate your input form
        $this->validate($request, [ 
            'snid' => 'required|unique:dataprinter',
            'model' => 'required',
            'type'=>'required',
        ]);
        
        if (!empty($request->snid)){
            $data = $request->only('snid','model','type');
        }

        // Don't overcomplicate, just upload to public/img folder and log the file name
        // In the future, maybe we would do some processing like resize or crop it.

        $datakomputer = Dataprinter::create($data);

            //To show flash message on input form ypu must specify variable to load message on form/blade/template such as 'message'   
            session()->flash('message', 'Printer data which S/N : ' . $request->snid .' Saved');
            session()->flash('type', 'success');
            return redirect('/forminputhpaompantas');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storehpaompantas(Request $request)
    {
        // dd($request);
        //below, this method to validate your input form, if input box is empty, form show error message
        $this->validate($request, [ 
            'imei' => 'required|unique:datahpaompantas',
            'snid' => 'required|unique:datahpaompantas',
            'merk'=>'required',
            'model',
        ]);
        
        //this condtion check variable from input Form HP AOM PANTAS
        if (!empty($request->snid)){
            $data = $request->only('imei','snid','merk','model');
        }

        $datakomputer = Datahpaompantas::create($data);

            //To show flash message on input form ypu must specify variable to load message on form/blade/template such as 'message'   
            session()->flash('message', 'HP AOM PANTAS which S/N : ' . $request->imei .' Saved');
            session()->flash('type', 'success');
            return redirect('/forminputhpaompantas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

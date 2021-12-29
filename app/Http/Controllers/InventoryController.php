<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
            return redirect('/forminputprinter');
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
        // $imei = $request->old('imei');

        //this condtion check variable from input Form HP AOM PANTAS
        if (!empty($request->snid)){
            $data = $request->only('imei','snid','merk','model');
        }

        $datakomputer = Datahpaompantas::create($data);

            //To show flash message on input form ypu must specify variable to load message on form/blade/template such as 'message'   
            session()->flash('message', 'HP AOM PANTAS with IMEI : ' . $request->imei .' Saved');
            session()->flash('type', 'success');
            return redirect('/forminputhpaompantas');
    }

    //Method to Show ALL PC Data on Form/Template
    public function viewcomputerrecord()
    {
        $datakomputers=Datakomputer::paginate(8);
        return view('viewkomputer',['datakomputers'=>$datakomputers]);
    }

    // Method to Show Record Of Database which found
    public function editdatapc($id)
    {
        // dd($id);
        $hasil=Datakomputer::findOrFail($id);
        return view('frmeditdatapc',['hasil'=>$hasil]);

    }
    // Method to SAVE data that UPDATED
    public function updatedatakomputer(Request $request)
    {
        $updatepc=Datakomputer::findOrFail($request->snidpc);
        $this->validate($request, 
        [
            'snidpc'=> 'required',
            'modelpc'=>'required',
            'typepc' => 'required'
        ]);
        //this method uses to get data from Form Editing
        $data = $request->only('snidpc','modelpc','typepc');
        $updatepc->update($data);

        session()->flash('message', 'Data Komputer dengan Serial Number : ' . $request->snidpc .' Berhasil di Update');
        session()->flash('type', 'success');
        return redirect('/viewdatakomputer');

    }
}

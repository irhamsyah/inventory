<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Datakomputer;
use App\Models\Dataprinter;
use App\Models\Datahpaompantas;
use App\Models\Beritaacarakomputer;
use App\Models\Beritaacaraprinter;

/*Use script bellow for create PDF and Void Error :
    Non-static method Barryvdh\DomPDF\PDF::loadView() should not be called statically
*/
use Barryvdh\DomPDF\Facade as PDF;
class InventoryController extends Controller
{
    //To Show Form for input record/Data Compputer
    public function createkomputer()
    {
        return view('input');
    }
    //To Show Form for input record/Data PRINTER
    public function createprinter()
    {
        return view('inputprinter');
    }
    //To Show Form for input record/Data HP AOM PANTAS

    public function createhpaompantas()
    {
        return view('inputhpaompantas');
    }
    //To Save data PC which has inputed from FORM
    public function store(Request $request)
    {
        // dd($request);=> this method for show all data which submited by form
        //below, this method to validate your input
        $this->validate($request, [ 
            'snid' => 'required|unique:datakomputer',
            'modelpc' => 'required',
            'typepc'=>'required',
        ]);
        
        if (!empty($request->snid)){
            $data = $request->only('snid', 'modelpc','typepc');
        }

        $datakomputer = Datakomputer::create($data);

            //To show flash message on input form ypu must specify variable to load message on form/blade/template such as 'message'   
            session()->flash('message', 'Computer data which S/N : ' . $request->snid .' Saved');
            session()->flash('type', 'success');
            return redirect('/inputdatakomputer');

    }
    //To Save data PRINTRE which has inputed from FORM

    public function storeprinter(Request $request)
    {
        // dd($request);
        //below, this method to validate your input form
        $this->validate($request, [ 
            'snid' => 'required|unique:dataprinter',
            'model' => 'required',
            'merk'=>'required',
        ]);
        
        if (!empty($request->snid)){
            $data = $request->only('snid','model','merk');
        }

        $datakomputer = Dataprinter::create($data);

            //To show flash message on input form ypu must specify variable to load message on form/blade/template such as 'message'   
            session()->flash('message', 'Printer data which S/N : ' . $request->snid .' Saved');
            session()->flash('type', 'success');
            return redirect('/forminputprinter');
    }
    //To Save data HP AOM which has inputed from FORM
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

    // Method to Show Record Of Database DATAKOMPUTER which found
    public function editdatapc($id)
    {
        // dd($id);
        $hasil=Datakomputer::findOrFail($id);
        return view('frmeditdatapc',['hasil'=>$hasil]);
    }
    // Method to SAVE data PC Which UPDATED
    public function updatedatakomputer(Request $request)
    {
        $updatepc=Datakomputer::findOrFail($request->snid);
        $this->validate($request, 
        [
            'snid'=> 'required',
            'modelpc'=>'required',
            'typepc' => 'required'
        ]);
        //this method uses to get data from Form Editing
        $data = $request->only('snid','modelpc','typepc');
        $updatepc->update($data);

        session()->flash('message', 'Data Komputer dengan Serial Number : ' . $request->snid .' Berhasil di Update');
        session()->flash('type', 'success');
        return redirect('/viewdatakomputer');

    }
    // Method to DELETE record PC Data from database
    public function pcdatadestroy($id)
    {
        $datapc = Datakomputer::find($id);
        $hapusbarang = Datakomputer::where('snid','=', $id)->delete();
        return redirect()->route('viewdatakomputer')->with('message',$datapc->snid .' Deleted');
    }

    //Method to Show ALL PRINTER Data on Form/Template
    public function viewprinterrecord()
    {
        $dataprinters=Dataprinter::paginate(8);
        return view('viewprinter',['dataprinters'=>$dataprinters]);
    }

    // Method to Show Record Of Database DATAPRINTER which found
    public function editdataprinter($id)
    {
        $hasil=Dataprinter::findOrFail($id);
        return view('frmeditdataprinter',['hasil'=>$hasil]);
    }

    // Method to SAVE PRINTER Data which UPDATED
    public function updatedataprinter(Request $request)
    {
        // dd($request);
        $updatepc=Dataprinter::findOrFail($request->snid);
        $this->validate($request, 
        [
            'snid'=> 'required',
            'model'=>'required',
            'merk' => 'required'
        ]);
        //this method uses to get data from Form Editing
        $data = $request->only('snid','model','merk');
        $updatepc->update($data);

        session()->flash('message', 'Data Printer dengan Serial Number : ' . $request->snid .' Berhasil di Update');
        session()->flash('type', 'success');
        return redirect('/viewdataprinter');

    }
    // Method to DELETE record PRINTER Data from database
    public function printerdatadestroy($id)
    {
        // dd($id);
        Dataprinter::find($id)->delete();
        return redirect()->route('viewdataprinter')->with('message','Printer which Serial Number '.$id.' Deleted');
    }
    //Method to Show ALL HP AOM PANTAS Data on Form/Template
    public function viewdatahpaomrecord()
    {
        $datahpaom=Datahpaompantas::paginate(8);
        return view('viewhpaom',['datahpaoms'=>$datahpaom]);
    }
    // Function to SHOW FORM to borrow PC and create data for borrowing data laptop 
    public function forminputpinjampclaptop()
    {
        $datakomputers=Datakomputer::paginate(8);
        return view('formbakomputer',['datakomputers'=>$datakomputers]);
    }
    //Function to SAVE INPUT DATA FROM formbakomputer (Form BA Pinjam komputer/laptop)
    public function simpanformbakomputer(Request $request)
    {
        // dd(date('Y-m-d',strtotime($request->tanggal)));
        if(count($request->cek_pilih)>0)
        {
            foreach($request->cek_pilih as $value)
            {
                $hasil = Datakomputer::findOrFail($value);
                if (!empty($value)){
                    $data = $request->only('nama_pic','jabatan','bentuk','keterangan');
                    // this method bellow to create date format : YYYY-MM-DD
                    $data['tanggal']=date('Y-m-d',strtotime($request->tanggal));
                    $data['snid']=$hasil->snid;
                    $data['modelpc']=$hasil->modelpc;
                    $data['merkpc']=$hasil->typepc;
                    // $data['keterangan']=$hasil->keterangan;
                    $datakomputer = Beritaacarakomputer::create($data);
                }
            }
                        //To show flash message on input form ypu must specify variable to load message on form/blade/template such as 'message'   
                        session()->flash('message', 'BA Succesfully Writed with PIC : ' . $request->nama_pic);
                        session()->flash('type', 'success');
                        return redirect('/forminputpinjampclaptop');
        }

    }

    //Buat View Laporan BA Pinjam komputer
    public function viewdatabakomputer() 
    {
        $data = Beritaacarakomputer::all();
        return view('pdf.bapinjamkomputer',['data'=>$data]);
    }

    public function editbapinjamkomputer(Request $request)
    {
        // dd($request);
        /*Berikut Adala Cara MengeCEK apakah Parameter yang dikirim Adalah ARRAY
        dengan Fungsi is_arry($paramter)
        */
        if(is_array($request->cek_pilih)){
            if(count($request->cek_pilih)>0)
            {
                foreach($request->cek_pilih as $value)
                {
                    $hasil = Beritaacarakomputer::findOrFail($value);
                    if(!empty($value))
                    {
                        return view('formupdatebakomputer',['hasil'=>$hasil]);
                    }
                }
            }
    
        }
        else{
            //To show flash message on input form ypu must specify variable to load message on form/blade/template such as 'message'   
            session()->flash('message', 'Belum Ada yang dipilih ');
            session()->flash('type', 'danger');
            return redirect('/viewdatabakomputer');
        }
    }

    public function simpanupdatebakomputer(Request $request)
    {
        // dd($request);
        $updatepc=Beritaacarakomputer::findOrFail($request->id);
        $this->validate($request, 
        [
            'nama_pic'=> 'required',
            'tanggal'=>'required',
            'jabatan' => 'required'
        ]);
        //this method uses to get data from Form Editing
        $data = $request->only('nama_pic','jabatan','keterangan');
        $data['tanggal']=date('Y-m-d',strtotime($request->tanggal));
        $updatepc->update($data);

        session()->flash('message', 'Data BA Pinjam Komputer dengan Serial Number : ' . $request->snid .' Berhasil di Update');
        session()->flash('type', 'success');
        return redirect('/viewdatabakomputer');
    }

    public function cetakberitaacara($id)
    {
        $hasil = Beritaacarakomputer::find($id);
        return view('pdf.cetakbapinjamkomputer',['hasil'=>$hasil]);
    }
    public function tesreport()
    {
        $data = Datakomputer::all();
        return view('pdf.bapinjamkomputer',['data'=>$data]);
        // $pdf = PDF::loadView('pdf.bapinjamkomputer',['data'=>$data]);
        // return $pdf->stream();

    }

    public function createpdfbakomputer()
    {
        $data = Datakomputer::all();

        $pdf = PDF::loadView('pdf.bapinjamkomputer',['data'=>$data]);
        return $pdf->stream();

    }

}

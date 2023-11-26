<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\VotanteExport;
use App\Imports\VotanteImport;
use App\Models\Votante;
use Illuminate\Http\Request;




class VotanteController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $votantes = Votante::where('name','LIKE','%'.$busqueda.'%')
        ->orWhere('sis','LIKE','%'.$busqueda.'%')
        ->latest('sis')
        
        ->paginate(5);
  
        return view('poblacion.index', ['barangs' => $votantes]);
    }
    public function pdf()
    {
        
        $votantes =Votante::all();
        $pdf = PDF::loadView('poblacion.pdf',['votantes'=>$votantes])->setOptions(['defaultFont' => 'sans-serif']);
        //return $pdf->stream('votantes.pdf');
        return $pdf->download('__votantes.pdf');   
    }
    


    public function import(Request $request)
    {
        $file = $request->file('file')->store('public/import');

        $import = new VotanteImport;
        $import->import($file);

        return redirect('/poblacion')->with('success','Datos importados');
    }

    public function export(){
        return (new VotanteExport)->download('base_votantes.xls');       
    }
}

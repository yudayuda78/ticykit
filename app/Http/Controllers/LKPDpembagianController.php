<?php

namespace App\Http\Controllers;

use App\Models\LKPDpembagian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LKPDpembagianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('LKPD.Pembagian.index');
    }

    public function download(Request $request){

        

        $judul = $request->input('judulInput');
        $hasilData = json_decode($request->input('hasilInput'), true);
        // dd($hasilData);

    
        if ($request->input('hideResults') == 'true') {
            $hasilData = [
                'datapertama' => $hasilData['datapertama'],
                'datakedua' => $hasilData['datakedua'],
            ];
        }
    // dd($hasilData);

    
        $pdf = PDF::loadView('pdf.LKPDpembagian', compact('judul', 'hasilData'));

  
        return $pdf->download('soal_pembagian.pdf');
      
    }
}

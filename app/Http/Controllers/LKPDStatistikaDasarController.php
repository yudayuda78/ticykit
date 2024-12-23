<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\LKPDStatistikaDasar;
use Illuminate\Http\Request;

class LKPDStatistikaDasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         return view('LKPD.StatistikaDasar.index');
     }
 
     public function download(Request $request){
 
         
         $judul = $request->input('judulInput');
         $soal= $request->input('soalInput');
         $mean = $request->input('meanInput');
         $median = $request->input('medianInput');
         $modus = $request->input('modusInput');
         

 
         $pdf = PDF::loadView('pdf.LKPDStatistikaDasar', compact('judul', 'soal', 'mean', 'modus', 'median',));
         return $pdf->download('soal_statistikadasar.pdf');
     }
}

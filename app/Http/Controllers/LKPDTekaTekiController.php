<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\LKPDTekaTeki;
use Illuminate\Http\Request;

class LKPDTekaTekiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('LKPD.TekaTeki.index');
    }

    public function download(Request $request){

        dd($request);
        $judul = $request->input('judulInput');
        $acak = json_decode($request->input('acakInput'), true);
        $soal = json_decode($request->input('soalInput'), true);

        $pdf = PDF::loadView('pdf.LKPDAcakKata', compact('judul', 'acak', 'soal'));


        return $pdf->download('soal_acakkata.pdf');
    }

}

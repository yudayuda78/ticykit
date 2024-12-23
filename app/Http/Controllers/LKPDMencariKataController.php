<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\LKPDMencariKata;
use Illuminate\Http\Request;

class LKPDMencariKataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('LKPD.MencariKata.index');
    }

    public function download(Request $request){

        $judul = $request->input('judulInput');
        $katagrid = json_decode($request->input('gridContainerInput'), true); ;
        $soal = json_decode($request->input('soalInput'), true);

        $pdf = PDF::loadView('pdf.LKPDMencariKata', compact('judul', 'katagrid', 'soal'));
        return $pdf->download('soal_acakkata.pdf');
    }
}

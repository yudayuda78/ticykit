<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\LKPDMencariKataGambar;
use Illuminate\Http\Request;

class LKPDMencariKataGambarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('LKPD.MencariKataGambar.index');
    }

    public function download(Request $request){
        $judul = $request->input('judulInput');
        $katagrid = json_decode($request->input('gridContainerInput'), true);
        $soal = json_decode($request->input('soalInput'), true);
        $pdf = PDF::loadView('pdf.LKPDMencariKataGambar', compact('judul', 'katagrid', 'soal'));
        return $pdf->download('soal_mencarikatagambar.pdf');
    }

}

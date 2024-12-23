<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\LKPDCocokKataGambar;
use Illuminate\Http\Request;

class LKPDCocokKataGambarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('LKPD.CocokKataGambar.index');
    }

    public function download(Request $request)
    {


        $judul = trim(str_replace('Judul:', '', $request->input('judulInput')));

        $soal = json_decode($request->input('soalInput'), true); ;

        $jawabanInput = $request->input('jawabanInput');
        $jawaban = explode(', ', $jawabanInput);

        $pdf = PDF::loadView('pdf.LKPDCocokKataGambar', compact('judul', 'soal', 'jawaban'));

        return $pdf->download('soal_cocokkatagambar.pdf');
    }

}

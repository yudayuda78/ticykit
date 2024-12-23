<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\LKPDHitungCocok;
use Illuminate\Http\Request;

class LKPDHitungCocokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('LKPD.HitungCocok.index');
    }

    public function download(Request $request){


        $judul = $request->input('judulInput');
        $soal = json_decode($request->input('soalInput'), true);
        $jawaban = json_decode($request->input('jawabanInput'), true);

        $pdf = PDF::loadView('pdf.LKPDHitungCocok', compact('judul', 'jawaban', 'soal'));
        return $pdf->download('soal_hitungcocok.pdf');
    }
}

<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\LKPDCocokHurufKecil;
use Illuminate\Http\Request;

class LKPDCocokHurufKecilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('LKPD.CocokHurufKecil.index');
    }

    public function download(Request $request){


        $hidden = $request->input('hidden');

        $judul = $request->input('judulInput');

        $hurufBesar = $request->input('hurufBesar');
        $hurufBesarArray = explode(', ', $hurufBesar);

        $hurufKecil = $request->input('hurufKecil');
        $hurufKecilArray = explode(', ', $hurufKecil);
        $chunkedArray = array_chunk($hurufKecilArray, 4);

        $chunkedData = array_chunk($chunkedArray, ceil(count($chunkedArray) / 2));

        $dataLeft = $chunkedData[0];
        $dataRight = $chunkedData[1];


        $pdf = PDF::loadView('pdf.LKPDCocokHurufKecil', compact('judul', 'dataLeft','dataRight','hidden'));


        return $pdf->download('soal_cocokHurufKecil.pdf');
    }
}

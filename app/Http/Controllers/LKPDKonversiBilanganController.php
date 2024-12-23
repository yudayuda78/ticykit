<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\LKPDKonversiBilangan;
use Illuminate\Http\Request;

class LKPDKonversiBilanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('LKPD.KonversiBilangan.index');
    }

    public function download(Request $request){

        // dd($request);
        $judul = $request->input('judulInput');
        $pembilangsatu = $request->input('pembilangsatuInput');
        $pembilangsatuArray = json_decode($pembilangsatu);
        $pembilangsatuArray = array_map('intval', $pembilangsatuArray);

        $penyebutsatu = $request->input('penyebutsatuInput');
        $penyebutsatuArray = json_decode($penyebutsatu);
        $penyebutsatuArray = array_map('intval', $penyebutsatuArray);


        $hasil = $request->input('hasilInput');
        if ($hasil) {
            $hasilArray = json_decode($hasil);
            $hasilArray = array_map('floatval', $hasilArray);
        } else {
            $hasilArray = [];
        }


        $pdf = PDF::loadView('pdf.LKPDKonversiBilangan', compact('judul', 'pembilangsatuArray',  'penyebutsatuArray', 'hasilArray' ));
        return $pdf->download('soal_konversibilangan.pdf');
    }
}

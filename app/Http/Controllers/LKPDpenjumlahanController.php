<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;


use App\Models\LKPDpenjumlahan;
use Illuminate\Http\Request;

class LKPDpenjumlahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('LKPD.Penjumlahan.index');
    }

    public function download(Request $request)
    {

        // dd($request);

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


        $pdf = PDF::loadView('pdf.LKPDpenjumlahan', compact('judul', 'hasilData'));


        return $pdf->download('soal_penjumlahan.pdf');
    }
}

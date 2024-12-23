<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\LKPDLengkapiAngka;
use Illuminate\Http\Request;

class LKPDLengkapiAngkaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('LKPD.LengkapiAngka.index');
    }

    public function download(Request $request){

        // dd($request);
        $judul = $request->input('judulInput');
        $angka = $request->input('angkaInput');

        $pdf = PDF::loadView('pdf.LKPDLengkapiAngka', compact('judul', 'angka'));
        return $pdf->download('soal_lengkapiangka.pdf');
    }
}

<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\LKPDHitungWarna;
use Illuminate\Http\Request;

class LKPDHitungWarnaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('LKPD.HitungWarna.index');
    }

    public function download(Request $request){


        $judul = $request->input('judulInput');
        $angkasatu = $request->input('angkasatuInput');
        $angkasatuArray = json_decode($angkasatu);
        $angkasatuArray = array_map('intval', $angkasatuArray);

        $angkadua = $request->input('angkaduaInput');
        $angkaduaArray = json_decode($angkadua);
        $angkaduaArray = array_map('intval', $angkaduaArray);


        $pdf = PDF::loadView('pdf.LKPDHitungWarna', compact('judul', 'angkasatuArray', 'angkaduaArray'));
        return $pdf->download('soal_hitungwarna.pdf');
    }
}

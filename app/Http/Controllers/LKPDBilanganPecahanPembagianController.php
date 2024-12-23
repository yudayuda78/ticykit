<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\LKPDBilanganPecahanPembagian;
use Illuminate\Http\Request;

class LKPDBilanganPecahanPembagianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('LKPD.BilanganPecahanPembagian.index');
    }

    public function download(Request $request){

        $judul = $request->input('judulInput');
        $pembilangsatu = $request->input('pembilangsatuInput');
        $pembilangsatuArray = json_decode($pembilangsatu);
        $pembilangsatuArray = array_map('intval', $pembilangsatuArray);

        $pembilangdua = $request->input('pembilangduaInput');
        $pembilangduaArray = json_decode($pembilangdua);
        $pembilangduaArray = array_map('intval', $pembilangduaArray);

        $penyebutsatu = $request->input('penyebutsatuInput');
        $penyebutsatuArray = json_decode($penyebutsatu);
        $penyebutsatuArray = array_map('intval', $penyebutsatuArray);


        $penyebutdua = $request->input('penyebutduaInput');
        $penyebutduaArray = json_decode($penyebutdua);
        $penyebutduaArray = array_map('intval', $penyebutduaArray);

        $hasil = $request->input('hasilInput');
        if ($hasil) {
            $dataArray = json_decode($hasil, true);
        }

        $hasilPembilang = [];
        $hasilPenyebut = [];
        if ($hasil) {
            foreach ($dataArray as $fraction) {
                list($numerator, $denominator) = explode('/', $fraction);
                $hasilPembilang[] = (int)$numerator;
                $hasilPenyebut[] = (int)$denominator;
            }
        }



        $pdf = PDF::loadView('pdf.LKPDBilanganPecahanPembagian', compact('judul', 'pembilangsatuArray', 'pembilangduaArray', 'penyebutsatuArray', 'penyebutduaArray', 'hasilPembilang', 'hasilPenyebut'));
        return $pdf->download('soal_bilanganpecahanpembagian.pdf');
    }
}

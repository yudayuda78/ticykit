<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\LKPDCocokKata;
use Illuminate\Http\Request;

class LKPDCocokKataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('LKPD.CocokKata.index');
    }

    public function download(Request $request)
    {
        $judul = trim(str_replace('Judul:', '', $request->input('judulInput')));

        $soal = $request->input('soalInput');
        $soalArray = array_map('trim', explode('-', str_replace('Soal :', '', $soal)));
        $soalArray = array_filter($soalArray, fn($value) => !empty($value) && $value !== 'Soal');

        $jawaban = $request->input('jawabanInput');
        $jawabanArray = array_map('trim', explode('-', str_replace('Jawaban :', '', $jawaban)));
        $jawabanArray = array_filter($jawabanArray, fn($value) => !empty($value) && $value !== 'Jawaban');

        $urutan = $request->input('urutanInput');
        $matchedIndexes = [];
        if ($urutan) {
            $urutanArray = array_map('trim', explode(')', $urutan));
            $urutanArray = array_filter($urutanArray, fn($value) => !empty($value));
            $urutanArray = array_combine(range(1, count($urutanArray)), array_values($urutanArray));

            foreach ($urutanArray as $key => $value) {
                $indexInSoal = array_search($value, $soalArray);
                if ($indexInSoal !== false) {
                    $matchedIndexes[] = $indexInSoal;
                }
            }
            $matchedIndexes = array_combine(range(1, count($matchedIndexes)), array_values($matchedIndexes));
        }

        $pdf = PDF::loadView('pdf.LKPDCocokKata', compact('judul', 'soalArray', 'jawabanArray', 'matchedIndexes'));

        return $pdf->download('soal_cocokkata.pdf');
    }





}

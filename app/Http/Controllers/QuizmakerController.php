<?php

namespace App\Http\Controllers;

use App\Models\quizmaker;
use App\Models\PertanyaanQuizMaker;
use App\Models\JawabanQuizMaker;
use Illuminate\Http\Request;


class QuizmakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('quizmaker.index', [
            
            'title' => 'QuizMaker'
        ]);
    }

    

    
    public function store(Request $request)
    {
        // Data untuk tabel 'generatesoal'
        $datageneratesoal = [
            'slug' => $request->input('judul'),
            'judul' => $request->input('judul'),
            'user_id' => $request->input('user_id'),
            'description' => $request->input('description'),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Simpan data generatesoal dan ambil ID-nya
        $generateSoal = quizmaker::create($datageneratesoal);
        $generateSoalId = $generateSoal->id;

        // Iterasi untuk menyimpan pertanyaan dan jawaban
        foreach ($request->input('questions') as $questionData) {
            $datapertanyaangeneratesoal = [
                'generatesoal_id' => $generateSoalId,
                'pertanyaan' => $questionData['question_text'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Simpan data pertanyaan dan ambil ID-nya
            $pertanyaan = PertanyaanQuizMaker::create($datapertanyaangeneratesoal);
            $pertanyaanId = $pertanyaan->id;

            // Simpan jawaban untuk setiap pertanyaan
            foreach ($questionData['answers'] as $answerData) {
                $datajawabangeneratesoal = [
                    'pertanyaan_id' => $pertanyaanId,
                    'jawaban' => $answerData['answer_text'],
                    'is_correct' => isset($answerData['is_correct']) ? 1 : 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                JawabanQuizMaker::create($datajawabangeneratesoal);
            }
        }

        // Redirect atau kirim response
        return redirect()->back()->with('success', 'Quiz berhasil disimpan.');
    
    }

    
    public function show(quizmaker $quizmaker)
    {
        $pertanyaans = $quizmaker->pertanyaangeneratesoals()->with('jawabangeneratesoal')->get();

        return view('quizmaker.show',[
            'quizmaker' => $quizmaker,
            'pertanyaans' => $pertanyaans,
            'title' => 'Generate Soal'
        ]);
    }


  


    public function kumpulan(){
        $quizmaker = quizmaker::all();
        return view('quizmaker.kumpulanquizmaker', [
            'quizmaker' => $quizmaker,
            'title' => 'quizmaker'
        ]);
    }


    public function mysoalindex(){
        // $modulAjar = auth()->user()->ModulAjar->where('id', 1);
        $generateSoal = auth()->user()->quizmaker;

       

        return view('generatesoal.mysoalindex', [
            "generateSoal" => $generateSoal,
            'title' => 'My Soal'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Worksheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class WorksheetController extends Controller
{
    
    public function index()
    {
        $worksheet = worksheet::paginate(12);

        return view('worksheet.index', [
            "worksheet" => $worksheet,
            'title' => 'worksheet'
        ]);
    }

    // public function show(Worksheet $worksheet)
    // {
    //     return view('ticykit.ebook.ebook-detail', [
    //         "content" => $ebook,
    //         'title' => 'ebook pendidikan'
    //     ]);
    // }

    public function search(Request $request){
        $search = $request->input('search');
        // Lakukan pencarian disini, misalnya dengan model Eloquent
        $worksheet = Worksheet::where('title', 'like', '%' . $search . '%')
            ->orWhere('category', 'like', '%' . $search . '%')
            ->paginate(12);

        return view('worksheet.index', compact('worksheet', 'search'), [
            'title' => 'worksheet'
        ]);
    }

    public function download($id){
        
        $filedownload = Worksheet::where('id', $id)->first();
         // Cek apakah $filedownload ditemukan
        if (!$filedownload) {
            return redirect()->back()->withErrors('File tidak ditemukan.');
        }
   

        // Ubah path ke folder fileebook
        $pathToFile = public_path("fileworksheet/{$filedownload->file}");
        // dd($pathToFile);

        // Cek apakah file benar-benar ada di server
        if (!file_exists($pathToFile)) {
            return redirect()->back()->withErrors('File tidak ditemukan di server.');
        }

        return Response::download($pathToFile);
    }


  
}

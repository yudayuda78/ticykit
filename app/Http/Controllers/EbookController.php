<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Support\Facades\Response;

use Illuminate\Http\Request;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ebook = Ebook::paginate(12);

        return view('ebook.index', [
            "ebook" => $ebook,
            'title' => 'ebook'
        ]);
    }

   

    

    /**
     * Display the specified resource.
     */
    public function show(Ebook $ebook)
    {
        return view('ticykit.ebook.ebook-detail', [
            "content" => $ebook,
            'title' => 'ebook pendidikan'
        ]);
    }

    public function search(Request $request){
        $search = $request->input('search');
        // Lakukan pencarian disini, misalnya dengan model Eloquent
        $ebook = Ebook::where('title', 'like', '%' . $search . '%')
            ->orWhere('category', 'like', '%' . $search . '%')
            ->paginate(12);

        return view('ebook.index', compact('ebook', 'search'), [
            'title' => 'worksheet'
        ]);
    }

    public function download($id){
    
        $filedownload = Ebook::where('id', $id)->first();
         // Cek apakah $filedownload ditemukan
        if (!$filedownload) {
            return redirect()->back()->withErrors('File tidak ditemukan.');
        }
   

        // Ubah path ke folder fileebook
        $pathToFile = public_path("fileebook/{$filedownload->file}");
        // dd($pathToFile);

        // Cek apakah file benar-benar ada di server
        if (!file_exists($pathToFile)) {
            return redirect()->back()->withErrors('File tidak ditemukan di server.');
        }

        return Response::download($pathToFile);
    }

 
}

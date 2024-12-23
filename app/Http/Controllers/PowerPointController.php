<?php

namespace App\Http\Controllers;

use App\Models\PowerPoint;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class PowerPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $powerpoint = PowerPoint::paginate(12);

        return view('powerpoint.index', [
            "powerpoint" => $powerpoint,
            'title' => 'powerpoint'
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
        $powerpoint = PowerPoint::where('title', 'like', '%' . $search . '%')
            ->orWhere('category', 'like', '%' . $search . '%')
            ->paginate(12);

        return view('powerpoint.index', compact('powerpoint', 'search'), [
            'title' => 'powerpoint'
        ]);
    }

    public function download($id){
    
        $filedownload = PowerPoint::where('id', $id)->first();
         // Cek apakah $filedownload ditemukan
        if (!$filedownload) {
            return redirect()->back()->withErrors('File tidak ditemukan.');
        }
   

        // Ubah path ke folder fileebook
        $pathToFile = public_path("filepowerpoint/{$filedownload->file}");
        // dd($pathToFile);

        // Cek apakah file benar-benar ada di server
        if (!file_exists($pathToFile)) {
            return redirect()->back()->withErrors('File tidak ditemukan di server.');
        }

        return Response::download($pathToFile);
    }


}

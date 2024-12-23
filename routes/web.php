<?php

use App\Http\Controllers\QuizmakerController;
use App\Models\LKPDMencariKata;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\JawabanQuizMakerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WorksheetController;
use App\Http\Controllers\PowerPointController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LKPDAcakKataController;
use App\Http\Controllers\LKPDBilanganPecahanPembagianController;
use App\Http\Controllers\LKPDBilanganPecahanPenguranganController;
use App\Http\Controllers\LKPDBilanganPecahanPenjumlahanController;
use App\Http\Controllers\LKPDBilanganPecahanPerkalianController;
use App\Http\Controllers\LKPDCocokHurufKecilController;
use App\Http\Controllers\LKPDCocokKataController;
use App\Http\Controllers\LKPDpembagianController;
use App\Http\Controllers\LKPDperkalianController;
use App\Http\Controllers\LKPDHitungCocokController;
use App\Http\Controllers\LKPDHitungWarnaController;
use App\Http\Controllers\LKPDMencariKataController;
use App\Http\Controllers\LKPDpenguranganController;
use App\Http\Controllers\LKPDpenjumlahanController;
use App\Http\Controllers\LKPDTekaTekiController;
use App\Http\Controllers\LKPDCocokKataGambarController;
use App\Http\Controllers\LKPDKonversiBilanganController;
use App\Http\Controllers\LKPDLengkapiAngkaController;
use App\Http\Controllers\LKPDMencariKataGambarController;
use App\Http\Controllers\LKPDStatistikaDasarController;
use App\Http\Controllers\PertanyaanQuizMakerController;

// Route::get('/', [LandingPageController::class, 'index']);
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard');


//login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//route register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register');

// Auth
// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');
// Route::get('/register', function () {
//     return view('auth.login');
// })->name('register');

Route::get('/worksheet', [WorksheetController::class, 'index'])->name('worksheet');
Route::get('/worksheet/search', [WorksheetController::class, 'search'])->name('worksheet.search');
Route::get('/worksheet/download/{id}', [WorksheetController::class, 'download'])->name('worksheet.download');

Route::get('/ebook', [EbookController::class, 'index'])->name('ebook');
Route::get('/ebook/search', [EbookController::class, 'search'])->name('ebook.search');
Route::get('/ebook/download/{id}', [EbookController::class, 'download'])->name('ebook.download');

Route::get('/powerpoint', [PowerPointController::class, 'index'])->name('powerpoint');
Route::get('/powerpoint/search', [PowerPointController::class, 'search'])->name('powerpoint.search');
Route::get('/powerpoint/download/{id}', [PowerPointController::class, 'download'])->name('powerpoint.download');



//modul ajar
Route::get('modulajar', [ModulAjarController::class, 'index'])->name('modulajar.index')->middleware('auth');
Route::get('modulajar/{modulAjar:slug}', [ModulAjarController::class, 'show'])->name('modulajar.show')->middleware('auth');
Route::get('mymodulajar', [ModulAjarController::class, 'mymodulajarindex'])->middleware('auth')->name('mymodulajar');
Route::get('mymodulajar/{modulAjar:slug}', [ModulAjarController::class, 'mymodulajarshow'])->middleware('auth')->name('show.mymodulajar');
Route::get('administrasiguru/buatmodulajar', [ModulAjarController::class, 'modulajarform'])->middleware('auth')->name('formmodulajar');
Route::post('administrasiguru/tambahdatamodulajar', [ModulAjarController::class, 'tambahdatamodulajar'])->middleware('auth')->name('tambahdatamodulajar');
Route::get('administrasiguru/downloadmodulajar/{id}', [ModulAjarController::class, 'downloadmodulajar'])->middleware('auth')->name('modulajar.download');
Route::get('administrasiguru/tambahmymodulajar/{id}', [ModulAjarController::class, 'tambahmymodulajar'])->middleware('auth')->name('modulajar.tambahmymodulajar');
Route::get('administrasiguru/hapusdatamymodulajar/{id}', [ModulAjarController::class, 'hapusmymodulajar'])->middleware('auth')->name('hapusdatamymodulajar');
Route::get('administrasiguru/editmymodulajar/{id}', [ModulAjarController::class, 'editmymodulajar'])->middleware('auth')->name('editmymodulajar');
Route::post('administrasiguru/editdatamymodulajar/{id}', [ModulAjarController::class, 'editdatamymodulajar'])->middleware('auth')->name('editdatamymodulajar');

//quiz maker
Route::get('quizmaker', [QuizmakerController::class, 'index'])->middleware('auth');
Route::get('kumpulanquizmaker', [QuizmakerController::class, 'kumpulan'])->middleware('auth')->name('kumpulansoal');
Route::get('quizmaker/{quizmaker:slug}', [QuizmakerController::class, 'show'])->middleware('auth');
Route::get('mysoal', [QuizmakerController::class, 'mysoalindex'])->name('mysoal');
Route::post('/generatesoal', [QuizmakerController::class, 'store']);
Route::post('/pertanyaangeneratesoal', [PertanyaanQuizMakerController::class, 'store']);
Route::post('/jawabangeneratesoal', [JawabanQuizMakerController::class, 'store']);

//LKPD
Route::get('/lkpd', function () {
    return view('dashboard.lkpd');
})->name('LKPD');

//penjumlahan
Route::get('/lkpd/penjumlahan', [LKPDpenjumlahanController::class, 'index'])->name('LKPD.penjumlahan');
Route::post('/lkpd/penjumlahan/download', [LKPDpenjumlahanController::class, 'download'])->middleware('auth')->name('LKPD.penjumlahanDownload');

//pengurangan
Route::get('/lkpd/pengurangan', [LKPDpenguranganController::class, 'index'])->name('LKPD.pengurangan');
Route::post('/lkpd/pengurangan/download', [LKPDpenguranganController::class, 'download'])->middleware('auth')->name('LKPD.penguranganDownload');

//perkalian
Route::get('/lkpd/perkalian', [LKPDperkalianController::class, 'index'])->name('LKPD.perkalian');
Route::post('/lkpd/perkalian/download', [LKPDperkalianController::class, 'download'])->middleware('auth')->name('LKPD.perkaliandownload');


//pembagian
Route::get('/lkpd/pembagian', [LKPDpembagianController::class, 'index'])->name('LKPD.pembagian');
Route::post('/lkpd/pembagian/download', [LKPDpembagianController::class, 'download'])->middleware('auth')->name('LKPD.pembagianDownload');


//acak kata
Route::get('/lkpd/acakkata', [LKPDAcakKataController::class, 'index'])->name('LKPD.acakkata');
Route::post('/lkpd/pembagian/acakkata', [LKPDAcakKataController::class, 'download'])->middleware('auth')->name('LKPD.acakkataDownload');

//cocok kata
Route::get('/lkpd/cocokkata', [LKPDCocokKataController::class, 'index'])->name('LKPD.cocokkata');
Route::post('/lkpd/cocokkata/download', [LKPDCocokKataController::class, 'download'])->middleware('auth')->name('LKPD.cocokkatadDownload');


//mencari kata
Route::get('/lkpd/mencarikata', [LKPDMencariKataController::class, 'index'])->name('LKPD.mencarikata');
Route::post('/lkpd/mencarikata/download', [LKPDMencariKataController::class, 'download'])->middleware('auth')->name('LKPD.mencarikataDownload');

//teka teki
Route::get('/lkpd/tekateki', [LKPDTekaTekiController::class, 'index'])->name('LKPD.tekateki');
Route::get('/lkpd/tekateki/download', [LKPDTekaTekiController::class, 'download'])->middleware('auth')->name('LKPD.tekatekiDOwnload');

//mencari kata gambar
Route::get('/lkpd/mencarikatagambar', [LKPDMencariKataGambarController::class, 'index'])->name('LKPD.mencarikatagambar');
Route::post('/lkpd/mencarikatagambar/download', [LKPDMencariKataGambarController::class, 'download'])->name('LKPD.mencarikatagambarDownload');

Route::get('/lkpd/cocokkatagambar', [LKPDCocokKataGambarController::class, 'index'])->name('LKPD.cocokkatagambar');
Route::post('/lkpd/cocokkatagambar/download', [LKPDCocokKataGambarController::class, 'download'])->name('LKPD.cocokkatagambarDownload');

Route::get('/lkpd/hitungcocok', [LKPDHitungCocokController::class, 'index'])->name('LKPD.hitungcocok');
Route::post('/lkpd/hitungcocok/download', [LKPDHitungCocokController::class, 'download'])->name('LKPD.hitungcocokDownload');

Route::get('/lkpd/cocokhurufkecil', [LKPDCocokHurufKecilController::class, 'index'])->name('LKPD.cocokhurufkecil');
Route::post('/lkpd/cocokhurufkecil/download', [LKPDCocokHurufKecilController::class, 'download'])->name('LKPD.cocokhurufkecilDownload');

Route::get('/lkpd/hitungwarna', [LKPDHitungWarnaController::class, 'index'])->name('LKPD.hitungwarna');
Route::post('/lkpd/hitungwarna/download', [LKPDHitungWarnaController::class, 'download'])->name('LKPD.hitungwarnaDownload');

Route::get('/lkpd/bilanganpecahanpenjumlahan', [LKPDBilanganPecahanPenjumlahanController::class, 'index'])->name('LKPD.bilanganpecahanpenjumlahan');
Route::post('/lkpd/bilanganpecahanpenjumlahan/download', [LKPDBilanganPecahanPenjumlahanController::class, 'download'])->name('LKPD.bilanganpecahanpenjumlahanDownload');

Route::get('/lkpd/bilanganpecahanpengurangan', [LKPDBilanganPecahanPenguranganController::class, 'index'])->name('LKPD.bilanganpecahanpengurangan');
Route::post('/lkpd/bilanganpecahanpengurangan/download', [LKPDBilanganPecahanPenguranganController::class, 'download'])->name('LKPD.bilanganpecahanpenguranganDownload');

Route::get('/lkpd/bilanganpecahanperkalian', [LKPDBilanganPecahanPerkalianController::class, 'index'])->name('LKPD.bilanganpecahanperkalian');
Route::post('/lkpd/bilanganpecahanperkalian/download', [LKPDBilanganPecahanPerkalianController::class, 'download'])->name('LKPD.bilanganpecahanperkalianDownload');

Route::get('/lkpd/bilanganpecahanpembagian', [LKPDBilanganPecahanPembagianController::class, 'index'])->name('LKPD.bilanganpecahanpembagian');
Route::post('/lkpd/bilanganpecahanpembagian/download', [LKPDBilanganPecahanPembagianController::class, 'download'])->name('LKPD.bilanganpecahanpembagianDownload');

Route::get('/lkpd/konversibilangan', [LKPDKonversiBilanganController::class, 'index'])->name('LKPD.konversibilangan');
Route::post('/lkpd/konversibilangan/download', [LKPDKonversiBilanganController::class, 'download'])->name('LKPD.konversibilanganDownload');

Route::get('/lkpd/lengkapiangka', [LKPDLengkapiAngkaController::class, 'index'])->name('LKPD.lengkapiangka');
Route::post('/lkpd/lengkapiangka/download', [LKPDLengkapiAngkaController::class, 'download'])->name('LKPD.lengkapiangkaDownload');

Route::get('/lkpd/statistikadasar', [LKPDStatistikaDasarController::class, 'index'])->name('LKPD.statistikadasar');
Route::post('/lkpd/statistikadasar/download', [LKPDStatistikaDasarController::class, 'download'])->name('LKPD.statistikadasarDownload');



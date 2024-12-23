<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModulAjarRequest;
use App\Http\Requests\UpdateModulAjarRequest;
use App\Models\ModulAjar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;

class ModulAjarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modulAjar = ModulAjar::select(
            DB::raw('MAX(id) as id'),
            'namaModul',
            DB::raw('MAX(kodeModul) as kodeModul'),
            DB::raw('MAX(slug) as slug'),
            DB::raw('MAX(penyusun) as penyusun'),
            DB::raw('MAX(tahun) as tahun'),
            DB::raw('MAX(kelas) as kelas'),
            DB::raw('MAX(faseCapaian) as faseCapaian'),
            DB::raw('MAX(elemen) as elemen'),
            DB::raw('MAX(alokasiWaktu) as alokasiWaktu'),
            DB::raw('MAX(pertemuan) as pertemuan'),
            DB::raw('MAX(profilPelajarPancasila) as profilPelajarPancasila'),
            DB::raw('MAX(saranaPrasarana) as saranaPrasarana'),
            DB::raw('MAX(targetPesertaDidik) as targetPesertaDidik'),
            DB::raw('MAX(modelPembelajaran) as modelPembelajaran'),
            DB::raw('MAX(modePembelajaran) as modePembelajaran'),
            DB::raw('MAX(tujuanPembelajaran) as tujuanPembelajaran'),
            DB::raw('MAX(pertanyaanPemantik) as pertanyaanPemantik'),
            DB::raw('MAX(persiapanPembelajaran) as persiapanPembelajaran'),
            DB::raw('MAX(pendahuluan) as pendahuluan'),
            DB::raw('MAX(waktuPendahuluan) as waktuPendahuluan'),
            DB::raw('MAX(kegiatanInti) as kegiatanInti'),
            DB::raw('MAX(waktuKegiatanInti) as waktuKegiatanInti'),
            DB::raw('MAX(kegiatanPenutup) as kegiatanPenutup'),
            DB::raw('MAX(waktuKegiatanPenutup) as waktuKegiatanPenutup'),
            DB::raw('MAX(rencanaAsesmen) as rencanaAsesmen'),
            DB::raw('MAX(bahanBacaan) as bahanBacaan'),
            DB::raw('MAX(kota) as kota'),
            DB::raw('MAX(tanggal) as tanggal'),
            DB::raw('MAX(kepalasekolah) as kepalasekolah'),
            DB::raw('MAX(guru) as guru'),
            DB::raw('MAX(namaKepalaSekolah) as namaKepalaSekolah'),
            DB::raw('MAX(namaGuru) as namaGuru'),
            DB::raw('MAX(created_at) as created_at'),
            DB::raw('MAX(updated_at) as updated_at')
        )
        ->groupBy('namaModul')
        ->orderBy('created_at', 'desc')
        ->paginate(12);
    
        return view('modulajar.modulajarindex', [
            'modulAjar' => $modulAjar,
            'title' => 'Modul Ajar'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreModulAjarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModulAjarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ModulAjar  $modulAjar
     * @return \Illuminate\Http\Response
     */
    public function show(ModulAjar $modulAjar)
    {
        return view('modulajar.modulajarshow', [
            "modulAjar" => $modulAjar,
            'title' => 'Modul Ajar'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModulAjar  $modulAjar
     * @return \Illuminate\Http\Response
     */
    public function edit(ModulAjar $modulAjar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModulAjarRequest  $request
     * @param  \App\Models\ModulAjar  $modulAjar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModulAjarRequest $request, ModulAjar $modulAjar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModulAjar  $modulAjar
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModulAjar $modulAjar)
    {
        //
    }


    public function mymodulajarindex()
    {
        // $modulAjar = auth()->user()->ModulAjar->where('id', 1);
        $modulAjar = auth()->user()->ModulAjar;

        return view('modulajar.mymodulajarindex', [
            "modulAjar" => $modulAjar,
            'title' => 'My ßModul Ajar'
        ]);

    }

    public function mymodulajarshow(ModulAjar $modulAjar)
    {
        return view('modulajar.mymodulajarshow', [
            "modulAjar" => $modulAjar,
            'title' => 'My Modul Ajar'
        ]);
    }

    public function modulajarform()
    {
        return view('modulajar.formmodulajar');
    }


    public function tambahdatamodulajar(Request $request)
    {



        $user_id = auth()->user()->id;
        $slug = $request->input('namaModul');
        $slugEdited = str_replace(' ', '', $slug);


        $modul = [
            'user_id' => $user_id,
            'slug' => $slugEdited,
            'namaModul' => $request->input('namaModul'),
            'kodeModul' => $request->input('kodeModul'),
            'penyusun' => $request->input('penyusun'),
            'tahun' => $request->input('tahun'),
            'kelas' => $request->input('kelas'),
            'faseCapaian' => $request->input('faseCapaian'),
            'elemen' => $request->input('elemen'),
            'alokasiWaktu' => $request->input('alokasiWaktu'),
            'pertemuan' => $request->input('pertemuan'),
            'profilPelajarPancasila' => $request->input('profilPelajarPancasila'),
            'saranaPrasarana' => $request->input('saranaPrasarana'),
            'targetPesertaDidik' => $request->input('targetPesertaDidik'),
            'modelPembelajaran' => $request->input('modelPembelajaran'),
            'modePembelajaran' => $request->input('modePembelajaran'),
            'tujuanPembelajaran' => $request->input('tujuanPembelajaran'),
            'pertanyaanPemantik' => $request->input('pertanyaanPemantik'),
            'persiapanPembelajaran' => $request->input('persiapanPembelajaran'),
            'pendahuluan' => $request->input('pendahuluan'),
            'waktuPendahuluan' => $request->input('waktuPendahuluan'),
            'kegiatanInti' => $request->input('kegiatanInti'),
            'waktuKegiatanInti' => $request->input('waktuKegiatanInti'),
            'kegiatanPenutup' => $request->input('kegiatanPenutup'),
            'waktuKegiatanPenutup' => $request->input('waktuKegiatanPenutup'),
            'rencanaAsesmen' => $request->input('rencanaAsesmen'),
            'bahanBacaan' => $request->input('bahanBacaan'),
            'kota' => $request->input('kota'),
            'tanggal' => $request->input('tanggal'),
            'kepalasekolah' => $request->input('kepalaSekolah'),
            'guru' => $request->input('guru'),
            'namaKepalaSekolah' => $request->input('namaKepalaSekolah'),
            'namaGuru' => $request->input('namaGuru'),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        ModulAjar::insert($modul);

        return redirect()->back()->with('succes', 'modul berhasil ditambahkan');
    }

    public function downloadmodulajar($id)
    {
        $modulajar = ModulAjar::where('id', $id)->first();
        $tanggal = $modulajar->tanggal;
        $tanggalFormated = Carbon::createFromFormat('Y-m-d', $tanggal)->translatedFormat('d F Y');


        $namaModul = $modulajar->namaModul;
        $slug = $modulajar->slug . $modulajar->id;
        $namaModul = $modulajar->namaModul;
        $kodeModul = $modulajar->kodeModul;
        $penyusun = $modulajar->penyusun;
        $tahun = $modulajar->tahun;
        $kelas = $modulajar->kelas;
        $faseCapaian = $modulajar->faseCapaian;
        $elemen = $modulajar->elemen;
        $alokasiWaktu = $modulajar->alokasiWaktu;
        $pertemuan = $modulajar->pertemuan;
        $profilPelajarPancasila = $modulajar->profilPelajarPancasila;
        $saranaPrasarana = $modulajar->saranaPrasar;
        $targetPesertaDidik = $modulajar->targetPesertaDidik;
        $modelPembelajaran = $modulajar->modelPembelajaran;
        $modePembelajaran = $modulajar->modePembelajaran;
        $tujuanPembelajaran = $modulajar->tujuanPembelajaran;
        $pertanyaanPemantik = $modulajar->pertanyaanPembelajaran;
        $persiapanPembelajaran = $modulajar->persiapanPembelajaran;
        $pendahuluan = $modulajar->pendahuluan;
        $waktuPendahuluan = $modulajar->waktuPendahuluan;
        $kegiatanInti = $modulajar->kegiatanInti;
        $waktuKegiatanInti = $modulajar->kegiatanKegiatanInti;
        $kegiatanPenutup = $modulajar->kegiatanPenutup;
        $waktuKegiatanPenutup = $modulajar->kegiatanPenutup;
        $rencanaAsesmen = $modulajar->rencanaAsesmen;
        $bahanBacaan = $modulajar->bahanBacaan;
        $kota = $modulajar->kota;
        $tanggal = $tanggalFormated;
        $kepalasekolah = $modulajar->kepalasekolah;
        $guru = $modulajar->guru;
        $namaKepalaSekolah = $modulajar->namaKepalaSekolah;
        $namaGuru = $modulajar->namaGuru;

        $html = '<h3 style="text-align:center;margin-top:190px;z-index:50; font-family:poppins; font-size:36px;">' . $namaModul . '</h3>';
        $html .= '<p><strong>' . $namaModul . '</strong></p>
<p><strong>' . $namaModul . '</strong></p>
<ol>
<li><strong>Informasi Umum</strong></li>
</ol>
<table cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td>
<p>Kode Modul</p>
</td>
<td>
<p>' . $kodeModul . '</p>
</td>
</tr>
<tr>
<td>
<p>Penyusun/Tahun</p>
</td>
<td>
<p>' . $penyusun . '/' . $tahun . '</p>
</td>
</tr>
<tr>
<td>
<p>Kelas/Fase Capaian</p>
</td>
<td>
<p>VIII/Fase D</p>
</td>
</tr>
<tr>
<td>
<p>Elemen/Topik</p>
</td>
<td>
<p>Pemahaman IPA/Sel dan Perkembangannya</p>
</td>
</tr>
<tr>
<td>
<p>Alokasi Waktu</p>
</td>
<td>
<p>120 menit (3 Jam Pelajaran)</p>
</td>
</tr>
<tr>
<td>
<p>Pertemuan Ke-</p>
</td>
<td>
<p>1</p>
</td>
</tr>
<tr>
<td>
<p>Profil Pelajar Pancasila</p>
</td>
<td>
<p>Bernalar kritis, Kreatif, dan Bergotong royong</p>
</td>
</tr>
<tr>
<td>
<p>Sarana Prasarana</p>
</td>
<td>
<p>LCD, Proyektor, Papan Tulis, charta, mikroskop 1 set, umbi bawang merah.</p>
</td>
</tr>
<tr>
<td>
<p>Target Peserta Didik</p>
</td>
<td>
<p>Regular/tipikal</p>
</td>
</tr>
<tr>
<td>
<p>Model Pembelajaran</p>
</td>
<td>
<p><em>Discovery Learning</em></p>
</td>
</tr>
<tr>
<td>
<p>Mode Pembelajaran</p>
</td>
<td>
<p>Tatap Muka</p>
</td>
</tr>
</tbody>
</table>
<ol>
<li><strong>Komponen Inti</strong></li>
</ol>
<p><strong>Tujuan Pembelajaran </strong></p>
<ol>
<li>Peserta didik dapat menjelaskan struktur dan fungsi sel organisme.</li>
<li>Peserta didik dapat membedakan sel hewan dengan sel tumbuhan.</li>
</ol>
<p><strong>Pertanyaan Pemantik </strong></p>
<ol>
<li>Terdiri dari apa sajakah roda sepeda motormu?</li>
<li>Apakah tubuhmu dan pohon beringin terdiri dari bagian-bagian? apa nama bagian paling kecil bagian tubuhmu dan pohon beringin?</li>
</ol>
<p><strong>Persiapan Pembelajaran</strong></p>
<ol>
<li>Guru melakukan asesmen diagnostik dalam bentuk kuis sebelum pembelajaran dimulai.</li>
</ol>
<p>Guru menyiapkan bahan tayang Power Point (PPt) materi Sel .dan Perkembangannya</p>
<ol>
<li>Guru menyiapkan mikroskop dan perlengkapannya, umbi bawang merah dan siswa.</li>
</ol>
<p><strong>Kegiatan Pembelajaran</strong></p>
<ol>
<li><strong>Pendahuluan (15 menit) </strong></li>
</ol>
<ol>
<li>a.Guru membuka kegiatan pembelajaran dengan mengucapkan salam.</li>
<li>Perwakilan peserta didik memimpin doa.</li>
<li>Guru menanyakan kabar peserta didik tentang kesehatannya dan mengecek kehadiran peserta didik.</li>
<li>Guru memberikan apersepsi tentang sel</li>
<li>Guru memberikan gambaran tentang stuktur sel dan beda antara sel hewan dengan sel tumbuhan.</li>
<li>Guru menyampaikan tujuan pembelajaran yang ingin dicapai dalam materi Struktur sel tumbuhan dan hewan..</li>
</ol>
<ol>
<li><strong>Kegiatan Inti (95 menit)&nbsp;</strong></li>
</ol>
<p><strong>Langkah 1. <em>Stimulation</em> (Pemberian Rangsangan)</strong></p>
<ol>
<li>Guru bertanya tentang bagaimana cara melihat bagian terkecil dari organisme?</li>
<li>Peserta didik diminta untuk memberikan beberapa contoh kegiatan yang berkaitan dengan melihat bagian terkecil dari organisme.</li>
<li>Peserta didik diminta untuk menentukan struktur sel dan membedakan sel hewan dengan sel tumbuhan berdasarkan kegiatan yang dilakukan.</li>
<li>Guru mendorong peserta didik untuk mengumpulkan informasi lain dari berbagai sumber untuk memahami struktur sel dan membedakan sel hewan dengan sel tumbuhan..</li>
</ol>
<p><strong>Langkah 2. <em>Problem Statemen</em> (Identifikasi Masalah)</strong></p>
<ol>
<li>Peserta didik dibagi dalam kelompok yang beranggotakan 4-5 orang.</li>
<li>Peserta didik membuat hipotesis tentang struktur sel danmembedakan sel hewan dengan sel tumbuhan.</li>
</ol>
<p><strong>Langkah 3. <em>Data Collection</em> (Pengumpulan Data)</strong></p>
<ol>
<li>Guru meminta peserta didik pada masing-masing kelompok untuk mengumpulkan data hasil pengamatannya tentang sel tumbuhan dan sel hewan.</li>
<li>Peserta didik diberi kesempatan untuk membaca beberapa referensi yang berhubungan dengan materi yang sedang dipelajari.</li>
<li>Guru mengunjungi setiap kelompok untuk melihat kegiatan peserta didik danmemberi bimbingan serta memfasilitasi kebutuhan yang diperlukan dalam kelompok.</li>
</ol>
<p><strong>Langkah 4. <em>Data Processing</em> (Pengolahan Data)</strong></p>
<ol>
<ol>
<li>Guru meminta peserta didik pada masing-masing kelompok untuk melakukan analisis data dari hasil pengamatan sel tumbuhan dan sel hewan.</li>
<li>Peserta didik diminta untuk menggambar dan memberi keterangan sel tumbuhan dan sel hewan, berdasarkan hasil analisis yang telah dilakukan..</li>
<li>Guru mengunjungi setiap kelompok sambil memantau proses pengolahan data yang dilakukan peserta didik.</li>
<li>Guru meminta peserta didikmenuliskan hasil analisis datanya secara lengkap.</li>
</ol>
</ol>
<p><strong>Langkah 5. <em>Verification</em> (Pembuktian)</strong></p>
<ol>
<ol>
<li>Guru memberi kesempatan pada peserta didik didalam kelompoknya untuk menemukan berbagai bentuk sel tumbuhan dansel hewan selama pengamatan.</li>
<li>Guru meminta kepada peserta didik untuk membuktikan hipotesis yang telah dibuat sebelumnya berkaitan dengan struktur sel dan perbedaan antara sel hewan dengan sel tumbuhan.</li>
<li>Guru meminta peserta didik melakukan pemeriksaan untuk membuktikan benartidaknya hipotesis yang ditetapkan, berdasarkan hasil pengamatan dan diskusi yang terkait dengan struktur sel dan perbedaan sel hewan dengan sel tumbuhan. .</li>
<li>Guru memberikan soal-soal yang berkaitan dengan struktur sel dan perbedaan anara sel hewan dengan sel tumbuhan untuk mengecek pemahaman peserta didik dan memberikan umpan balik pembelajaran.</li>
</ol>
</ol>
<p><strong>Langkah 6. <em>Generalization</em> (Menggeneralisasi/Menarik Simpulan)</strong></p>
<ol>
<ol>
<li>Berdasarkan hasil analisis yang dilakukan peserta didik, setiap kelompok dimintamembuat simpulan dari hasil pembelajarannya.</li>
<li>Peserta didik diminta menulis simpulan di bukunya masing-masing.</li>
<li>Masing-masing kelompok diminta untuk mempresentasikan hasil pembelajarannya di depan kelas.</li>
</ol>
</ol>
<ol>
<li><strong>Kegiatan Penutup (10 menit)</strong></li>
</ol>
<ol>
<li>Guru bersama peserta didik melakukan refleksi mengenai pembelajaran yang telah dilakukan, yaitu tentang struktur sel dan perbedaan antara sel hewan dengan sel tumbuhan.</li>
<li>Guru mengkonfirmasi materi yang akan dibahas pada pertemuan berikutnya.</li>
</ol>
<p><strong>Rencana Asesmen</strong></p>
<p>Peserta didik mengerjakan tugas terstruktur, yaitu <strong>Uji Pemahaman</strong> dari Buku IPA SMP/MTs Kelas VIII halaman 10 Penerbit Pusat Perbukuan.</p>
<ol>
<li><strong>Lampiran</strong></li>
</ol>
<p><strong>Lembar Aktivitas</strong></p>
<p><strong>Bahan Bacaan Guru dan Peserta Didik</strong></p>
<p>Buku IPA SMP/MTs Kelas VIII dari Penerbit Pustaka Perbukuan halaman 1-17</p>
<p>Pematang Siantar, Juli 2023</p>
<p>Mengetahui</p>
<p>Kepala SMP Negeri 4 Pematang Siantar Guru Mapel IPA</p>
<p>EDIANTO SARAGIH, S.PdERLINA ANRIANI SIAHAAN<strong>, </strong>S.Pd Nip. 196511221989031008Nip. 198610162010012035</p>';

        $pdf = PDF::loadHTML($html)->setPaper('a4');
        $filename = 'modulajar_' . $namaModul . '.pdf';
        return $pdf->stream($filename, array('Attachment' => 0));
    }

    public function tambahmymodulajar($id)
    {
        $modulajar = ModulAjar::where('id', $id)->first();

        $tanggal = $modulajar->tanggal;
        \Log::info('Tanggal asli: ' . $tanggal);

        try {
            $tanggal = $modulajar->tanggal;
            $tanggalFormatted = Carbon::createFromFormat('Y-m-d', $tanggal)->translatedFormat('d F Y');
        } catch (\Carbon\Exceptions\InvalidFormatException $e) {
            return redirect()->back()->with('error', 'Format tanggal tidak valid: ' . $e->getMessage());
        }

        $user_id = auth()->user()->id;
        $slug = $modulajar->slug . $modulajar->id;

        
        $existingModul = ModulAjar::where('slug', $slug)->first();
        if ($existingModul) {
            return redirect()->back()->with('error', 'Slug sudah pernah ditambahkan.');
        }

        $modul = [
            'user_id' => $user_id,
            'slug' => $slug,
            'namaModul' => $modulajar->namaModul,
            'kodeModul' => $modulajar->kodeModul,
            'penyusun' => $modulajar->penyusun,
            'tahun' => $modulajar->tahun,
            'kelas' => $modulajar->kelas,
            'faseCapaian' => $modulajar->faseCapaian,
            'elemen' => $modulajar->elemen,
            'alokasiWaktu' => $modulajar->alokasiWaktu,
            'pertemuan' => $modulajar->pertemuan,
            'profilPelajarPancasila' => $modulajar->profilPelajarPancasila,
            'saranaPrasarana' => $modulajar->saranaPrasarana,
            'targetPesertaDidik' => $modulajar->targetPesertaDidik,
            'modelPembelajaran' => $modulajar->modelPembelajaran,
            'modePembelajaran' => $modulajar->modePembelajaran,
            'tujuanPembelajaran' => $modulajar->tujuanPembelajaran,
            'pertanyaanPemantik' => $modulajar->pertanyaanPemantik,
            'persiapanPembelajaran' => $modulajar->persiapanPembelajaran,
            'pendahuluan' => $modulajar->pendahuluan,
            'waktuPendahuluan' => $modulajar->waktuPendahuluan,
            'kegiatanInti' => $modulajar->kegiatanInti,
            'waktuKegiatanInti' => $modulajar->waktuKegiatanInti,
            'kegiatanPenutup' => $modulajar->kegiatanPenutup,
            'waktuKegiatanPenutup' => $modulajar->waktuKegiatanPenutup,
            'rencanaAsesmen' => $modulajar->rencanaAsesmen,
            'bahanBacaan' => $modulajar->bahanBacaan,
            'kota' => $modulajar->kota,
            'tanggal' => $tanggalFormatted,
            'kepalasekolah' => $modulajar->kepalasekolah,
            'guru' => $modulajar->guru,
            'namaKepalaSekolah' => $modulajar->namaKepalaSekolah,
            'namaGuru' => $modulajar->namaGuru,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        ModulAjar::insert($modul);

        return redirect()->back()->with('success', 'Modul Ajar berhasil ditambahkan.');

    }

    public function hapusmymodulajar($id){
        $modulajar = ModulAjar::findOrFail($id);



        if ($modulajar) {
            $modulajar->delete();
            session()->flash('success', 'Modul Ajar berhasil dihapus!');
        } else {
            session()->flash('error', 'Modul Ajar tidak ditemukan!');
        }

        return redirect('/administrasiguru/mymodulajar');
    }

    public function editmymodulajar($id){
        $modulajar = ModulAjar::findOrFail($id);

        return view('modulajar.editformmodulajar', compact('modulajar'));
    }

    public function editdatamymodulajar(Request $request, $id){
        $modulajar = ModulAjar::findOrFail($id);

        $tanggal = $modulajar->tanggal;
        \Log::info('Tanggal asli: ' . $tanggal);

        try {
            $tanggal = $modulajar->tanggal;
            $tanggalFormatted = Carbon::createFromFormat('Y-m-d', $tanggal)->translatedFormat('d F Y');
        } catch (\Carbon\Exceptions\InvalidFormatException $e) {
            return redirect()->back()->with('error', 'Format tanggal tidak valid: ' . $e->getMessage());
        }

        $user_id = auth()->user()->id;
        $slug = $modulajar->slug . $modulajar->id;


        $modulajar->user_id = $user_id;
        $modulajar->slug = $slug;
        $modulajar->namaModul = $request->input('namaModul');
        $modulajar->kodeModul = $request->input('kodeModul');
        $modulajar->penyusun = $request->input('penyusun');
        $modulajar->tahun = $request->input('tahun');
        $modulajar->kelas = $request->input('kelas');
        $modulajar->faseCapaian = $request->input('faseCapaian');
        $modulajar->elemen = $request->input('elemen');
        $modulajar->alokasiWaktu = $request->input('alokasiWaktu');
        $modulajar->pertemuan = $request->input('pertemuan');
        $modulajar->profilPelajarPancasila = $request->input('profilPelajarPancasila');
        $modulajar->saranaPrasarana = $request->input('saranaPrasarana');
        $modulajar->targetPesertaDidik = $request->input('targetPesertaDidik');
        $modulajar->modelPembelajaran = $request->input('modelPembelajaran');
        $modulajar->modePembelajaran = $request->input('modePembelajaran');
        $modulajar->tujuanPembelajaran = $request->input('tujuanPembelajaran');
        $modulajar->pertanyaanPemantik = $request->input('pertanyaanPemantik');
        $modulajar->persiapanPembelajaran = $request->input('persiapanPembelajaran');
        $modulajar->pendahuluan = $request->input('pendahuluan');
        $modulajar->waktuPendahuluan = $request->input('waktuPendahuluan');
        $modulajar->kegiatanInti = $request->input('kegiatanInti');
        $modulajar->waktuKegiatanInti = $request->input('waktuKegiatanInti');
        $modulajar->kegiatanPenutup = $request->input('kegiatanPenutup');
        $modulajar->waktuKegiatanPenutup = $request->input('waktuKegiatanPenutup');
        $modulajar->rencanaAsesmen = $request->input('rencanaAsesmen');
        $modulajar->bahanBacaan = $request->input('bahanBacaan');
        $modulajar->kota = $request->input('kota');
        $modulajar->tanggal = $tanggalFormatted;
        $modulajar->kepalasekolah = $request->input('kepalasekolah');
        $modulajar->guru = $request->input('guru');
        $modulajar->namaKepalaSekolah = $request->input('namaKepalaSekolah');
        $modulajar->namaGuru = $request->input('namaGuru');
        $modulajar->updated_at = now();
        
        $modulajar->save();
        return Redirect()->back()->with('success', 'Data berhasil diedit!');
    }
}

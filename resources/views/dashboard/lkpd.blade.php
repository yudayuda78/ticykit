<x-dashboard.app>
    <div class="mx-auto max-w-screen-xl">
        <div class="pb-6">
            <h3 class="text-lg font-bold text-gray-800">LKPD Otomatis</h3>
            <p class="text-sm text-gray-500">Lembaran yang dirancang untuk memandu siswa dalam proses pembelajaran.</p>
        </div>
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 xl:grid-cols-3">
            <x-dashboard.lkpd-card title="LKPD Penjumlahan" img="penjumlahan.png" mapel="Matematika"
                route="LKPD.penjumlahan" />
            <x-dashboard.lkpd-card title="LKPD Pengurangan" img="pengurangan.png" mapel="Matematika"
                route="LKPD.pengurangan" />
            <x-dashboard.lkpd-card title="LKPD Perkalian" img="perkalian.png" mapel="Matematika"
                route="LKPD.perkalian" />
            <x-dashboard.lkpd-card title="LKPD Pembagian" img="pembagian.png" mapel="Matematika"
                route="LKPD.pembagian" />
            <x-dashboard.lkpd-card title="LKPD Acak Kata" img="acak-kata.png" mapel="Bahasa Indonesia"
                route="LKPD.acakkata" />
            <x-dashboard.lkpd-card title="LKPD Mencari Kata" img="mencari-kata.png" mapel="Bahasa Indonesia"
                route="LKPD.mencarikata" />
            <x-dashboard.lkpd-card title="LKPD Cocok Kata" img="penjumlahan.png" mapel="Bahasa Indonesia"
                route="LKPD.cocokkata" />
            <x-dashboard.lkpd-card title="LKPD Teka-Teki" img="penjumlahan.png" mapel="Bahasa Indonesia"
                route="LKPD.tekateki" />

            <x-dashboard.lkpd-card title="LKPD Hitung Cocok" img="hitungcocok.png" mapel="Matematika"
                route="LKPD.hitungcocok" />
            <x-dashboard.lkpd-card title="LKPD Mencocokan Huruf Kecil" img="cocokhurufkecil.png"
                mapel="Bahasa Indonesia" route="LKPD.cocokhurufkecil" />

        </div>
    </div>
</x-dashboard.app>


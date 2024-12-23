<x-dashboard.app>
    <div class="pb-6">
        <a href="{{ route('LKPD') }}"
            class="me-2 rounded-full border-2 border-orange-500 px-2 py-1 pl-1 text-sm font-bold text-orange-500">
            <i class="ri-arrow-left-s-line"></i> LKPD
        </a>LKPD Acak Kata
        </h3>
        <p class="pt-2 text-sm text-gray-500">Soal-soal tentang konsep dan penerapan operasi penjumlahan</p>
    </div>
    <div class="rounded-2xl border border-gray-200">
        <div class="px-7 py-5">
            <h3 class="font-bold">Informasi Lembar Kerja</h3>
            <p class="text-sm text-gray-500">Ketikan informasi tentang LKPD operasi penjumlahan yang akan dibuat</p>
        </div>
        <hr />
        <div class="space-y-3 p-7 pb-8">
            <x-forms.input id="judul" label="Judul" name="judul" placeholder="Cth: Acak Kata" required />
            <div id="soalContainer" class="space-y-3">
                <x-forms.input id="soal" label="Soal" name="soal" placeholder="Masukan Kata, Cth: BELAJAR"
                    required />
            </div>
            <div class="flex flex-col gap-3 pt-2 md:flex-row md:gap-2">
                <div class="flex flex-col gap-3 md:flex-row md:gap-2">
                    <button type="button" id="tambahsoal"
                        class="w-full rounded-xl border border-orange-500 px-5 py-2.5 text-center text-sm font-medium text-gray-700 hover:bg-orange-200 focus:outline-none focus:ring-1 focus:ring-orange-700 sm:w-auto">
                        <i class="ri-add-circle-line -ms-1 me-1 text-orange-500"></i> Tambah Soal
                    </button>
                    <button type="button" id="hapussoal"
                        class="w-full rounded-xl border border-orange-500 px-5 py-2.5 text-center text-sm font-medium text-gray-700 hover:bg-orange-200 focus:outline-none focus:ring-1 focus:ring-orange-700 sm:w-auto">
                        <i class="ri-delete-bin-2-line -ms-1 me-1 text-orange-500"></i> Hapus Soal
                    </button>
                </div>
                <button type="button" id="kirimBtn"
                    class="w-full rounded-xl bg-orange-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-orange-600 focus:outline-none focus:ring-1 focus:ring-orange-700 sm:w-auto">
                    <i class="ri-bard-line -ms-1 me-1 text-white"></i> Buat LKPD
                </button>
            </div>
        </div>
    </div>

    <div class="mt-5 rounded-2xl border border-gray-200" id="resultContainer" style="display: none;">
        <div class="flex flex-col gap-3 px-7 py-5 md:flex-row">
            <button
                class="hide w-full rounded-xl border border-orange-500 px-5 py-2.5 text-center text-sm font-medium text-gray-700 hover:bg-orange-200 focus:outline-none focus:ring-1 focus:ring-orange-700 sm:w-auto">Sembunyikan
                Hasil</button>
            <button
                class="download w-full rounded-xl bg-orange-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-orange-600 focus:outline-none focus:ring-1 focus:ring-orange-700 sm:w-auto">
                <i class="ri-download-fill me-1"></i>Download LKPD</button>
        </div>
        <hr />
        <div class="p-7 text-gray-800">
            <div class="grid grid-cols-2 gap-7 font-bold">
                <div class="flex gap-2">
                    <p>Nama:</p>
                    <div class="w-full border-b border-b-gray-800"></div>
                </div>
                <div class="flex gap-2">
                    <p>Absen:</p>
                    <div class="w-full border-b border-b-gray-800"></div>
                </div>
            </div>

            <form method="POST" action="{{ route('LKPD.acakkataDownload') }}" style="display: none;">
                @csrf
                <label for="judulInput">Judul:</label>
                <input type="text" name="judulInput" id="judulInput" value="">

                <label for="acakInput">Soal:</label>
                <input type="text" name="acakInput" id="acakInput" value="">

                <label for="soalInput">Soal:</label>
                <input type="text" name="soalInput" id="soalInput" value="">

            </form>
            <p id="judulOutput" class="px-3 py-8 text-center text-2xl font-bold"></p>
            <div class="grid grid-cols-2 justify-between">
                <p id="acakOutput"></p>
                <p id="soalOutput"></p>
            </div>

        </div>
    </div>

    <script>
        // Function to make input uppercase
        function makeUppercase(input) {
            input.value = input.value.toUpperCase();
        }

        // Make initial soal input uppercase
        document.addEventListener('DOMContentLoaded', function() {
            const initialSoal = document.querySelector('#soal');
            initialSoal.addEventListener('input', function() {
                makeUppercase(this);
            });
        });

        document.getElementById('tambahsoal').addEventListener('click', function() {
            // Buat elemen div baru untuk soal
            let newSoalDiv = document.createElement('div');
            newSoalDiv.classList.add('mb-4');

            // Buat label baru untuk soal
            let newLabel = document.createElement('label');
            newLabel.classList.add('mb-2', 'block', 'text-sm', 'font-medium', 'text-gray-900');
            newLabel.textContent = 'Soal';
            newLabel.setAttribute('for', 'soal');

            // Buat input baru untuk soal
            let newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'soal';
            newInput.placeholder = 'Masukan Kata, Cth: BELAJAR';
            newInput.classList.add('block', 'w-full', 'rounded-lg', 'border', 'border-gray-300', 'bg-gray-50',
                'p-2.5', 'text-sm', 'text-gray-900', 'focus:border-blue-500', 'focus:ring-blue-500');
            newInput.required = true;

            // Add uppercase event listener to new input
            newInput.addEventListener('input', function() {
                makeUppercase(this);
            });

            // Masukkan label dan input ke dalam div baru
            newSoalDiv.appendChild(newLabel);
            newSoalDiv.appendChild(newInput);

            // Tambahkan div baru ke dalam container soal
            document.getElementById('soalContainer').appendChild(newSoalDiv);
        });

        // Menghapus soal terakhir
        document.getElementById('hapussoal').addEventListener('click', function() {
            // Dapatkan container soal
            let soalContainer = document.getElementById('soalContainer');

            // Pastikan hanya menghapus soal tambahan, bukan soal asli pertama
            if (soalContainer.children.length > 1) {
                soalContainer.removeChild(soalContainer.lastElementChild);
            } else {
                alert("Tidak dapat menghapus kolom soal lagi");
            }
        });

        // Fungsi untuk mengacak huruf
        function acakHuruf(teks) {
            let arr = teks.split('');
            for (let i = arr.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [arr[i], arr[j]] = [arr[j], arr[i]];
            }
            return arr.join('');
        }

        let soal = [];
        let acakKata = [];

        // Menampilkan isi input judul, soal, dan soal yang diacak ke dalam <p> ketika tombol Kirim diklik
        document.getElementById('kirimBtn').addEventListener('click', function() {
            // Show the result container
            document.getElementById('resultContainer').style.display = 'block';

            // Ambil nilai input judul dan masukkan ke dalam <p id="judulOutput">
            let judulInput = document.getElementById('judul').value;
            let judulOutput = document.getElementById('judulOutput');
            judulOutput.textContent = judulInput;

            // Kosongkan array soal dan acakKata sebelum mengisi ulang
            soal = [];
            acakKata = [];

            // Ambil setiap input soal di dalam soalContainer
            let soalInputs = document.querySelectorAll('#soalContainer input[name="soal"]');
            soalInputs.forEach(function(input) {
                // Masukkan nilai dari input soal ke dalam array soal
                soal.push(input.value);

                // Acak huruf dari soal dan masukkan ke dalam array acakKata
                acakKata.push(acakHuruf(input.value));
            });

            // Tampilkan soal dan acakKata ke dalam elemen output
            let soalOutput = document.getElementById('soalOutput');
            let acakOutput = document.getElementById('acakOutput');
            soalOutput.innerHTML = soal.map(item =>
                `<div class="border-b border-dashed mb-1 border-b-black"><span class="answer-text">${item}</span></div>`
            ).join("");
            acakOutput.innerHTML = acakKata.map((item, index) =>
                `<div class="mb-1 ">${index + 1}) ${item}</div>`).join("");
        });

        let hideResults = false;
        document.querySelector('.hide').addEventListener('click', function() {
            let answerTexts = document.querySelectorAll('.answer-text');
            if (hideResults) {
                answerTexts.forEach(text => text.style.visibility = 'visible');
                this.textContent = 'Sembunyikan Hasil';
                hideResults = false;
            } else {
                answerTexts.forEach(text => text.style.visibility = 'hidden');
                this.textContent = 'Tampilkan Hasil';
                hideResults = true;
            }
        });

        document.querySelector('.download').addEventListener('click', function() {
            // Dapatkan elemen-elemen form
            const judulInput = document.getElementById('judulInput');
            const acakInput = document.getElementById('acakInput');
            const soalInput = document.getElementById('soalInput');

            // Isi form dengan nilai dari array soal dan acakKata dalam bentuk JSON
            judulInput.value = document.getElementById('judulOutput')
                .textContent; // judul tetap diambil dari elemen
            acakInput.value = JSON.stringify(acakKata);
            soalInput.value = hideResults ? "[]" : JSON.stringify(soal);

            // Kirimkan form
            judulInput.form.submit();
        });


        // Fungsi untuk mengacak huruf dalam sebuah string
        function acakHuruf(kata) {
            return kata.split('').sort(() => Math.random() - 0.5).join('');
        }
    </script>
</x-dashboard.app>


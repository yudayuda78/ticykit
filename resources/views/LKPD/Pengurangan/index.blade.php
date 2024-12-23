<x-dashboard.app>
    <div class="pb-6">
        <a href="{{ route('LKPD') }}"
            class="me-2 rounded-full border-2 border-orange-500 px-2 py-1 pl-1 text-sm font-bold text-orange-500">
            <i class="ri-arrow-left-s-line"></i> LKPD
        </a>LKPD Pengurangan
        </h3>
        <p class="pt-2 text-sm text-gray-500">Soal-soal tentang konsep dan penerapan operasi penjumlahan</p>
    </div>
    <div class="rounded-2xl border border-gray-200">
        <div class="px-7 py-5">
            <h3 class="font-bold">Informasi Lembar Kerja</h3>
            <p class="text-sm text-gray-500">Ketikan informasi tentang LKPD operasi pengurangan yang akan dibuat</p>
        </div>
        <hr />
        <div class="space-y-3 p-7">
            <x-forms.input id="judul" label="Judul" name="judul" placeholder="Cth: Latihan Soal Pengurangan"
                required />
            <div class="mb-6 grid gap-3 pb-2 md:grid-cols-2">
                <x-forms.input type="number" id="jumlahSoal" label="Jumlah Soal" name="jumlahSoal" placeholder="35"
                    required />
                <div>
                    <label for="digit"
                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Digit</label>
                    <select id="digit" name="digit"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">
                        <option value="" disabled selected>Pilih jumlah digit</option>
                        <option value="9">1</option>
                        <option value="90">2</option>
                        <option value="900">3</option>
                        <option value="9000">4</option>
                        <option value="90000">5</option>
                    </select>
                </div>
            </div>
            <button type="button" id="kirimBtn"
                class="w-full rounded-xl bg-orange-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-orange-600 focus:outline-none focus:ring-1 focus:ring-orange-700 sm:w-auto">Buat
                LKPD</button>
        </div>
    </div>

    <form method="POST" action="{{ route('LKPD.penguranganDownload') }}" style="display: none;">
        @csrf
        <label for="judulInput">Judul:</label>
        <input type="text" name="judulInput" id="judulInput" value="">

        <label for="hasilInput">Hasil:</label>
        <input type="text" name="hasilInput" id="hasilInput" value="">

    </form>

    <div class="mt-5 hidden rounded-2xl border border-gray-200" id="resultContainer">
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
            <p class="judul px-3 py-8 text-center text-2xl font-bold"></p>
            <div class="hasil grid grid-cols-1 gap-7 text-sm md:grid-cols-5"></div>
        </div>
    </div>

    <script>
        // Pembatasan untuk input jumlah soal
        document.getElementById('jumlahSoal').addEventListener('input', function(e) {
            let value = parseInt(e.target.value, 10);
            if (isNaN(value) || value < 0) {
                e.target.value = '';
            } else if (value > 35) {
                e.target.value = 35;
            }
        });

        // Generate
        document.getElementById('kirimBtn').addEventListener('click', function() {
            const jumlahDigit = document.getElementById('digit').value;
            const jumlahDigitConvert = parseInt(jumlahDigit, 10);

            let judul = document.getElementById('judul').value;
            let jumlahSoal = document.getElementById('jumlahSoal').value;

            document.querySelector('.judul').textContent = judul;

            // Show the result container
            document.getElementById('resultContainer').classList.remove('hidden');

            let hasilDiv = document.querySelector('.hasil');
            hasilDiv.innerHTML = '';


            for (let i = 0; i < jumlahSoal; i++) {
                let angkaPertama = Math.floor(Math.random() * jumlahDigitConvert);
                let angkaKedua = Math.floor(Math.random() * jumlahDigitConvert);

                if (angkaPertama < angkaKedua) {
                    [angkaPertama, angkaKedua] = [angkaKedua, angkaPertama];
                }

                let hasil = angkaPertama - angkaKedua;

                let soalHTML =
                    // `<p>${i + 1}) ${angkaPertama} - ${angkaKedua} = <span class="hasilHide">${hasil}</span></p>`;
                    `<p class="hidden">${i + 1}) ${angkaPertama} - ${angkaKedua} = <span class="hasilHide">${hasil}</span></p> <div class="flex"><div class="font-bold">${i + 1})</div><div class="ml-4 w-full"><div class="text-right">${angkaPertama}</div><div class="text-right">${angkaKedua}</div><hr class="my-2 border-t border-black" /><div class="text-right"><span class="hasilHide">${hasil}</span></div></div><span class="ml-1 mt-10 font-bold">-</span></div>`;
                hasilDiv.innerHTML += soalHTML;
            }
        });

        // hide hasil
        let isHidden = false;
        document.querySelector('.hide').addEventListener('click', function() {
            const hasilElements = document.querySelectorAll('.hasilHide');

            hasilElements.forEach(function(result) {
                result.style.display = result.style.display === 'none' ? 'inline' : 'none';
            });
            isHidden = !isHidden;
        });


        document.querySelector('.download').addEventListener('click', function() {
            let judulText = document.querySelector('.judul').textContent;
            let hasilText = document.querySelector('.hasil').innerHTML;

            let soalElements = document.querySelectorAll('.hasil p');
            let datapertama = [];
            let datakedua = [];
            let hasil = [];

            soalElements.forEach((soal) => {
                let match = soal.textContent.match(/(\d+)\s\-\s(\d+)/);
                if (match) {
                    datapertama.push(match[1]);
                    datakedua.push(match[2]);
                }


                let hasilElement = soal.querySelector('.hasilHide');
                if (hasilElement) {
                    hasil.push(hasilElement.textContent.trim());
                }
            });

            let dataToSend = isHidden ? {
                datapertama: datapertama,
                datakedua: datakedua
            } : {
                datapertama: datapertama,
                datakedua: datakedua,
                hasil: hasil
            };

            document.getElementById('hasilInput').value = JSON.stringify(dataToSend);
            let judulInput = document.getElementById('judulInput').value = judulText;


            console.log(hasilInput);

            document.querySelector('form[action="{{ route('LKPD.penguranganDownload') }}"]').submit();
        });
    </script>
</x-dashboard.app>
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>

<body>
    <div class="mb-4">
        <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
        <input type="text" name="judul" id="judul" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
    </div>

    <div class="mb-4">
        <label for="digit" class="block text-sm font-medium text-gray-700">Digit</label>
        <select id="digit" name="digit">
            <option value="" disabled selected>Pilih jumlah digit</option>
            <option value="9">1</option>
            <option value="90">2</option>
            <option value="900">3</option>
            <option value="9000">4</option>
            <option value="90000">5</option>
        </select>
    </div>

    <div class="mb-4">
        <label for="jumlahSoal" class="block text-sm font-medium text-gray-700">Jumlah Soal</label>
        <input type="number" name="jumlahSoal" id="jumlahSoal" class="mt-1 p-2 w-full border border-gray-300 rounded-md" max="35" required>
    </div>    

    <div>
        <button type="button" id="kirimBtn" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Kirim</button>
    </div>

    <button class="hide px-4 py-2 bg-red-500 text-white font-semibold rounded-md hover:bg-red-600">Hide Results</button>
    <button class="download">Download</button>


    <form method="POST" action="{{ route('LKPD.penguranganDownload') }}" style="display: none;">
        @csrf
        <label for="judulInput">Judul:</label>
        <input type="text" name="judulInput" id="judulInput" value="">

        <label for="hasilInput">Hasil:</label>
        <input type="text" name="hasilInput" id="hasilInput" value="">

    </form>


    <p>Judul: <span class="judul"></span></p>
    <div class="hasil"></div>

    <script>
        // Pembatasan untuk input jumlah soal
        document.getElementById('jumlahSoal').addEventListener('input', function (e) {
            let value = parseInt(e.target.value, 10);
            if (isNaN(value) || value < 0) {
                e.target.value = '';
            } else if (value > 35) {
                e.target.value = 35;
            }
        });

        // Generate
        document.getElementById('kirimBtn').addEventListener('click', function() {
            const jumlahDigit = document.getElementById('digit').value;
            const jumlahDigitConvert = parseInt(jumlahDigit, 10);

            let judul = document.getElementById('judul').value;
            let jumlahSoal = document.getElementById('jumlahSoal').value;

            document.querySelector('.judul').textContent = judul;

            let hasilDiv = document.querySelector('.hasil');
            hasilDiv.innerHTML = '';

        
            for (let i = 0; i < jumlahSoal; i++) {
                let angkaPertama = Math.floor(Math.random() * jumlahDigitConvert);
                let angkaKedua = Math.floor(Math.random() * jumlahDigitConvert);

                if (angkaPertama < angkaKedua) {
                    [angkaPertama, angkaKedua] = [angkaKedua, angkaPertama];
                }

                let hasil = angkaPertama - angkaKedua;

                let soalHTML = `<p>${i + 1}) ${angkaPertama} - ${angkaKedua} = <span class="hasilHide">${hasil}</span></p>`;
                hasilDiv.innerHTML += soalHTML;
            }
        });

        // hide hasil
        let isHidden = false;
        document.querySelector('.hide').addEventListener('click', function() {
            const hasilElements = document.querySelectorAll('.hasilHide');

            hasilElements.forEach(function(result) {
                result.style.display = result.style.display === 'none' ? 'inline' : 'none';
            });
            isHidden = !isHidden;
        });

        document.querySelector('.download').addEventListener('click', function() {
            let judulText = document.querySelector('.judul').textContent;
            let hasilText = document.querySelector('.hasil').innerHTML;

            let soalElements = document.querySelectorAll('.hasil p');
            let datapertama = [];
            let datakedua = [];
            let hasil = [];

            soalElements.forEach((soal) => {
                let match = soal.textContent.match(/(\d+)\s\-\s(\d+)/);
                if (match) {
                    datapertama.push(match[1]);
                    datakedua.push(match[2]);
                }

                
                let hasilElement = soal.querySelector('.hasilHide');
                if (hasilElement) {
                hasil.push(hasilElement.textContent.trim());
                }
            });

            let dataToSend = isHidden
            ? { datapertama: datapertama, datakedua: datakedua }
            : { datapertama: datapertama, datakedua: datakedua, hasil: hasil };

            document.getElementById('hasilInput').value = JSON.stringify(dataToSend);
            let judulInput = document.getElementById('judulInput').value = judulText;
           

            console.log(hasilInput);
            
            document.querySelector('form').submit();
        });

        
    </script>
</body>
</html> --}}


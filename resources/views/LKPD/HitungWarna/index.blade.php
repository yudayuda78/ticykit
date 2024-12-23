<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <style>


    </style>
</head>

<body>
    <div class="mb-4">
        <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
        <input type="text" name="judul" id="judul" class="w-full p-2 mt-1 border border-gray-300 rounded-md" required>

        <label for="jumlahsoal" class="block text-sm font-medium text-gray-700">Jumlah soal</label>
        <input type="number" name="jumlahsoal" id="jumlahsoal" class="w-full p-2 mt-1 border border-gray-300 rounded-md" required>
    </div>
    
    <div>
        <button type="button" id="kirimBtn" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600">Kirim</button>
    </div>

    <button class="px-4 py-2 font-semibold text-white bg-red-500 rounded-md hide hover:bg-red-600">Hide Results</button>
    <button class="download">Download</button>

    <form method="POST" action="{{ route('LKPD.hitungwarnaDownload') }}" style="display: none;">
        @csrf
        <label for="judulInput">Judul:</label>
        <input type="text" name="judulInput" id="judulInput" value="">

        <label for="angkasatuInput"></label>
        <input type="text" name="angkasatuInput" id="angkasatuInput" value="">

        <label for="angkaduaInput"></label>
        <input type="text" name="angkaduaInput" id="angkaduaInput" value="">
    </form>

    <p id="judulOutput"></p>
    <div class="soalcontainer">
        
    </div>

    <script>
        let soalData = {
            jumlahGmbr: [],
            jumlahJawaban: []
        };

        document.getElementById('kirimBtn').addEventListener('click', function() {
            const gambarWarnaList = [
                { src: 'asset(img/apel.webp)', alt: 'Gambar apel' },
                { src: 'asset(img/jeruk.webp)', alt: 'Gambar jeruk' },
                { src: 'asset(img/semangka.webp)', alt: 'Gambar semangka' },
                { src: 'asset(img/pisang.webp)', alt: 'Gambar pisang' }
            ];

            const gambarHitamPutihList = [
                { src: 'asset(img/apelhitamputih.webp)', alt: 'Gambar apel hitam putih' },
                { src: 'asset(img/jerukhitamputih.webp)', alt: 'Gambar jeruk hitam putih' },
                { src: 'asset(img/semangkahitamputih.webp)', alt: 'Gambar semangka hitam putih' },
                { src: 'asset(img/pisanghitamputih.webp)', alt: 'Gambar pisang hitam putih' }
            ];

            const jumlahSoal = parseInt(document.getElementById('jumlahsoal').value);
            const soalContainer = document.querySelector('.soalcontainer');
            soalContainer.innerHTML = '';

            for (let i = 0; i < jumlahSoal; i++) {
                
                let angkasatu = Math.floor(Math.random() * 8) + 1;
                let angkadua = Math.floor(Math.random() * (8 - angkasatu)) + 1;

                
                const soalDiv = document.createElement('div');
                soalDiv.className = 'soal';
                soalDiv.textContent = `No ${i + 1}`;

                
                const angkasatuDiv = document.createElement('div');
                angkasatuDiv.className = 'angkasatu';
                angkasatuDiv.textContent = `${angkasatu}`;

                const angkaduaDiv = document.createElement('div');
                angkaduaDiv.className = 'angkadua';
                angkaduaDiv.textContent = `${angkadua}`;

                
                soalDiv.appendChild(angkasatuDiv);
                soalDiv.appendChild(angkaduaDiv);

              
                const warnaIndex = i % gambarWarnaList.length;
                const gambarWarna = document.createElement('img');
                gambarWarna.className = 'gambarwarna';
                gambarWarna.src = gambarWarnaList[warnaIndex].src;
                gambarWarna.alt = gambarWarnaList[warnaIndex].alt;

               
                soalDiv.appendChild(gambarWarna);

                
                for (let j = 0; j < 7; j++) {
                    const hitamPutihIndex = (i + j) % gambarHitamPutihList.length;
                    const gambarHitamPutih = document.createElement('img');
                    gambarHitamPutih.className = 'gambarhitamputih';
                    gambarHitamPutih.src = gambarHitamPutihList[hitamPutihIndex].src;
                    gambarHitamPutih.alt = gambarHitamPutihList[hitamPutihIndex].alt;

                    soalDiv.appendChild(gambarHitamPutih);
                }

                
                soalContainer.appendChild(soalDiv);
            }

           
            document.getElementById('judulOutput').textContent = 'Judul: ' + document.getElementById('judul').value;
        });





        document.querySelector('.download').addEventListener('click', function() {
    const judulInput = document.getElementById('judulInput');
    const angkasatuInput = document.getElementById('angkasatuInput');
    const angkaduaInput = document.getElementById('angkaduaInput');

    // Ambil nilai judul
    judulInput.value = document.getElementById('judul').value;

    // Ambil semua elemen dengan class 'angkasatu' dan 'angkadua'
    const angkasatuElements = document.querySelectorAll('.angkasatu');
    const angkaduaElements = document.querySelectorAll('.angkadua');

    // Masukkan nilai ke dalam array
    const angkasatuArray = Array.from(angkasatuElements).map(el => el.textContent.trim());
    const angkaduaArray = Array.from(angkaduaElements).map(el => el.textContent.trim());

    // Simpan array ke input sebagai JSON string
    angkasatuInput.value = JSON.stringify(angkasatuArray);
    angkaduaInput.value = JSON.stringify(angkaduaArray);

    // Submit form
    judulInput.form.submit();
});
    </script>
</body>
</html>

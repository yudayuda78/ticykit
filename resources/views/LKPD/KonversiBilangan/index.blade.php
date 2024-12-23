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

    <form method="POST" action="{{ route('LKPD.konversibilanganDownload') }}" style="display: none;">
        @csrf
        <label for="judulInput">Judul:</label>
        <input type="text" name="judulInput" id="judulInput" value="">

        <label for="pembilangsatuInput"></label>
        <input type="text" name="pembilangsatuInput" id="pembilangsatuInput" value="">

        <label for="penyebutsatuInput"></label>
        <input type="text" name="penyebutsatuInput" id="penyebutsatuInput" value="">

        <label for="hasilInput"></label>
        <input type="text" name="hasilInput" id="hasilInput" value="">
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


            const jumlahSoal = parseInt(document.getElementById('jumlahsoal').value);
            const soalContainer = document.querySelector('.soalcontainer');
            soalContainer.innerHTML = '';

            for (let i = 0; i < jumlahSoal; i++) {
    
                function isNotPrime(num) {
                    if (num < 2) return true; // Bilangan kurang dari 2 bukan prima
                    for (let i = 2; i <= Math.sqrt(num); i++) {
                        if (num % i === 0) return true; // Jika habis dibagi, bukan prima
                    }
                    return false; // Jika tidak habis dibagi, maka prima
                    }

                // Membuat array bilangan bukan prima yang genap atau kelipatan 5
                let numbers = [];
                for (let i = 1; i <= 100; i++) {
                    if (isNotPrime(i) && (i % 2 === 0 || i % 5 === 0)) {
                        numbers.push(i);
                    }
                }

                // Mengambil bilangan acak dari array
                let pembilangsatu = numbers[Math.floor(Math.random() * numbers.length)];
                let penyebutsatu = Math.floor(Math.random() * 19 + 2) * 5;

                let hasil = pembilangsatu / penyebutsatu;
                let hasilPembulatan = parseFloat(hasil.toFixed(1));
                console.log(hasilPembulatan);

    
                const soalDiv = document.createElement('div');
                soalDiv.className = 'soal';
                soalDiv.textContent = `No ${i + 1}`;

                const pembilangSatuDiv = document.createElement('div');
                pembilangSatuDiv.className = 'pembilangSatu';
                pembilangSatuDiv.textContent =  pembilangsatu;

                const penyebutSatuDiv = document.createElement('div');
                penyebutSatuDiv.className = 'penyebutSatu';
                penyebutSatuDiv.textContent = penyebutsatu;


                const hasilDiv = document.createElement('div');
                hasilDiv.className = 'hasil';
                hasilDiv.textContent = hasilPembulatan;

   
                soalContainer.appendChild(soalDiv);
                soalDiv.appendChild(pembilangSatuDiv);
                soalDiv.appendChild(penyebutSatuDiv);
                soalDiv.appendChild(hasilDiv);
            }


            document.getElementById('judulOutput').textContent = 'Judul: ' + document.getElementById('judul').value;
        });


       


        let hideResults = false;
        document.querySelector('.hide').addEventListener('click', function() {
            hideResults = !hideResults;


            const hasilOutput = document.querySelectorAll('.hasil');
            if (hideResults) {
                hasilOutput.forEach(el => el.style.display = 'none');
            } else {
                hasilOutput.forEach(el => el.style.display = 'block');
            }
        });

        document.querySelector('.download').addEventListener('click', function() {
            const judulInput = document.getElementById('judulInput');
            const pembilangsatuInput = document.getElementById('pembilangsatuInput');
            const penyebutsatuInput = document.getElementById('penyebutsatuInput');
            const hasilInput = document.getElementById('hasilInput');

    
            judulInput.value = document.getElementById('judul').value;

          
            const pembilangsatuElements = document.querySelectorAll('.pembilangSatu');
            const penyebutsatuElements = document.querySelectorAll('.penyebutSatu');
            const hasilElements = document.querySelectorAll('.hasil');

        
            const pembilangsatuArray = Array.from(pembilangsatuElements).map(el => el.textContent.trim());
            const penyebutsatuArray = Array.from(penyebutsatuElements).map(el => el.textContent.trim());
            const hasilArray = Array.from(hasilElements).map(el => el.textContent.trim());

          
            pembilangsatuInput.value = JSON.stringify(pembilangsatuArray);
            penyebutsatuInput.value = JSON.stringify(penyebutsatuArray);
            hasilInput.value = JSON.stringify(hasilArray);

            if (!hideResults) {
                const hasilArray = Array.from(hasilElements).map(el => el.textContent.trim());
                hasilInput.value = JSON.stringify(hasilArray);
            } else {
                hasilInput.value = '';
            }

            
            judulInput.form.submit();
        });
    </script>
</body>
</html>

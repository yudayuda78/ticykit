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

    <form method="POST" action="{{ route('LKPD.bilanganpecahanperkalianDownload') }}" style="display: none;">
        @csrf
        <label for="judulInput">Judul:</label>
        <input type="text" name="judulInput" id="judulInput" value="">

        <label for="pembilangsatuInput"></label>
        <input type="text" name="pembilangsatuInput" id="pembilangsatuInput" value="">

        <label for="pembilangduaInput"></label>
        <input type="text" name="pembilangduaInput" id="pembilangduaInput" value="">

        <label for="penyebutsatuInput"></label>
        <input type="text" name="penyebutsatuInput" id="penyebutsatuInput" value="">

        <label for="penyebutduaInput"></label>
        <input type="text" name="penyebutduaInput" id="penyebutduaInput" value="">

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

        document.getElementById('kirimBtn').addEventListener('click', function () {
    function cariFPB(a, b) {
        while (b !== 0) {
            let temp = b;
            b = a % b;
            a = temp;
        }
        return a;
    }

    const jumlahSoal = parseInt(document.getElementById('jumlahsoal').value);
    const soalContainer = document.querySelector('.soalcontainer');
    soalContainer.innerHTML = '';

    for (let i = 0; i < jumlahSoal; i++) {
        let pembilangsatu = Math.floor(Math.random() * 10) + 1;
        let pembilangdua = Math.floor(Math.random() * 10) + 1;
        let penyebutsatu = Math.floor(Math.random() * 10) + 1;
        let penyebutdua = Math.floor(Math.random() * 10) + 1;

        // Hitung hasil perkalian
        let hasilPembilang = pembilangsatu * pembilangdua;
        let hasilPenyebut = penyebutsatu * penyebutdua;

        // Sederhanakan hasil dengan FPB
        const fpb = cariFPB(hasilPembilang, hasilPenyebut);
        hasilPembilang /= fpb;
        hasilPenyebut /= fpb;

        // Tampilkan soal dan hasil
        const soalDiv = document.createElement('div');
        soalDiv.className = 'soal';
        soalDiv.textContent = `No ${i + 1}`;

        const pembilangSatuDiv = document.createElement('div');
        pembilangSatuDiv.className = 'pembilangSatu';
        pembilangSatuDiv.textContent = pembilangsatu;

        const pembilangDuaDiv = document.createElement('div');
        pembilangDuaDiv.className = 'pembilangDua';
        pembilangDuaDiv.textContent = pembilangdua;

        const penyebutSatuDiv = document.createElement('div');
        penyebutSatuDiv.className = 'penyebutSatu';
        penyebutSatuDiv.textContent = penyebutsatu;

        const penyebutDuaDiv = document.createElement('div');
        penyebutDuaDiv.className = 'penyebutDua';
        penyebutDuaDiv.textContent = penyebutdua;

        const hasilDiv = document.createElement('div');
        hasilDiv.className = 'hasil';
        hasilDiv.textContent = `${hasilPembilang}/${hasilPenyebut}`;

        soalContainer.appendChild(soalDiv);
        soalDiv.appendChild(pembilangSatuDiv);
        soalDiv.appendChild(pembilangDuaDiv);
        soalDiv.appendChild(penyebutSatuDiv);
        soalDiv.appendChild(penyebutDuaDiv);
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
            const pembilangduaInput = document.getElementById('pembilangduaInput');
            const penyebutsatuInput = document.getElementById('penyebutsatuInput');
            const penyebutduaInput = document.getElementById('penyebutduaInput');
            const hasilInput = document.getElementById('hasilInput');

    
            judulInput.value = document.getElementById('judul').value;

          
            const pembilangsatuElements = document.querySelectorAll('.pembilangSatu');
            const pembilangduaElements = document.querySelectorAll('.pembilangDua');
            const penyebutsatuElements = document.querySelectorAll('.penyebutSatu');
            const penyebutduaElements = document.querySelectorAll('.penyebutDua');
            const hasilElements = document.querySelectorAll('.hasil');

        
            const pembilangsatuArray = Array.from(pembilangsatuElements).map(el => el.textContent.trim());
            const pembilangduaArray = Array.from(pembilangduaElements).map(el => el.textContent.trim());
            const penyebutsatuArray = Array.from(penyebutsatuElements).map(el => el.textContent.trim());
            const penyebutduaArray = Array.from(penyebutduaElements).map(el => el.textContent.trim());
            const hasilArray = Array.from(hasilElements).map(el => el.textContent.trim());

          
            pembilangsatuInput.value = JSON.stringify(pembilangsatuArray);
            pembilangduaInput.value = JSON.stringify(pembilangduaArray);

            penyebutsatuInput.value = JSON.stringify(penyebutsatuArray);
            penyebutduaInput.value = JSON.stringify(penyebutduaArray);
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

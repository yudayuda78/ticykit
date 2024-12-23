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

    <form method="POST" action="{{ route('LKPD.statistikadasarDownload') }}" style="display: none;">
        @csrf
        <label for="judulInput">Judul:</label>
        <input type="text" name="judulInput" id="judulInput" value="">

        <label for="soalInput"></label>
        <input type="text" name="soalInput" id="soalInput" value="">

        <label for="meanInput"></label>
        <input type="text" name="meanInput" id="meanInput" value="">

        <label for="medianInput"></label>
        <input type="text" name="medianInput" id="medianInput" value="">

        <label for="modusInput"></label>
        <input type="text" name="modusInput" id="modusInput" value="">


    </form>

    <p id="judulOutput"></p>
    <div class="soalcontainer">
        
    </div>

    <script>
        let soalData = {
            jumlahGmbr: [],
            jumlahJawaban: []
        };

        // Fungsi untuk menghitung mean
function calculateMean(array) {
    const sum = array.reduce((acc, num) => acc + num, 0);
    return (sum / array.length).toFixed(2); // Dibatasi hingga 2 desimal
}

// Fungsi untuk menghitung median
function calculateMedian(array) {
    const sortedArray = [...array].sort((a, b) => a - b);
    const mid = Math.floor(sortedArray.length / 2);

    if (sortedArray.length % 2 === 0) {
        return ((sortedArray[mid - 1] + sortedArray[mid]) / 2).toFixed(2); // Rata-rata dua nilai tengah
    } else {
        return sortedArray[mid];
    }
}

// Fungsi untuk menghitung modus
function calculateMode(array) {
    const frequency = {};
    array.forEach(num => {
        frequency[num] = (frequency[num] || 0) + 1;
    });

    const maxFreq = Math.max(...Object.values(frequency));
    const modes = Object.keys(frequency).filter(key => frequency[key] === maxFreq);

    if (modes.length === array.length) {
        return "No mode"; // Jika semua nilai memiliki frekuensi sama
    }
    return modes.join(', ');
}


        document.getElementById('kirimBtn').addEventListener('click', function() {
            const jumlahSoal = parseInt(document.getElementById('jumlahsoal').value);
    const soalContainer = document.querySelector('.soalcontainer');
    soalContainer.innerHTML = '';

    let daftarSoal = [];

    for (let i = 0; i < jumlahSoal; i++) {
        let soal = [];

        // Panjang array acak antara 10 hingga 15
        let panjangArray = 11 + (Math.floor(Math.random() * 3) * 2);

        // Mengisi array soal dengan angka acak 1-10
        for (let j = 0; j < panjangArray; j++) {
            soal.push(Math.floor(Math.random() * 10) + 1);
        }

        daftarSoal.push(soal);

        // Menampilkan soal ke dalam kontainer
        const soalDiv = document.createElement('div');
        soalDiv.className = 'soal';
        soalDiv.textContent = `[${soal.join(', ')}]`;

        // Menghitung statistik
        const mean = calculateMean(soal);
        const median = calculateMedian(soal);
        const mode = calculateMode(soal);

        // Elemen untuk mean
        const meanDiv = document.createElement('div');
        meanDiv.className = 'mean';
        meanDiv.textContent = mean;

        // Elemen untuk median
        const medianDiv = document.createElement('div');
        medianDiv.className = 'median';
        medianDiv.textContent = median;

        // Elemen untuk modus
        const modeDiv = document.createElement('div');
        modeDiv.className = 'modus';
        modeDiv.textContent = mode;

        // Menyusun elemen ke dalam soal
      

        soalContainer.appendChild(soalDiv);
        soalContainer.appendChild(meanDiv);
        soalContainer.appendChild(medianDiv);
        soalContainer.appendChild(modeDiv);
    }

    console.log('Daftar Soal:', daftarSoal);

    // Menampilkan judul
    document.getElementById('judulOutput').textContent = 'Judul: ' + document.getElementById('judul').value;
        });


       


        let hideResults = false;
        document.querySelector('.hide').addEventListener('click', function() {
            hideResults = !hideResults;


            const mean = document.querySelectorAll('.mean');
            const median = document.querySelectorAll('.median');
            const modus = document.querySelectorAll('.modus');
            if (hideResults) {
                mean.forEach(el => el.style.display = 'none');
                median.forEach(el => el.style.display = 'none');
                modus.forEach(el => el.style.display = 'none');
            } else {
                mean.forEach(el => el.style.display = 'block');
                median.forEach(el => el.style.display = 'block');
                modus.forEach(el => el.style.display = 'block');
            }
        });

        document.querySelector('.download').addEventListener('click', function() {
            const judulInput = document.getElementById('judulInput');
            const soalInput = document.getElementById('soalInput');
            const meanInput = document.getElementById('meanInput');
            const medianInput = document.getElementById('medianInput');
            const modusInput = document.getElementById('modusInput');

    
            judulInput.value = document.getElementById('judul').value;

            const soalElements = document.querySelectorAll('.soal');
            const meanElements = document.querySelectorAll('.mean');
            const medianElements = document.querySelectorAll('.median');
            const modusElements = document.querySelectorAll('.modus');
        

        
            const soalArray = Array.from(soalElements).map(el => el.textContent.trim());
            const meanArray = Array.from(meanElements).map(el => el.textContent.trim());
            const medianArray = Array.from(medianElements).map(el => el.textContent.trim());
            const modusArray = Array.from(modusElements).map(el => el.textContent.trim());
           

          
            soalInput.value = JSON.stringify(soalArray);
            meanInput.value = JSON.stringify(meanArray);

            medianInput.value = JSON.stringify(medianArray);
            modusInput.value = JSON.stringify(modusArray);
           

            if (!hideResults) {
                const soalArray = Array.from(soalElements).map(el => el.textContent.trim());
            const meanArray = Array.from(meanElements).map(el => el.textContent.trim());
            const medianArray = Array.from(medianElements).map(el => el.textContent.trim());
            const modusArray = Array.from(modusElements).map(el => el.textContent.trim());
           

          
            soalInput.value = JSON.stringify(soalArray);
            meanInput.value = JSON.stringify(meanArray);

            medianInput.value = JSON.stringify(medianArray);
            modusInput.value = JSON.stringify(modusArray);
            } else {
                soalInput.value = '';
                meanInput.value = '';
                medianInput.value = '';
                modusInput.value = '';
            }

            
            judulInput.form.submit();
        });
    </script>
</body>
</html>

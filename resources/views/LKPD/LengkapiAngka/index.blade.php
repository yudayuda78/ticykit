<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <style>
         .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(40px, 1fr));
        gap: 8px;
    }
    .soal {
        font-weight: bold;
        background-color: #f3f4f6; /* Warna abu-abu terang */
        transition: transform 0.2s;
    }
    .soal:hover {
        transform: scale(1.1);
        background-color: #e5e7eb; /* Warna abu-abu lebih gelap */
    }

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

    <form method="POST" action="{{ route('LKPD.lengkapiangkaDownload') }}" style="display: none;">
        @csrf
        <label for="judulInput">Judul:</label>
        <input type="text" name="judulInput" id="judulInput" value="">

        <label for="angkaInput"></label>
        <input type="text" name="angkaInput" id="angkaInput" value="">

      
    </form>

    <p id="judulOutput"></p>
    <div class="soalcontainer grid grid-cols-5 gap-2 mt-4"></div>
        
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

            
            const angkaContainers = [];
            for (let i = 1; i <= jumlahSoal; i++) {
                const angkaContainer = document.createElement('div');
                angkaContainer.className = 'angka-container p-2 text-center bg-gray-200 border rounded';
                soalContainer.appendChild(angkaContainer);

                const angkaSpan = document.createElement('span');
                angkaSpan.textContent = i;
                angkaSpan.className = 'angka-span';
                angkaContainer.appendChild(angkaSpan);

                angkaContainers.push(angkaSpan);
            }
            console.log(angkaContainers);

    // Tambahkan class "akan-hilang" ke beberapa elemen secara acak
    const jumlahHilang = Math.floor(Math.random() * angkaContainers.length); // Jumlah elemen yang akan diberi class secara random
    const indices = new Set();

    while (indices.size < jumlahHilang) {
        const randomIndex = Math.floor(Math.random() * angkaContainers.length);
        indices.add(randomIndex);
    }

    indices.forEach(index => {
        angkaContainers[index].classList.add('akan-hilang');
    });

    document.getElementById('judulOutput').textContent = 'Judul: ' + document.getElementById('judul').value;
        });


       


        let hideResults = false;
        document.querySelector('.hide').addEventListener('click', function() {
            hideResults = !hideResults;


            const hasilOutput = document.querySelectorAll('.akan-hilang');
            if (hideResults) {
                hasilOutput.forEach(el => el.style.display = 'none');
            } else {
                hasilOutput.forEach(el => el.style.display = 'block');
            }
        });

        document.querySelector('.download').addEventListener('click', function() {
            const judulInput = document.getElementById('judulInput');
            const angkaInput = document.getElementById('angkaInput');
            const angka = document.querySelectorAll('.angka-span');
 


            const valuesAngka = Array.from(angka).map(item => item.textContent);

        

    
            judulInput.value = document.getElementById('judul').value;
            angkaInput.value = valuesAngka;

          
            

            if (hideResults) {
                const visibleAngka = Array.from(angka).filter(item => !item.classList.contains('akan-hilang'));
                const valuesAngka = visibleAngka.map(item => item.textContent);
                angkaInput.value = valuesAngka;
            } else {
                angkaInput.value = valuesAngka;
            }

            
            judulInput.form.submit();
        });
    </script>
</body>
</html>

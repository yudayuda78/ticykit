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
    </div>
    <div class="mb-4">
        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
        <Select name="category" id="category">
            <option value="" disabled>Pilih</option>
            <option value="buah">Buah</option>
            <option value="binatang">Binatang</option>

        </Select>
    </div>
    <p>Masukan soal:</p>
    <div id="soalContainer">
        <div class="mb-4">
            <label for="soal" class="block text-sm font-medium text-gray-700">Soal</label>
            <select name="soal" id="soal" class="w-full p-2 mt-1 border border-gray-300 rounded-md">
                <option value="" disabled>Pilih/option>
            </select>

        </div>
    </div>

    <div>
        <button type="button" id="tambahsoal" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600">Tambah Soal</button>
    </div>
    <div>
        <button type="button" id="hapussoal" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600">Hapus Soal</button>
    </div>

    <div>
        <button type="button" id="kirimBtn" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600">Kirim</button>
    </div>

    <button class="px-4 py-2 font-semibold text-white bg-red-500 rounded-md hide hover:bg-red-600">Hide Results</button>
    <button class="download">Download</button>

    <form method="POST" action="{{ route('LKPD.cocokkatagambarDownload') }}" style="display: none;">
        @csrf
        <label for="judulInput">Judul:</label>
        <input type="text" name="judulInput" id="judulInput" value="">



        <label for="soalInput">Soal:</label>
        <input type="text" name="soalInput" id="soalInput" value="">

        <label for="jawabanInput"></label>
        <input type="text" name="jawabanInput" id="jawabanInput" value="">
    </form>

    <p id="judulOutput"></p>
    <p id="soalOutput"></p>
    <p id="jawabanOutput"></p>


    <script>
        const options = {
            buah: ["Semangka", "Mangga", "Durian", "Jeruk", "Apel"],
            binatang: ["Kucing", "Burung", "Ayam", "Bebek", "Kambing"]
        };




        document.getElementById('category').addEventListener('change', function() {
            const selectedCategory = this.value;
            const soalSelect = document.getElementById('soal');

            soalSelect.innerHTML = "<option value=''>Pilih </option>";
            options[selectedCategory].forEach(option => {
                const newOption = document.createElement('option');
                newOption.value = option.toLowerCase();
                newOption.textContent = option;
                soalSelect.appendChild(newOption);
            });
        });


        let soalList = [];


        // Tambah soal
        document.getElementById('tambahsoal').addEventListener('click', function() {
            let selectedCategory = document.getElementById('category').value;

            if (selectedCategory === "") {
                alert("Pilih kategori terlebih dahulu");
                return;
            }

            let newSoalDiv = document.createElement('div');
            newSoalDiv.classList.add('mb-4');

            let newLabel = document.createElement('label');
            newLabel.classList.add('block', 'text-sm', 'font-medium', 'text-gray-700');
            newLabel.textContent = 'Soal';

            let newSelect = document.createElement('select');
            newSelect.name = 'soal';
            newSelect.classList.add('mt-1', 'p-2', 'w-full', 'border', 'border-gray-300', 'rounded-md');

            // Menambahkan opsi default
            let defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.disabled = true;
            defaultOption.selected = true;
            defaultOption.textContent = 'Pilih';
            newSelect.appendChild(defaultOption);


            options[selectedCategory].forEach(option => {
                const newOption = document.createElement('option');
                newOption.value = option.toLowerCase();
                newOption.textContent = option;
                newSelect.appendChild(newOption);
            });

            newSoalDiv.appendChild(newLabel);
            newSoalDiv.appendChild(newSelect);
            document.getElementById('soalContainer').appendChild(newSoalDiv);
        });


        // Hapus soal
        document.getElementById('hapussoal').addEventListener('click', function() {
            let soalContainer = document.getElementById('soalContainer');
            if (soalContainer.children.length > 1) {
                soalContainer.removeChild(soalContainer.lastElementChild);
            } else {
                alert("Tidak dapat menghapus kolom soal lagi");
            }
        });


        document.getElementById('kirimBtn').addEventListener('click', function() {
            let soalElements = document.querySelectorAll('#soalContainer select[name="soal"]');

            soalList = [];


            soalElements.forEach((input) => {
                soalList.push(input.value);
            });
            
            window.soalListOriginal = soalList.slice(); 


            document.getElementById('judulOutput').textContent = 'Judul: ' + document.getElementById('judul').value;

            const templateGambar = "{{ asset('img/template.webp') }}";
            soalList.forEach(soal => {
                const img = document.createElement('img');
                img.src = templateGambar.replace("template", soal);
                img.alt = "gambar " + soal;
                img.style.marginRight = "10px";
                soalOutput.appendChild(img);
            });

            let soalAcak = soalList.sort(() => Math.random() - 0.5);
       
            document.getElementById('jawabanOutput').textContent = soalAcak.join(', ');
           
        });



        document.querySelector('.download').addEventListener('click', function() {
            const judulInput = document.getElementById('judulInput');
            const soalInput = document.getElementById('soalInput');
            const jawabanInput = document.getElementById('jawabanInput');
            

            judulInput.value = document.getElementById('judul').value;
            
            soalInput.value = JSON.stringify(window.soalListOriginal);
            jawabanInput.value = document.getElementById('jawabanOutput').textContent;
            judulInput.form.submit();
        });
    </script>
</body>
</html>

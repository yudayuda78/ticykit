<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <style>

        #gridContainer {
            display: grid;
            grid-template-columns: repeat(20, 1fr);
            grid-template-rows: repeat(20, 1fr);
            gap: 2px;
            max-width: 600px;
            margin-top: 20px;
        }

        .gridCell {
            width: 100%;
            height: 100%;
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            text-transform: uppercase;
        }
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

    <form method="POST" action="{{ route('LKPD.mencarikatagambarDownload') }}" style="display: none;">
        @csrf
        <label for="judulInput">Judul:</label>
        <input type="text" name="judulInput" id="judulInput" value="">

        <label for="gridContainerInput">Judul:</label>
        <input type="text" name="gridContainerInput" id="gridContainerInput" value="">

        <label for="soalInput">Soal:</label>
        <input type="text" name="soalInput" id="soalInput" value="">
    </form>

    <p id="judulOutput"></p>
    <div id="gridContainer"></div>
    <p id="soalOutput">

    </p>


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
            console.log(soalList)



            document.getElementById('judulOutput').textContent = 'Judul: ' + document.getElementById('judul').value;

            const templateGambar = "{{ asset('img/template.webp') }}";
            soalList.forEach(soal => {
                const img = document.createElement('img');
                img.src = templateGambar.replace("template", soal);
                img.alt = "gambar " + soal;
                img.style.marginRight = "10px";
                soalOutput.appendChild(img);
            });


            const gridSize = 20;
            let grid = Array.from({ length: gridSize }, () => Array(gridSize).fill(''));

            function placeWord(word) {
                let placed = false;
                while (!placed) {
                        const direction = Math.floor(Math.random() * 3);
                    let row, col;

                    if (direction === 0) {
                        row = Math.floor(Math.random() * gridSize);
                        col = Math.floor(Math.random() * (gridSize - word.length));
                    } else if (direction === 1) {
                        row = Math.floor(Math.random() * (gridSize - word.length));
                        col = Math.floor(Math.random() * gridSize);
                    } else {
                        row = Math.floor(Math.random() * (gridSize - word.length));
                        col = Math.floor(Math.random() * (gridSize - word.length));
                    }

                    let canPlace = true;
                    for (let i = 0; i < word.length; i++) {
                        const currentRow = row + (direction === 1 ? i : 0);
                        const currentCol = col + (direction === 0 ? i : (direction === 2 ? i : 0));
                        if (grid[currentRow][currentCol] !== '' && grid[currentRow][currentCol] !== word[i]) {
                            canPlace = false;
                            break;
                        }
                    }

                    if (canPlace) {
                        for (let i = 0; i < word.length; i++) {
                            const currentRow = row + (direction === 1 ? i : 0);
                            const currentCol = col + (direction === 0 ? i : (direction === 2 ? i : 0));
                            grid[currentRow][currentCol] = word[i];
                        }
                        placed = true;
                    }
                }
            }

            soalList.forEach(word => placeWord(word));

            const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            for (let i = 0; i < gridSize; i++) {
                for (let j = 0; j < gridSize; j++) {
                    if (grid[i][j] === '') {
                        grid[i][j] = alphabet[Math.floor(Math.random() * alphabet.length)];
                    }
                }
            }

            const gridContainer = document.getElementById('gridContainer');
            gridContainer.innerHTML = '';
            grid.forEach(row => {
                row.forEach(letter => {
                    const cell = document.createElement('div');
                    cell.classList.add('gridCell');
                    cell.textContent = letter;
                    gridContainer.appendChild(cell);
                });
            });
        });



        document.querySelector('.download').addEventListener('click', function() {
            const judulInput = document.getElementById('judulInput');
            const soalInput = document.getElementById('soalInput');
            const gridContainerInput = document.getElementById('gridContainerInput')

            let gridText = Array.from(document.querySelectorAll('#gridContainer .gridCell'))
                        .map(cell => cell.textContent);
            judulInput.value = document.getElementById('judul').value;
            gridContainerInput.value = JSON.stringify(gridText);
            soalInput.value = JSON.stringify(soalList);
            judulInput.form.submit();
        });
    </script>
</body>
</html>

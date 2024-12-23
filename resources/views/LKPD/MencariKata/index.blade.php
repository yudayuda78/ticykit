<x-dashboard.app>
    <style>
        #gridContainer {
            margin: auto;
            display: grid;
            grid-template-columns: repeat(20, 1fr);
            grid-template-rows: repeat(20, 1fr);
            gap: 2px;
            max-width: 800px;
        }

        .gridCell {
            width: 100%;
            height: 100%;
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            /* font-size: 10px; */
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            text-transform: uppercase;
        }

        #resultContainer {
            display: none;
        }
    </style>
    <div class="pb-6">
        <a href="{{ route('LKPD') }}"
            class="me-2 rounded-full border-2 border-orange-500 px-2 py-1 pl-1 text-sm font-bold text-orange-500">
            <i class="ri-arrow-left-s-line"></i> LKPD
        </a>LKPD Mencari Kata
        </h3>
        <p class="pt-2 text-sm text-gray-500">Soal-soal tentang konsep dan penerapan operasi penjumlahan</p>
    </div>
    <div class="rounded-2xl border border-gray-200">
        <div class="px-7 py-5">
            <h3 class="font-bold">Informasi Lembar Kerja</h3>
            <p class="text-sm text-gray-500">Ketikan informasi tentang LKPD operasi penjumlahan yang akan dibuat</p>
        </div>
        <hr />
        <div class="space-y-3 p-7">
            <x-forms.input id="judul" label="Judul" name="judul" placeholder="Cth: Latihan Soal Penjumlahan"
                required />
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
    <form method="POST" action="{{ route('LKPD.mencarikataDownload') }}" style="display: none;">
        @csrf
        <label for="judulInput">Judul:</label>
        <input type="text" name="judulInput" id="judulInput" value="">

        <label for="gridContainerInput">Judul:</label>
        <input type="text" name="gridContainerInput" id="gridContainerInput" value="">

        <label for="soalInput">Soal:</label>
        <input type="text" name="soalInput" id="soalInput" value="">
    </form>

    <div class="mt-5 rounded-2xl border border-gray-200" id="resultContainer">
        <div class="flex flex-col gap-3 px-7 py-5 md:flex-row">
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

            <p id="judulOutput" class="judul px-3 py-8 text-center text-2xl font-bold"></p>

            <div id="gridContainer" class="text-xs"></div>
            <p class="mt-3 text-center">Cari Kata Dibawah Ini:</p>
            <p id="soalOutput" class="mt-1 text-center font-bold"></p>

        </div>
    </div>

    <script>
        let soalList = [];

        // Tambah soal
        document.getElementById('tambahsoal').addEventListener('click', function() {
            let newSoalDiv = document.createElement('div');
            newSoalDiv.classList.add('mb-4');
            let newLabel = document.createElement('label');
            newLabel.classList.add('mb-2', 'block', 'text-sm', 'font-medium', 'text-gray-900');
            newLabel.textContent = 'Soal';
            newLabel.setAttribute('for', 'soal');
            let newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'soal';
            newInput.classList.add('block', 'w-full', 'rounded-lg', 'border', 'border-gray-300', 'bg-gray-50',
                'p-2.5', 'text-sm', 'text-gray-900', 'focus:border-blue-500', 'focus:ring-blue-500');
            newInput.placeholder = 'Masukan Kata, Cth: BELAJAR';
            newInput.required = true;

            newSoalDiv.appendChild(newLabel);
            newSoalDiv.appendChild(newInput);
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
            let soalElements = document.querySelectorAll('#soalContainer input[name="soal"]');
            soalList = [];

            soalElements.forEach((input) => {
                soalList.push(input.value);
            });

            // Show the result container
            document.getElementById('resultContainer').style.display = 'block';

            document.getElementById('judulOutput').textContent = document.getElementById('judul').value;
            document.getElementById('soalOutput').textContent = soalList.join(', ');


            const gridSize = 20;
            let grid = Array.from({
                length: gridSize
            }, () => Array(gridSize).fill(''));

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
                    cell.classList.add('gridCell', 'text-[7px]',
                        'md:text-base', 'md:font-bold', 'font-normal');
                    cell.textContent = letter;
                    gridContainer.appendChild(cell);
                });
            });
        });



        document.querySelector('.download').addEventListener('click', function() {
            const judulInput = document.getElementById('judulInput');
            const soalInput = document.getElementById('soalInput');
            const gridContainerInput = document.getElementById('gridContainerInput');

            let gridText = Array.from(document.querySelectorAll('#gridContainer .gridCell'))
                .map(cell => cell.textContent);

            judulInput.value = document.getElementById('judul').value;
            gridContainerInput.value = JSON.stringify(gridText);
            soalInput.value = JSON.stringify(soalList);
            judulInput.form.submit();
        });
    </script>
</x-dashboard.app>


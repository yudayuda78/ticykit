<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <style>
        
        #grid div {
            display: flex;
        }
        #grid div div {
            width: 30px;
            height: 30px;
            border: 1px solid black;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="mb-4">
        <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
        <input type="text" name="judul" id="judul" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
    </div>
    <p>Masukan soal:</p>
    <div id="soalContainer">
        <div class="mb-4">
            <label for="soal" class="block text-sm font-medium text-gray-700">Soal</label>
            <input type="text" name="soal" id="soal" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="jawaban" class="block text-sm font-medium text-gray-700">Jawaban</label>
            <input type="text" name="jawaban" id="jawaban" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
        </div>
    </div>
    
    <div>
        <button type="button" id="tambahsoal" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Tambah Soal</button>
    </div>
    <div>
        <button type="button" id="hapussoal" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Hapus Soal</button>
    </div>

    <div>
        <button type="button" id="kirimBtn" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Kirim</button>
    </div>

    <button class="hide px-4 py-2 bg-red-500 text-white font-semibold rounded-md hover:bg-red-600">Hide Results</button>
    <button class="download">Download</button>

    <div id="grid"></div>
    
    <script>
        let crosswordData = [];

        document.getElementById('tambahsoal').addEventListener('click', function() {
            let newSoalDiv = document.createElement('div');
            newSoalDiv.classList.add('mb-4');

            let newLabelSoal = document.createElement('label');
            newLabelSoal.classList.add('block', 'text-sm', 'font-medium', 'text-gray-700');
            newLabelSoal.textContent = 'Soal';
            newLabelSoal.setAttribute('for', 'soal');

            let newInputSoal = document.createElement('input');
            newInputSoal.type = 'text';
            newInputSoal.name = 'soal';
            newInputSoal.classList.add('mt-1', 'p-2', 'w-full', 'border', 'border-gray-300', 'rounded-md');
            newInputSoal.required = true;

            let newLabelJawaban = document.createElement('label');
            newLabelJawaban.classList.add('block', 'text-sm', 'font-medium', 'text-gray-700', 'mt-4');
            newLabelJawaban.textContent = 'Jawaban';
            newLabelJawaban.setAttribute('for', 'jawaban');

            let newInputJawaban = document.createElement('input');
            newInputJawaban.type = 'text';
            newInputJawaban.name = 'jawaban';
            newInputJawaban.classList.add('mt-1', 'p-2', 'w-full', 'border', 'border-gray-300', 'rounded-md');
            newInputJawaban.required = true;

            newSoalDiv.appendChild(newLabelSoal);
            newSoalDiv.appendChild(newInputSoal);
            newSoalDiv.appendChild(newLabelJawaban);
            newSoalDiv.appendChild(newInputJawaban);

            document.getElementById('soalContainer').appendChild(newSoalDiv);
        });

        document.getElementById('hapussoal').addEventListener('click', function() {
            let soalContainer = document.getElementById('soalContainer');
            if (soalContainer.children.length > 1) {
                soalContainer.removeChild(soalContainer.lastElementChild);
            } else {
                alert("Tidak dapat menghapus kolom soal lagi");
            }
        });

        function generateCrosswordGrid(data) {
            const gridContainer = document.getElementById('grid');
            gridContainer.innerHTML = ''; // Bersihkan grid sebelum membuat yang baru

            const gridSize = Math.max(...data.map(item => item.answer.length), data.length) + 2;
            const grid = Array.from({ length: gridSize }, () => Array(gridSize).fill(''));

            data.forEach((item, index) => {
                const isHorizontal = index % 2 === 0;
                const startRow = isHorizontal ? index : 0;
                const startCol = isHorizontal ? 0 : index;

                grid[startRow][startCol] = (index + 1).toString(); // Nomor petunjuk
                for (let i = 0; i < item.answer.length; i++) {
                    if (isHorizontal) {
                        grid[startRow][startCol + i + 1] = item.answer[i]; // Horizontal
                    } else {
                        grid[startRow + i + 1][startCol] = item.answer[i]; // Vertical
                    }
                }
            });

            grid.forEach(row => {
                const rowDiv = document.createElement('div');
                rowDiv.style.display = 'flex';

                row.forEach(cell => {
                    const cellDiv = document.createElement('div');
                    cellDiv.textContent = cell || '';
                    cellDiv.style.border = '1px solid black';
                    cellDiv.style.width = '30px';
                    cellDiv.style.height = '30px';
                    cellDiv.style.display = 'flex';
                    cellDiv.style.alignItems = 'center';
                    cellDiv.style.justifyContent = 'center';
                    rowDiv.appendChild(cellDiv);
                });

                gridContainer.appendChild(rowDiv);
            });
        }

        document.getElementById('kirimBtn').addEventListener('click', function() {
            const soalElements = document.querySelectorAll('input[name="soal"]');
            const jawabanElements = document.querySelectorAll('input[name="jawaban"]');
            crosswordData = [];

            soalElements.forEach((soal, index) => {
                const jawaban = jawabanElements[index];
                crosswordData.push({ question: soal.value, answer: jawaban.value });
            });

            generateCrosswordGrid(crosswordData);
        });
    </script>
</body>
</html>

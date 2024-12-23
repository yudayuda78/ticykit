<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teka-Teki Silang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }

        #crossword {
            display: grid;
            grid-template-columns: repeat(10, 30px);
            grid-template-rows: repeat(10, 30px);
            gap: 5px;
            margin-top: 20px;
        }

        #crossword input {
            width: 30px;
            height: 30px;
            text-align: center;
            font-size: 18px;
        }

        input[type="text"] {
            margin: 10px;
            padding: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <h1>Teka-Teki Silang</h1>

    <!-- Form input soal dan jawaban -->
    <div>
        <input type="text" id="soalInput" placeholder="Masukkan soal">
        <input type="text" id="jawabanInput" placeholder="Masukkan jawaban">
        <select id="arahInput">
            <option value="horizontal">Horizontal</option>
            <option value="vertical">Vertikal</option>
        </select>
        <button onclick="tambahSoal()">Tambah Soal</button>
    </div>

    <div id="crossword"></div>

    <script>
        let soalList = [];

        function tambahSoal() {
            const soal = document.getElementById("soalInput").value;
            const jawaban = document.getElementById("jawabanInput").value;
            const arah = document.getElementById("arahInput").value;

            if (soal && jawaban) {
                soalList.push({ soal, jawaban, arah });
                tampilkanTekaTekiSilang();
            }

            document.getElementById("soalInput").value = '';
            document.getElementById("jawabanInput").value = '';
        }

        function tampilkanTekaTekiSilang() {
            const gridSize = 10;
            const grid = [];

          
            for (let i = 0; i < gridSize; i++) {
                grid[i] = [];
                for (let j = 0; j < gridSize; j++) {
                    grid[i][j] = '';
                }
            }

            // Menambahkan soal dan jawaban ke dalam grid
            soalList.forEach((item) => {
                let row = 0;
                let col = 0;
                let placed = false;

                // Mencari posisi yang sesuai untuk menempatkan jawaban
                while (!placed) {
                    if (item.arah === "horizontal") {
                        // Menempatkan secara horizontal
                        for (let i = 0; i < item.jawaban.length; i++) {
                            if (col + i >= gridSize || grid[row][col + i] !== '') {
                                // Jika tidak muat, pindah ke baris berikutnya
                                col = (col + i + 1) % gridSize;
                                if (col === 0) row++;
                                break;
                            }
                            if (i === item.jawaban.length - 1) {
                                // Jika semua huruf berhasil dimasukkan
                                for (let j = 0; j < item.jawaban.length; j++) {
                                    grid[row][col + j] = item.jawaban[j];
                                }
                                placed = true;
                            }
                        }
                    } else if (item.arah === "vertical") {
                        // Menempatkan secara vertikal
                        for (let i = 0; i < item.jawaban.length; i++) {
                            if (row + i >= gridSize || grid[row + i][col] !== '') {
                                // Jika tidak muat, pindah ke kolom berikutnya
                                row = (row + i + 1) % gridSize;
                                if (row === 0) col++;
                                break;
                            }
                            if (i === item.jawaban.length - 1) {
                                // Jika semua huruf berhasil dimasukkan
                                for (let j = 0; j < item.jawaban.length; j++) {
                                    grid[row + j][col] = item.jawaban[j];
                                }
                                placed = true;
                            }
                        }
                    }
                }
            });

           
            let crosswordHTML = '';
            for (let i = 0; i < gridSize; i++) {
                for (let j = 0; j < gridSize; j++) {
                    crosswordHTML += `<input type="text" value="${grid[i][j] || ''}" maxlength="1" />`;
                }
            }

            document.getElementById("crossword").innerHTML = crosswordHTML;
        }
    </script>

</body>
</html>

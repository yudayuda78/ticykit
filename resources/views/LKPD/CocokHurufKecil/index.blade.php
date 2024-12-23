<x-dashboard.app>
    <style>
        .highlight-blue {
            background-color: white;
        }
    </style>
    <div class="pb-6">
        <a href="{{ route('LKPD') }}"
            class="me-2 rounded-full border-2 border-orange-500 px-2 py-1 pl-1 text-sm font-bold text-orange-500">
            <i class="ri-arrow-left-s-line"></i> LKPD
        </a>LKPD Mencocokan Huruf Kecil
        </h3>
        <p class="pt-2 text-sm text-gray-500">Soal-soal tentang pemilihan huruf kecil yang sesuai dengan huruf besar</p>
    </div>
    <form class="rounded-2xl border border-gray-200">
        <div class="px-7 py-5">
            <h3 class="font-bold">Informasi Lembar Kerja</h3>
            <p class="text-sm text-gray-500">Ketikan informasi tentang LKPD Mencocokan Huruf Kecil yang akan dibuat</p>
        </div>
        <hr />
        <div class="space-y-3 p-7">
            <div class="mb-3">
                <x-forms.input id="judul" label="Judul" name="judul" placeholder="Cth: Latihan Soal Hitung Cocok"
                    required />
            </div>
            <button type="button" id="kirimBtn"
                class="w-full rounded-xl bg-orange-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-orange-600 focus:outline-none focus:ring-1 focus:ring-orange-700 sm:w-auto">Buat
                LKPD
            </button>
        </div>
    </form>

    <div class="mt-5 hidden rounded-2xl border border-gray-200" id="resultContainer">
        <div class="flex flex-col gap-3 px-7 py-5 md:flex-row">

            <button
                class="hide w-full rounded-xl border border-orange-500 px-5 py-2.5 text-center text-sm font-medium text-gray-700 hover:bg-orange-200 focus:outline-none focus:ring-1 focus:ring-orange-700 sm:w-auto">Sembunyikan
                Hasil</button>
            <button
                class="download w-full rounded-xl bg-orange-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-orange-600 focus:outline-none focus:ring-1 focus:ring-orange-700 sm:w-auto">
                <i class="ri-download-fill me-1"></i>Download LKPD</button>
        </div>
        <hr />
        <div class="overflow-x-scroll p-7 text-gray-800 md:overflow-x-auto">
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
            <p id="judulOutput" class="judul px-3 py-9 text-center text-2xl font-bold"></p>
            <div class="hurufcontainer"></div>
        </div>
    </div>
    <form method="POST" action="{{ route('LKPD.cocokhurufkecilDownload') }}" style="display: none;">
        @csrf
        <label for="judulInput">Judul:</label>
        <input type="text" name="judulInput" id="judulInput" value="">

        <label for="hurufBesar">Judul:</label>
        <input type="text" name="hurufBesar" id="hurufBesar" value="">

        <label for="hurufKecil">Judul:</label>
        <input type="text" name="hurufKecil" id="hurufKecil" value="">

        <input type="text" name="hidden" id="hidden" value="">
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('resultContainer').style.display = 'none';
        });

        document.getElementById('kirimBtn').addEventListener('click', function() {
            const hurufContainer = document.querySelector('.hurufcontainer');

            // Reset container
            hurufContainer.innerHTML = '';

            // Apply container styles
            hurufContainer.style.width = '100%';
            hurufContainer.style.margin = '0 auto';

            // Create grid container
            const gridContainer = document.createElement('div');
            gridContainer.style.display = 'table';
            gridContainer.style.width = '100%';

            // Create columns
            const leftColumn = document.createElement('div');
            const spacerColumn = document.createElement('div');
            const rightColumn = document.createElement('div');

            // Style columns
            [leftColumn, rightColumn].forEach(column => {
                column.style.display = 'table-cell';
                column.style.width = '42%';
                column.style.verticalAlign = 'center';
            });

            spacerColumn.style.display = 'table-cell';
            spacerColumn.style.width = '16%';
            spacerColumn.style.verticalAlign = 'center';

            const arrayHuruf = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q',
                'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
            ];

            arrayHuruf.forEach((huruf, index) => {
                // Create row
                const row = document.createElement('div');
                row.style.margin = '0';
                row.style.padding = '0';
                row.style.marginBottom = '1.6rem';
                row.style.display = 'flex';
                row.style.alignItems = 'flex-end';

                // Create huruf besar container
                const hurufBesarContainer = document.createElement('div');
                hurufBesarContainer.style.display = 'inline-block';
                hurufBesarContainer.style.position = 'relative';
                hurufBesarContainer.style.bottom = '0.5rem';
                hurufBesarContainer.style.margin = '0';
                hurufBesarContainer.style.padding = '0';

                // Create huruf besar text
                const hurufBesarText = document.createElement('strong');
                hurufBesarText.textContent = `${huruf}=`;
                hurufBesarText.style.fontWeight = 'bold';
                hurufBesarText.style.fontSize = '1.2rem';

                hurufBesarContainer.appendChild(hurufBesarText);
                row.appendChild(hurufBesarContainer);

                // Generate random letters
                const randomHurufLain = [];
                while (randomHurufLain.length < 3) {
                    const hurufAcak = String.fromCharCode(97 + Math.floor(Math.random() * 26));
                    if (!randomHurufLain.includes(hurufAcak) && hurufAcak !== huruf.toLowerCase()) {
                        randomHurufLain.push(hurufAcak);
                    }
                }

                const allHuruf = [...randomHurufLain, huruf.toLowerCase()];

                // Shuffle letters
                for (let i = allHuruf.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [allHuruf[i], allHuruf[j]] = [allHuruf[j], allHuruf[i]];
                }

                // Create and style letter spans
                allHuruf.forEach(hurufKecil => {
                    const span = document.createElement('span');
                    span.textContent = hurufKecil;
                    span.style.display = 'inline-block';
                    span.style.margin = '0 0.7rem';
                    span.style.padding = '0.9rem';
                    span.style.border = '1px solid #000';
                    span.style.borderRadius = '50%';
                    span.style.width = '40px';
                    span.style.height = '40px';
                    span.style.lineHeight = '0px';
                    span.style.textAlign = 'center';
                    span.style.fontSize = '1.2rem';

                    if (hurufKecil === huruf.toLowerCase()) {
                        span.classList.add('highlight-blue');
                        span.dataset.correct = 'true';
                    }

                    row.appendChild(span);
                });

                // Add row to appropriate column based on index
                if (index < 13) {
                    leftColumn.appendChild(row);
                } else {
                    rightColumn.appendChild(row);
                }
            });

            // Assemble the grid
            gridContainer.appendChild(leftColumn);
            gridContainer.appendChild(spacerColumn);
            gridContainer.appendChild(rightColumn);
            hurufContainer.appendChild(gridContainer);

            // Update header
            const judul = document.getElementById('judul');
            const judulOutput = document.getElementById('judulOutput');
            judulOutput.textContent = judul.value;

            // Show results
            document.getElementById('resultContainer').style.display = 'block';
        });

        // Toggle highlight functionality
        let hideResults = true;
        document.querySelector('.hide').addEventListener('click', function() {
            hideResults = !hideResults;
            const spans = document.querySelectorAll('.hurufcontainer span[data-correct="true"]');
            spans.forEach(span => {
                if (hideResults) {
                    span.style.backgroundColor = '';
                } else {
                    span.style.backgroundColor = '#B2B2B2';
                }
            });
        });

        document.querySelector('.download').addEventListener('click', function() {
            const hidden = document.getElementById('hidden');
            const judulInput = document.getElementById('judulInput');
            const hurufBesar = document.getElementById('hurufBesar');
            const hurufKecil = document.getElementById('hurufKecil');

            hidden.value = hideResults;

            const judulOutput = document.getElementById('judulOutput').textContent;
            judulInput.value = judulOutput;

            const hurufBesarArray = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P',
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
            ];
            hurufBesar.value = hurufBesarArray.join(', ');

            const hurufKecilElements = document.querySelectorAll('.hurufcontainer span');
            const hurufKecilArray = Array.from(hurufKecilElements).map(element => element.textContent);
            hurufKecil.value = hurufKecilArray.join(', ');

            judulInput.form.submit();
        });
    </script>
</x-dashboard.app>


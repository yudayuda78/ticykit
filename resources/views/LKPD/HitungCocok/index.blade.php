<x-dashboard.app>
    <div class="pb-6">
        <a href="{{ route('LKPD') }}"
            class="me-2 rounded-full border-2 border-orange-500 px-2 py-1 pl-1 text-sm font-bold text-orange-500">
            <i class="ri-arrow-left-s-line"></i> LKPD
        </a>LKPD Hitung Cocok
        </h3>
        <p class="pt-2 text-sm text-gray-500">Soal-soal tentang konsep dan penerapan operasi pencocokan jumlah item</p>
    </div>
    <form class="rounded-2xl border border-gray-200">
        <div class="px-7 py-5">
            <h3 class="font-bold">Informasi Lembar Kerja</h3>
            <p class="text-sm text-gray-500">Ketikan informasi tentang LKPD Hitung Cocok yang akan dibuat</p>
        </div>
        <hr />
        <div class="space-y-3 p-7">
            <div class="mb-3 grid gap-3 md:grid-cols-2">
                <x-forms.input id="judul" label="Judul" name="judul" placeholder="Cth: Latihan Soal Hitung Cocok"
                    required />
                <x-forms.input type="number" id="jumlahsoal" label="Jumlah Soal" name="jumlahsoal" placeholder="35"
                    required />
            </div>
            <button type="button" id="kirimBtn"
                class="w-full rounded-xl bg-orange-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-orange-600 focus:outline-none focus:ring-1 focus:ring-orange-700 sm:w-auto">Buat
                LKPD
            </button>
        </div>
    </form>

    <form method="POST" action="{{ route('LKPD.hitungcocokDownload') }}" style="display: none;">
        @csrf
        <label for="judulInput">Judul:</label>
        <input type="text" name="judulInput" id="judulInput" value="">

        <label for="soalInput">Soal:</label>
        <input type="text" name="soalInput" id="soalInput" value="">

        <label for="jawabanInput"></label>
        <input type="text" name="jawabanInput" id="jawabanInput" value="">
    </form>

    <div class="mt-5 hidden rounded-2xl border border-gray-200" id="resultContainer">
        <div class="flex flex-col gap-3 px-7 py-5 md:flex-row">
            {{-- <button
                class="hide w-full rounded-xl border border-orange-500 px-5 py-2.5 text-center text-sm font-medium text-gray-700 hover:bg-orange-200 focus:outline-none focus:ring-1 focus:ring-orange-700 sm:w-auto">Sembunyikan
                Hasil</button> --}}
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
            <p class="judul px-3 text-center text-2xl font-bold"></p>
            <div class="soalcontainer"></div>
        </div>
    </div>

    <script>
        let soalData = {
            jumlahGmbr: [],
            jumlahJawaban: []
        };

        document.getElementById('kirimBtn').addEventListener('click', function() {
            const gambarList = [{
                    src: '/img/icon_buah/apple.png',
                    alt: 'Gambar apel'
                },
                {
                    src: 'asset(img/jeruk.webp)',
                    alt: 'Gambar jeruk'
                },
                {
                    src: 'asset(img/semangka.webp)',
                    alt: 'Gambar semangka'
                },
                {
                    src: 'asset(img/pisang.webp)',
                    alt: 'Gambar pisang'
                }
            ];

            const jumlahSoal = parseInt(document.getElementById('jumlahsoal').value);
            const soalContainer = document.querySelector('.soalcontainer');
            soalContainer.innerHTML = '';
            const jumlahGambarPerSoal = [];

            for (let i = 0; i < jumlahSoal; i++) {
                const soalDiv = document.createElement('div');
                soalDiv.className = 'soal';
                soalDiv.textContent = `${i + 1})`;
                const gambar = gambarList[i % gambarList.length];

                const jumlahGambar = Math.floor(Math.random() * 10) + 1;
                jumlahGambarPerSoal.push(jumlahGambar);

                for (let j = 0; j < jumlahGambar; j++) {
                    const img = document.createElement('img');
                    img.src = gambar.src;
                    img.alt = gambar.alt;
                    img.style.marginRight = '5px';
                    soalDiv.appendChild(img);
                }

                soalContainer.appendChild(soalDiv);
            }

            soalData.jumlahGmbr = [...jumlahGambarPerSoal];

            let jumlahJawaban = [...jumlahGambarPerSoal];
            for (let i = jumlahJawaban.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [jumlahJawaban[i], jumlahJawaban[j]] = [jumlahJawaban[j], jumlahJawaban[i]];
            }

            soalData.jumlahJawaban = [...jumlahJawaban];

            document.getElementById('judulOutput').textContent = 'Judul: ' + document.getElementById('judul').value;

            // Show the result container
            document.getElementById('resultContainer').classList.remove('hidden');
        });

        document.querySelector('.download').addEventListener('click', function() {
            const judulInput = document.getElementById('judulInput');
            const soalInput = document.getElementById('soalInput');
            const jawabanInput = document.getElementById('jawabanInput');

            judulInput.value = document.getElementById('judul').value;
            soalInput.value = JSON.stringify(soalData.jumlahGmbr);
            jawabanInput.value = JSON.stringify(soalData.jumlahJawaban);

            judulInput.form.submit();
        });
        document.getElementById('kirimBtn').addEventListener('click', function() {
            const gambarList = [{
                    src: '/img/icon_buah/apple.png',
                    alt: 'Gambar apel'
                },
                {
                    src: '/img/icon_buah/orange.png',
                    alt: 'Gambar jeruk'
                },
                {
                    src: '/img/icon_buah/watermelon.png',
                    alt: 'Gambar semangka'
                },
                {
                    src: '/img/icon_buah/bananas.png',
                    alt: 'Gambar pisang'
                },
                {
                    src: '/img/icon_buah/grapes.png',
                    alt: 'Gambar anggur'
                }
            ];

            const jumlahSoal = parseInt(document.getElementById('jumlahsoal').value);
            const soalContainer = document.querySelector('.soalcontainer');
            soalContainer.innerHTML = '';

            let jumlahGambarPerSoal = [];
            let jumlahJawaban = [];

            // Generate questions and answers
            for (let i = 0; i < jumlahSoal; i++) {
                const jumlahGambar = Math.floor(Math.random() * 10) + 1;
                jumlahGambarPerSoal.push(jumlahGambar);
            }
            jumlahJawaban = [...jumlahGambarPerSoal].sort(() => Math.random() - 0.5);

            soalData.jumlahGmbr = jumlahGambarPerSoal;
            soalData.jumlahJawaban = jumlahJawaban;

            // Dynamically generate the table
            let tableHTML = `

        <div style="text-align: center; font-size: 25px; margin-top: 30px; margin-bottom: 30px; text-transform: capitalize;">
            <strong>${document.getElementById('judul').value}</strong>
        </div>

        <table style="width: 100%; margin-top: 10px;">`;

            jumlahGambarPerSoal.forEach((item, index) => {
                tableHTML +=
                    `
            <tr style="width: 100%;">
                <td class="iteration-number" style="text-align: center; width: 5%; padding: 0; padding-bottom: 1.5rem;">
                    ${index + 1}).
                </td>
                <td class="block md:flex w-auto md:w-[450px]" style="padding: 0; white-space: nowrap; padding-bottom: 1.5rem;">`;

                for (let i = 0; i < item; i++) {
                    const image = gambarList[index % gambarList.length];
                    tableHTML +=
                        `<img class="fruit-img" src="${image.src}" alt="${image.alt}" style="width: 30px; margin-right: 5px;">`;
                }

                tableHTML += `
                </td>
                <td style="width: 60%; text-align: left; padding: 0; padding-bottom: 1.5rem;">
                    <div class="circle"><i class="ri-circle-line"></i></div>
                </td>
                <td style="padding: 0; margin: 0; width: 1%; text-align: right; padding-bottom: 1.5rem;">
                    <div class="circle"><i class="ri-circle-line pr-2 md:pr-20"></i></div>
                </td>
                <td style="padding: 0; width: 3%; text-align: center; font-weight: bold; padding-bottom: 1.5rem;">
                    ${jumlahJawaban[index]}
                </td>
            </tr>`;
            });

            tableHTML += `</table>`;

            // Inject the generated table into the container
            soalContainer.innerHTML = tableHTML;

            // Show the result container
            document.getElementById('resultContainer').classList.remove('hidden');
        });
    </script>
</x-dashboard.app>


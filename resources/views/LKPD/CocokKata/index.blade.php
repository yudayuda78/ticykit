<x-dashboard.app>
    <div class="pb-6">
        <a href="{{ route('LKPD') }}"
            class="me-2 rounded-full border-2 border-orange-500 px-2 py-1 pl-1 text-sm font-bold text-orange-500">
            <i class="ri-arrow-left-s-line"></i> LKPD
        </a>LKPD Cocok Kata
        </h3>
        <p class="pt-2 text-sm text-gray-500">Soal-soal tentang konsep dan penerapan operasi penjumlahan</p>
    </div>
    <div class="rounded-2xl border border-gray-200">
        <div class="px-7 py-5">
            <h3 class="font-bold">Informasi Lembar Kerja</h3>
            <p class="text-sm text-gray-500">Membantu siswa dalam memahami dan menguasai konsep tertentu melalui
                aktivitas mencocokkan kata-kata yang sesuai</p>
        </div>
        <hr />
        <div class="space-y-3 p-7">
            <x-forms.input id="judul" label="Judul" name="judul" placeholder="Cth: Latihan Soal Penjumlahan"
                required />
            <div class="mb-6" id="soalContainer">
                <div class="mb-3 grid gap-3 md:grid-cols-2">
                    <x-forms.input type="text" name="soal" id="soal" label="Soal Pertama"
                        placeholder="Cth: Warna" required />
                    <x-forms.input type="text" name="jawaban" id="jawaban" label="Soal Kedua"
                        placeholder="Cth: Biru" required />
                </div>
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
    <form method="POST" action="{{ route('LKPD.cocokkatadDownload') }}" style="display: none;">
        @csrf
        <label for="judulInput">Judul:</label>
        <input type="text" name="judulInput" id="judulInput" value="">

        <label for="soalInput">Soal:</label>
        <input type="text" name="soalInput" id="soalInput" value="">

        <label for="jawabanInput">Jawaban:</label>
        <input type="text" name="jawabanInput" id="jawabanInput" value="">

        <label for="urutanInput">Jawaban:</label>
        <input type="text" name="urutanInput" id="urutanInput" value="">
    </form>

    <div class="mt-5 rounded-2xl border border-gray-200" id="resultContainer" style="display: none;">
        <div class="flex flex-col gap-3 px-7 py-5 md:flex-row">
            <button
                class="hide w-full rounded-xl border border-orange-500 px-5 py-2.5 text-center text-sm font-medium text-gray-700 hover:bg-orange-200 focus:outline-none focus:ring-1 focus:ring-orange-700 sm:w-auto">
                <i class="ri-eye-line -ms-1 me-1 text-orange-500"></i> Sembunyikan
                Hasil</button>
            <button
                class="download w-full rounded-xl bg-orange-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-orange-600 focus:outline-none focus:ring-1 focus:ring-orange-700 sm:w-auto">
                <i class="ri-download-fill me-1"></i> Download LKPD</button>
        </div>
        <hr />
        <div class="p-7 text-gray-800">
            <form method="POST" action="{{ route('LKPD.cocokkatadDownload') }}" style="display: none;">
                @csrf
                <label for="judulInput">Judul:</label>
                <input type="text" name="judulInput" id="judulInput" value="">

                <label for="soalInput">Soal:</label>
                <input type="text" name="soalInput" id="soalInput" value="">

                <label for="jawabanInput">Jawaban:</label>
                <input type="text" name="jawabanInput" id="jawabanInput" value="">

                <label for="urutanInput">Jawaban:</label>
                <input type="text" name="urutanInput" id="urutanInput" value="">
            </form>

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
            <p id="judulOutput" class="px-3 py-8 text-center text-2xl font-bold"></p>
            <div class="grid grid-cols-2 gap-4 text-base md:gap-16">
                <div class="space-y-2" id="soalOutput"></div>
                <div class="space-y-2" id="jawabanOutput"></div>
            </div>
            <p id="urutanOutput"></p>
        </div>
    </div>

    <script>
        const soal = document.getElementById('soal');
        const jawaban = document.getElementById('jawaban');

        soal.addEventListener('input', () => {
            jawaban.value = soal.value;
        });

        document.getElementById('tambahsoal').addEventListener('click', function() {
            let newSoalDiv = document.createElement('div'); // Container for the soal and jawaban sections
            newSoalDiv.classList.add('grid', 'gap-3', 'pb-2', 'md:grid-cols-2');

            // Soal Section
            let soalContainer = document.createElement('div');
            soalContainer.classList.add('mb-2');

            let newLabelSoal = document.createElement('label');
            newLabelSoal.classList.add('mb-2', 'block', 'text-sm', 'font-medium', 'text-gray-900');
            newLabelSoal.textContent = 'Soal Pertama';
            newLabelSoal.setAttribute('for', 'soal');

            let newInputSoal = document.createElement('input');
            newInputSoal.type = 'text';
            newInputSoal.name = 'soal';
            newInputSoal.classList.add('block', 'w-full', 'rounded-lg', 'border', 'border-gray-300', 'bg-gray-50',
                'p-2.5', 'text-sm', 'text-gray-900', 'focus:border-blue-500', 'focus:ring-blue-500');
            newInputSoal.placeholder = 'Cth: Hewan';
            newInputSoal.required = true;

            soalContainer.appendChild(newLabelSoal);
            soalContainer.appendChild(newInputSoal);

            // Jawaban Section
            let jawabanContainer = document.createElement('div');
            // jawabanContainer.classList.add('mt-4');

            let newLabelJawaban = document.createElement('label');
            newLabelJawaban.classList.add('mb-2', 'block', 'text-sm', 'font-medium', 'text-gray-900');
            newLabelJawaban.textContent = 'Soal Kedua';
            newLabelJawaban.setAttribute('for', 'jawaban');

            let newInputJawaban = document.createElement('input');
            newInputJawaban.type = 'text';
            newInputJawaban.name = 'jawaban';
            newInputJawaban.setAttribute('readonly', true);
            newInputJawaban.classList.add('block', 'w-full', 'rounded-lg', 'border', 'border-gray-300',
                'bg-gray-50', 'p-2.5', 'text-sm', 'text-gray-900', 'focus:border-blue-500',
                'focus:ring-blue-500');
            newInputJawaban.placeholder = 'Cth: Kucing';
            newInputJawaban.required = true;

            newInputSoal.addEventListener('input', function() {
                newInputJawaban.value = newInputSoal.value;
            });

            jawabanContainer.appendChild(newLabelJawaban);
            jawabanContainer.appendChild(newInputJawaban);

            // Append Sections to the Main Container
            newSoalDiv.appendChild(soalContainer);
            newSoalDiv.appendChild(jawabanContainer);

            // Append the Main Container to the Parent Element
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

        document.getElementById('kirimBtn').addEventListener('click', function() {
            // Show the result container when kirimBtn is clicked
            document.getElementById('resultContainer').style.display = 'block';

            let judulInput = document.getElementById('judul').value;
            document.getElementById('judulOutput').textContent = judulInput;

            // let soalOutput = document.getElementById('soalOutput');
            // soalOutput.innerHTML = "Soal :";

            // let jawabanOutput = document.getElementById('jawabanOutput');
            // jawabanOutput.innerHTML = "Jawaban :";

            let urutanOutput = document.getElementById('urutanOutput');
            urutanOutput.innerHTML = "";

            let soalInputs = Array.from(document.querySelectorAll('#soalContainer input[name="soal"]')).map(input =>
                input.value);
            let jawabanInputs = Array.from(document.querySelectorAll('#soalContainer input[name="jawaban"]')).map(
                input => input.value);

            soalInputs.forEach((soal, index) => {
                soalOutput.innerHTML +=
                    `<div class="flex justify-between"><p><b>${index + 1}).</b> ${soal}</p><i class="ri-checkbox-blank-circle-line"></i></div>`;
            });

            let jawabanAcak = jawabanInputs
                .map((value, index) => ({
                    value,
                    originalIndex: index
                }))
                .sort(() => Math.random() - 0.5);

            jawabanAcak.forEach((jawaban, index) => {
                jawabanOutput.innerHTML += hideResults ?
                    `<div class="w-full"><i class="ri-checkbox-blank-circle-line"></i> <span><b>${index + 1}).</b> ${jawaban.value}</span></div>` :
                    `<div class="w-full"><i class="ri-checkbox-blank-circle-line me-2"></i> <span><b>${index + 1}).</b> ${jawaban.value}</span></div>`;
            });

            if (!hideResults) {
                jawabanAcak.forEach(jawaban => {
                    urutanOutput.innerHTML += `${soalInputs[jawaban.originalIndex]}, `;
                });
            }
        });

        let hideResults = false;
        document.querySelector('.hide').addEventListener('click', function() {
            hideResults = !hideResults;

            const urutanOutput = document.getElementById('urutanOutput');
            if (hideResults) {
                urutanOutput.style.display = 'none';
            } else {
                urutanOutput.style.display = 'block';
            }
        });

        document.querySelector('.download').addEventListener('click', function() {
            const judulInput = document.getElementById('judulInput');
            const soalInput = document.getElementById('soalInput');
            const jawabanInput = document.getElementById('jawabanInput');
            const urutanInput = document.getElementById('urutanInput');

            const judulOutput = document.getElementById('judulOutput').textContent;
            const soalOutput = document.getElementById('soalOutput').textContent;
            const jawabanOutput = document.getElementById('jawabanOutput').textContent;
            const urutanOutput = document.getElementById('urutanOutput').textContent;

            judulInput.value = judulOutput;
            soalInput.value = soalOutput;
            jawabanInput.value = jawabanOutput;
            urutanInput.value = hideResults ? "" : urutanOutput;

            judulInput.form.submit();
        });
    </script>
</x-dashboard.app>


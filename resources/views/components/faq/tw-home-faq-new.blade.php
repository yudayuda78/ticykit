@props(['text' => null])
<div id="faq" class="mx-auto mb-20 max-w-[90%] md:max-w-main">
    @if ($text)
        <h2 class="mb-2.5 text-xl font-semibold md:text-2xl">{{ $text }}</h2>
    @else
        <div class="my-8 flex flex-col items-center justify-between gap-3 md:my-12 md:flex-row" data-aos="flip-up"
            data-aos-duration="950" data-aos-once="true">
            <h2 class="max-w-[420px] text-4xl font-semibold md:text-5xl">Frequently Asked Question</h2>
            <p class="max-w-[461px] text-base text-[#64748B] md:text-lg">Jelajahi Ragam Unggulan Produk dan Layanan Kami
                yang
                sudah kami siapkan untuk Pengembangan Profesional Guru</p>
        </div>
    @endif
    <div id="accordion-collapse" data-accordion="collapse" data-aos="fade-up" data-aos-duration="650"
        data-aos-once="true" data-active-classes="bg-ticykit-bg-blue text-white focus:ring-1 focus:ring-gray-400"
        data-inactive-classes="text-black hover:text-white hover:bg-ticykit-bg-blue focus:ring-1 focus:ring-ticykit-bg-blue">
        <h2 id="accordion-collapse-heading-1">
            <button type="button"
                class="flex w-full items-center justify-between gap-3 rounded-t-xl border border-b-0 border-gray-200 p-5 text-lg font-medium rtl:text-right"
                data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                aria-controls="accordion-collapse-body-1">
                <span class="text-left"><i class="ri-question-fill mr-3"></i>Bagaimana link zoom, presensi dan post test
                    dibagikan?</span>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
            <div class="border border-b-0 border-gray-200 p-5">
                <p class="mb-2 text-lg text-gray-500">Link Zoom dibagikan pada grup telegram 5 menit sebelum kegiatan
                    dimulai, link presensi dan posttest dibagikan setelah kegiatan selesai</p>
            </div>
        </div>
        <h2 id="accordion-collapse-heading-2">
            <button type="button"
                class="flex w-full items-center justify-between gap-3 border border-b-0 border-gray-200 p-5 text-lg font-medium rtl:text-right"
                data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                aria-controls="accordion-collapse-body-2">
                <span class="text-left"><i class="ri-question-fill mr-3"></i>Bagaimana alur pembagian sertifikat?</span>

            </button>
        </h2>
        <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
            <div class="border border-b-0 border-gray-200 p-5">
                <p class="mb-2 text-lg text-gray-500">Alur pembagian sertifikat sudah tertera dalam web belajar era
                    digital yang dibagikan dalam grup kegiatan, apabila mengalami kendala silahkan menghubungi admin</p>
            </div>
        </div>
        <h2 id="accordion-collapse-heading-3">
            <button type="button"
                class="flex w-full items-center justify-between gap-3 border border-b-0 border-gray-200 p-5 text-lg font-medium rtl:text-right"
                data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                aria-controls="accordion-collapse-body-3">
                <span class="text-left"><i class="ri-question-fill mr-3"></i>Yang sudah berada dalam grup apakah perlu
                    daftar lagi?</span>

            </button>
        </h2>
        <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
            <div class="border border-b-0 border-gray-200 p-5">
                <p class="mb-2 text-lg text-gray-500">Silahkan untuk melakukan regristrasi agar terdaftar sebagai
                    peserta</p>
            </div>
        </div>
        <h2 id="accordion-collapse-heading-4">
            <button type="button"
                class="flex w-full items-center justify-between gap-3 border border-b-0 border-gray-200 p-5 text-lg font-medium rtl:text-right"
                data-accordion-target="#accordion-collapse-body-4" aria-expanded="false"
                aria-controls="accordion-collapse-body-4">
                <span class="text-left"><i class="ri-question-fill mr-3"></i>Apakah harus bergabung lewat zoom saat
                    kegiatan?</span>

            </button>
        </h2>
        <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-4">
            <div class="border border-b-0 border-gray-200 p-5">
                <p class="mb-2 text-lg text-gray-500">Karena kuota zoom terbatas, peserta dipersilahkan untuk bergabung
                    melalui youtube.</p>
            </div>
        </div>
        <h2 id="accordion-collapse-heading-5">
            <button type="button"
                class="flex w-full items-center justify-between gap-3 border border-b-0 border-gray-200 p-5 text-lg font-medium rtl:text-right"
                data-accordion-target="#accordion-collapse-body-5" aria-expanded="false"
                aria-controls="accordion-collapse-body-5">
                <span class="text-left"><i class="ri-question-fill mr-3"></i>Apakah presensi dan posttest boleh
                    menyusul?</span>

            </button>
        </h2>
        <div id="accordion-collapse-body-5" class="hidden" aria-labelledby="accordion-collapse-heading-5">
            <div class="border border-b-0 border-gray-200 p-5">
                <p class="mb-2 text-lg text-gray-500">Boleh, batas pengerjaan posttest H+1 setelah posttest dibagikan
                </p>
            </div>
        </div>
        <h2 id="accordion-collapse-heading-6">
            <button type="button"
                class="flex w-full items-center justify-between gap-3 border border-gray-200 p-5 text-lg font-medium rtl:text-right"
                data-accordion-target="#accordion-collapse-body-6" aria-expanded="false"
                aria-controls="accordion-collapse-body-6">
                <span class="text-left"><i class="ri-question-fill mr-3"></i>Kenapa saya tidak bisa masuk grup?</span>

            </button>
        </h2>
        <div id="accordion-collapse-body-6" class="hidden" aria-labelledby="accordion-collapse-heading-6">
            <div class="rounded-b-xl border border-gray-200 p-5">
                <p class="mb-2 text-lg text-gray-500">Karena pendaftar yang cukup banyak sehigga beberapa grup whatsapp
                    penuh, silahkan untuk bergabung di telegram agar tetap mendapat informasi.</p>
            </div>
        </div>
    </div>
</div>

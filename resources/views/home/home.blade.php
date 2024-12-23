@extends('home.home-layouts.home-main-tw')
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@section('container')
    @include('home.home-layouts.tw-home-navbar')
    @include('home.home-layouts.tw-home-navbar-sticky')
    <div class="my-7 md:my-16" data-aos="fade-up" data-aos-duration="650" data-aos-once="true">
        <div class="mx-auto flex max-w-[90%] justify-between md:max-w-main">
            <div class="flex w-full flex-col-reverse justify-between md:w-[880px] md:flex-row">
                <div class="static flex h-fit flex-col justify-between gap-3.5 md:absolute md:h-[473px] md:gap-0">
                    <h1 class="mt-4 max-w-[475px] text-4xl leading-[1.1] text-slate-800 md:-mt-2 md:text-[63px]">Pengembangan
                        <span class="font-bold text-ticykit-bg-blue">Profesional</span> Guru
                    </h1>
                    <p class="max-w-none text-sm text-ticykit-secondary md:max-w-[260px] md:text-base">
                        Upgrade soft skill dan dapatkan sertifikat resmi dari tim Belajar Era Digital dengan mengikuti
                        event diklat nasional yang bisa kamu akses pada link di bawah ini
                    </p>
                    <a href="/event"
                        class="mt-1 flex w-fit items-center gap-2 rounded-full border border-slate-300 p-1 transition duration-150 hover:bg-blue-100 md:mt-0">
                        <img src="/img/ui/outicon2.svg">
                        <p class="me-2 text-[13px] font-semibold">Lihat Event</p>
                    </a>
                    <p class="hidden max-w-[260px] text-ticykit-secondary md:block">
                        Punya Pertanyaan? <a href="#faq" class="font-bold text-ticykit-bg-blue hover:text-blue-800">Cek
                            FAQ</a>
                    </p>
                </div>
                <div></div>
                <div class="relative">
                    <img class="absolute" src="/img/ui/hero-new2.png"
                        class="bg-cover bg-center md:bg-[url('/img/ui/hero-bg.svg')]">
                    <img class="hidden md:block" src="/img/ui/hero-bg.svg">
                    <img class="block md:hidden" src="/img/ui/hero-bg-mobile.svg">
                    <div class="absolute left-3.5 top-16 flex flex-col gap-2 md:hidden">
                        <div class="flex w-[120px] items-center gap-1 rounded-lg border border-ticykit-bg-blue bg-ticykit-bg-blue/40 p-2 py-2 backdrop-blur"
                            data-aos="flip-up" data-aos-duration="950" data-aos-once="true">
                            <div class="flex aspect-square h-4 w-4 items-center justify-center rounded-full bg-white">
                                <i class="ri-heart-line pt-0.5 text-[8px] leading-none text-blue-300"></i>
                            </div>
                            <span class="me-1 text-xs text-white">Berkembang</span>
                        </div>
                        <div class="flex w-[120px] items-center gap-1 rounded-lg border border-[#F8811D] bg-[#F8811D]/40 p-2 py-2 backdrop-blur"
                            data-aos="flip-up" data-aos-duration="950" data-aos-once="true">
                            <div class="flex aspect-square h-4 w-4 items-center justify-center rounded-full bg-white">
                                <i class="ri-flashlight-fill pt-0.5 text-[8px] leading-none text-orange-400"></i>
                            </div>
                            <span class="me-1 text-xs text-white">Bertumbuh</span>
                        </div>
                        <div class="flex w-[120px] items-center gap-1 rounded-lg border border-[#74C9A9] bg-[#74C9A9]/40 p-2 py-2 backdrop-blur"
                            data-aos="flip-up" data-aos-duration="950" data-aos-once="true">
                            <div class="flex aspect-square h-4 w-4 items-center justify-center rounded-full bg-white">
                                <i class="ri-team-line pt-0.5 text-[8px] leading-none text-[#74C9A9]"></i>
                            </div>
                            <span class="me-1 text-xs text-white">Berdampak</span>
                        </div>
                    </div>
                    <div class="absolute left-36 top-64 hidden w-[142px] items-center gap-1 rounded-xl border border-ticykit-bg-blue bg-ticykit-bg-blue/40 p-2 py-2.5 backdrop-blur md:flex"
                        data-aos="flip-up" data-aos-duration="950" data-aos-once="true">
                        <div class="flex aspect-square h-6 w-6 items-center justify-center rounded-full bg-white">
                            <i class="ri-heart-line text-xs leading-none text-blue-300"></i>
                        </div>
                        <span class="me-1 text-sm text-white">Berkembang</span>
                    </div>
                    <div class="absolute right-10 top-48 hidden w-[142px] items-center gap-1 rounded-xl border border-[#F8811D] bg-[#F8811D]/40 p-2 py-2.5 backdrop-blur md:flex"
                        data-aos="flip-up" data-aos-duration="950" data-aos-once="true">
                        <div class="flex aspect-square h-6 w-6 items-center justify-center rounded-full bg-white">
                            <i class="ri-flashlight-fill text-xs leading-none text-orange-400"></i>
                        </div>
                        <span class="me-1 text-sm text-white">Bertumbuh</span>
                    </div>
                    <div class="absolute bottom-24 right-20 hidden w-[142px] items-center gap-1 rounded-xl border border-[#74C9A9] bg-[#74C9A9]/40 p-2 py-2.5 backdrop-blur md:flex"
                        data-aos="flip-up" data-aos-duration="950" data-aos-once="true">
                        <div class="flex aspect-square h-6 w-6 items-center justify-center rounded-full bg-white">
                            <i class="ri-team-line text-xs leading-none text-[#74C9A9]"></i>
                        </div>
                        <span class="me-1 text-sm text-white">Berdampak</span>
                    </div>
                    <div
                        class="absolute -left-5 bottom-2 flex scale-75 items-center gap-1 md:bottom-8 md:left-4 md:scale-100">
                        <div class="flex -space-x-4 rtl:space-x-reverse">
                            <img class="h-10 w-10 rounded-full border-2 border-white dark:border-gray-800"
                                src="/img/ui/testi1.jpg">
                            <img class="h-10 w-10 rounded-full border-2 border-white dark:border-gray-800"
                                src="/img/ui/testi2.jpg">
                            <img class="h-10 w-10 rounded-full border-2 border-white dark:border-gray-800"
                                src="/img/ui/testi3.jpg">
                        </div>
                        <p class="rounded-md bg-[#DDE9F8]/25 p-1 pe-2 text-xs backdrop-blur">Dan ratusan ribu guru
                            lainnya!</p>
                    </div>
                </div>
            </div>
            <div class="hidden h-[473px] flex-col justify-between md:flex">
                <div class="relative">
                    <img src="/img/ui/tablet-in-hand.jpg" class="w-[278px] rounded-3xl">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <a href="https://www.youtube.com/watch?v=UDgmAATB0GA" target="_blank">
                            <img src="/img/ui/play-icon.svg"
                                class="w-12 rounded-full bg-ticykit-bg-blue bg-opacity-65 p-3 transition duration-150 hover:bg-blue-800">
                        </a>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <a href="https://www.youtube.com/watch?v=UDgmAATB0GA" target="_blank">
                        <img src="/img/ui/play-icon.svg"
                            class="rounded-full bg-ticykit-bg-blue p-7 transition duration-150 hover:bg-blue-800">
                    </a>
                    <div class="max-w-[170px]">
                        <p class="text-[15px] font-semibold">Profil Belajar Era Digital</p>
                        <p class="text-[11px] text-ticykit-secondary">Ayo kenalan dengan tim Belajar Era Digital dengan
                            menonton video Profil
                            berikut ini</p>
                    </div>
                </div>
            </div>
        </div>
        <p class="mt-7 hidden text-center text-[32px] md:block" data-aos="fade-up" data-aos-duration="850"
            data-aos-once="true" data-aos-anchor="html">Lebih dari <b>500,000 Guru</b> sudah berpartisipasi!</p>
    </div>
    @include('home.home-layouts.tw-home-layanan')
    @include('home.home-layouts.tw-home-pencapaian')
    @include('home.home-layouts.tw-home-benefit')
    @include('home.home-layouts.tw-home-testimonial')
    <x-faq.tw-home-faq-new />
    @include('home.home-layouts.tw-home-footer')

    <div id="alert-3"
        class="fixed bottom-5 right-5 flex items-center rounded-xl rounded-br-none bg-[#085FBF] p-4 text-white shadow-md md:bottom-10 md:right-10"
        role="alert">
        <a href="https://linktr.ee/adminbed" target="_blank" rel="noopener noreferrer" class="text-sm font-medium">
            <i class="ri-whatsapp-fill me-1 rounded-full bg-[#196ECD] p-2"></i>
            <span>Chat Admin</span>
        </a>
        <button type="button"
            class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-[#085FBF] p-1 text-[#5898e2] hover:bg-[#085FBF] focus:ring-2 focus:ring-green-400"
            data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke- linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
@endsection

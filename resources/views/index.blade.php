@php
    $isi = $isiContent->take(3);
    $jumlahisi = $fullContent -> count();
@endphp

@extends('home.home-layouts.home-main-tw')
@section('container')
    <x-ticykit.navbar />
    <x-ticykit.hero />
    <x-ticykit.sponsor />
    <x-ticykit.home-kategori />

    <div class="mx-auto mb-6 mt-10 flex max-w-[90%] items-center justify-between md:max-w-main">
        <h2 class="text-2xl font-bold">Koleksi Media <br>Pembelajaran</h2>
        <p class="text-[#64748B] font-medium md:block hidden max-w-[497px]">Kenapa TicyKit adalah platform pendidikan pilihan pendidik di seluruh Indonesia?</p>
        {{-- <x-ticykit.btn.btn-primary link="{{ route('ticykit.worksheet') }}" text="Selengkapnya" /> --}}
    </div>


    <div class="mx-auto flex max-w-[90%] md:max-w-main flex flex-col gap-14 md:gap-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20">
            <div class="flex flex-col gap-4">
                <div class="flex rounded-lg justify-center md:justify-start">
                    {{-- <a href="/ticykit/worksheet/{{ $isi[0]->slug }}" class="hover:scale-110 ease-in-out duration-500">
                        <img class=" object-cover h-full w-full max-w-72" src="{{ asset('img/' . $isi[0]->image) }}" alt="">
                    </a> --}}
                    <div class="flex flex-col w-80 md:block hidden pt-5">
                        <div class="hover:scale-110 ease-in-out duration-500">
                            {{-- <a href="/ticykit/worksheet/{{ $isi[1]->slug }}" >
                                <img class="object-cover h-[178px] w-full" src="{{ asset('img/' . $isi[1]->image) }}" alt="">
                            </a> --}}
                        </div>
                        <div class="hover:scale-110 ease-in-out duration-500">
                            {{-- <a href="/ticykit/worksheet/{{ $isi[2]->slug }}" class="hover:scale-110">
                                <img class="object-cover h-[178px] w-full" src="{{ asset('img/' . $isi[2]->image) }}" alt="">
                            </a> --}}
                            <div class="relative left-[132px] -top-24">
                                <div class="w-10 absolute">
                                    {{-- <x-ticykit.btn.btn-primary link="{{ route('ticykit.worksheet', $isi[2]->slug) }}" icon="ri-external-link-fill"/> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center ">
                    <div>
                        <h3 class="text-xl font-semibold">Worksheet</h3>
                        <p class="text-sm text-[#64748B]"><span>{{ $jumlahisi }}</span> Items</p>
                    </div>
                    {{-- <x-ticykit.btn.btn-primary link="{{ route('ticykit.worksheet') }}" icon="ri-external-link-fill" text="Lihat" /> --}}
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <div class="flex rounded-lg justify-center md:justify-start">
                    {{-- <a href="/ticykit/ebook/{{ $isi[0]->slug }}" class="hover:scale-110 ease-in-out duration-500">
                        <img class="object-cover h-full w-full max-w-72" src="{{ asset('img/' . $isi[0]->image) }}" alt="">
                    </a> --}}
                    <div class="flex flex-col w-80 md:block hidden pt-5">
                        <div class="hover:scale-110 z-999 ease-in-out duration-500">
                            {{-- <a href="/ticykit/ebook/{{ $isi[1]->slug }}" >
                                <img class="object-cover h-[178px] w-full" src="{{ asset('img/' . $isi[1]->image) }}" alt="">
                            </a> --}}
                        </div>
                        <div class="hover:scale-110 ease-in-out duration-500">
                            {{-- <a href="/ticykit/ebook/{{ $isi[2]->slug }}" class="hover:scale-110">
                                <img class="object-cover h-[178px] w-full" src="{{ asset('img/' . $isi[2]->image) }}" alt="">
                            </a> --}}
                            <div class="relative left-[132px] -top-24">
                                <div class="w-10 absolute">
                                    {{-- <x-ticykit.btn.btn-primary link="{{ route('ticykit.worksheet', $isi[2]->slug) }}" icon="ri-external-link-fill"/> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center ">
                    <div>
                        <h3 class="text-xl font-semibold">Ebook Pendidikan</h3>
                        <p class="text-sm text-[#64748B]"><span>{{ $jumlahisi }}</span> Items</p>
                    </div>
                    {{-- <x-ticykit.btn.btn-primary link="{{ route('ticykit.ebook') }}" icon="ri-external-link-fill" text="Lihat" /> --}}
                </div>
            </div>
        </div>
        <div class="w-full bg-[#F2F2F2] rounded-2xl flex justify-between">
            <div class="p-9 md:p-16 justify-center flex w-[700px]">
                <div class="flex-col gap-2 flex">
                    <h6 class="text-sm font-medium bg-[#FCC597] text-center rounded-md w-12 py-1">Baru!</h6>
                    <h1 class="text-3xl md:text-4xl">Modul Ajar & ATP <br> <span class="font-bold">Generator</span></h1>
                    <p class="text-[#64748B] w-none md:w-10/12 ">Buat modul ajar dan ATP berkualitas yang sesuai dengan tingkat pendidikan dan kelas hanya dengan beberapa klik saja!</p>
                    <div class="w-20">
                        {{-- <x-ticykit.btn.btn-primary link="{{ route('modulajar.index') }}" icon="ri-external-link-fill" text="Lihat" /> --}}
                    </div>
                </div>
            </div>
            <div class="mt-5 pr-20 md:block hidden">
                <img class="w-full h-full" src="/img/ticykit/generate.png" alt="">
            </div>
        </div>
    </div>
    {{-- <div class="mx-auto grid max-w-[90%] grid-cols-1 justify-between gap-7 md:max-w-main md:grid-cols-3">
        @foreach ($isiContent as $isi)
            <div class="w-full">
                <a href="/ticykit/worksheet/{{ $isi->slug }}">
                    <div
                        class="flex flex-col items-center w-full p-2 mb-4 border rounded-xl border-ticykit-bg-border bg-ticykit-bg">
                        <img class="h-[260px]" src="{{ asset('img/' . $isi->image) }}">
                    </div>
                </a>
                <a href="/ticykit/worksheet/{{ $isi->slug }}" class="text-lg font-bold capitalize">{{ $isi->title }}</a>
                <p class="text-sm text-ticykit-secondary">Worksheet</p>
            </div>
        @endforeach
    </div> --}}
    <x-ticykit.selling-point />

    @include('home.home-layouts.tw-home-footer')
@endsection

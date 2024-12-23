@extends('home.home-layouts.home-main-tw')
@section('container')
    <x-dashboard.sidebar />
    <div class="flex min-h-screen flex-col px-5 pt-6 sm:ml-[410px] md:px-10">
        <div class="flex items-center justify-between">
            <img src="/img/ui/navlogo-small.png" class="me-5 block w-9 flex-shrink-0 sm:hidden">
            <button data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar"
                aria-controls="cta-button-sidebar" type="button"
                class="ms-3 mt-2 inline-flex aspect-square h-11 items-center justify-center rounded-lg bg-gray-50 px-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 sm:hidden">
                <span class="sr-only">Open sidebar</span>
                <i class="ri-menu-4-line me-1.5 text-2xl text-orange-500"></i>
                <span class="font-bold text-gray-700">Menu</span>
            </button>
        </div>
        <div class="mt-5 flex items-center gap-4 pb-7 md:mt-0">
            <img src="/img/ui/navlogo.png" class="me-5 hidden w-[146px] flex-shrink-0 sm:block">
            <form class="flex flex-1 items-center">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-5">
                        <i class="ri-menu-search-line md:ri-search-2-line text-2xl text-gray-500"></i>
                    </div>
                    <input type="text" id="simple-search"
                        class="block w-full rounded-full bg-gray-50 p-3.5 ps-14 text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Cari media..." />
                </div>
                <button type="submit"
                    class="ms-2 rounded-full border border-orange-500 bg-orange-500 px-4 py-3.5 font-medium text-white hover:bg-orange-600 focus:outline-none focus:ring-4 focus:ring-blue-300 md:px-7">
                    <span class="hidden md:block">Search</span>
                    <i class="ri-search-2-line block px-0.5 md:hidden"></i>
                </button>
            </form>
        </div>
        <div class="mb-6 flex-grow">
            {{ $slot }}
        </div>
        <x-dashboard.footer />
    </div>
@endsection


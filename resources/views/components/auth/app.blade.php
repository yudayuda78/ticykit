@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="flex">
        <div
            class="my-auto flex h-screen w-[650px] flex-col justify-between gap-8 bg-white bg-gradient-to-t from-orange-50 via-white to-white p-5 md:gap-0 md:bg-none md:p-10">
            <a href="{{ route('dashboard') }}" class="mt-5 flex justify-center md:mt-0 md:block">
                <img src="/img/ui/navlogo.png" class="h-10 w-fit">
            </a>
            {{ $slot }}
        </div>
        <div class="hidden w-full items-center justify-center bg-cover bg-right-bottom bg-no-repeat md:flex"
            style="background-image:url(/img/ui/auth-illus.jpg)">
        </div>
    </div>
@endsection


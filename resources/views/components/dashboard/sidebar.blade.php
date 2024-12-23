<aside id="cta-button-sidebar"
    class="fixed left-0 top-0 z-40 flex h-screen -translate-x-full shadow-2xl transition-transform sm:translate-x-0 md:shadow-none"
    aria-label="Sidebar">
    <div
        class="flex h-full w-[50px] flex-col items-center justify-between gap-3 overflow-y-auto bg-gray-200 px-3 py-6 md:w-[90px]">
        <div class="space-y-3">
            <a href="#"
                class="flex aspect-square w-[35px] items-center justify-center rounded-lg bg-orange-500 transition duration-150 hover:bg-orange-200 md:w-[50px] md:rounded-xl">
                <i class="ri-home-4-line text-sm text-white md:text-lg"></i>
            </a>
            <a href="#"
                class="flex aspect-square w-[35px] items-center justify-center rounded-lg bg-white transition duration-150 hover:bg-orange-200 md:w-[50px] md:rounded-xl">
                <i class="ri-user-smile-fill text-sm text-gray-400 md:text-lg"></i>
            </a>
            <a href="#"
                class="flex aspect-square w-[35px] items-center justify-center rounded-lg bg-white transition duration-150 hover:bg-orange-200 md:w-[50px] md:rounded-xl">
                <i class="ri-information-fill text-sm text-gray-400 md:text-lg"></i>
            </a>
        </div>
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="flex aspect-square w-[35px] items-center justify-center rounded-lg bg-red-200 transition duration-150 hover:bg-red-300 md:w-[50px] md:rounded-xl">
                    <i class="ri-logout-box-line text-sm text-red-500 md:text-lg"></i>
                </button>
            </form>
        @endauth
        @guest
            <a href="{{ route('login') }}">
                <button type="submit"
                    class="flex aspect-square w-[35px] items-center justify-center rounded-lg bg-white transition duration-150 hover:bg-orange-100 md:w-[50px] md:rounded-xl">
                    <i class="ri-login-box-line text-sm text-green-600 md:text-lg"></i>
                </button>
            </a>
        @endguest
    </div>
    <div class="flex h-full w-[250px] flex-col justify-between overflow-y-auto bg-gray-50 px-5 py-6 md:w-[316px]">
        <div>
            @guest <div id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" @endguest
                @auth <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" @endauth
                class="@auth hover:bg-orange-200 @endauth flex h-[50px] w-full items-center justify-between rounded-xl bg-gray-200 p-2 transition duration-150">
                <div class="flex items-center gap-3">
                    <div
                        class="flex h-[37px] w-[37px] items-center justify-center rounded-xl bg-orange-50 transition duration-150 hover:bg-orange-200">
                        <i class="ri-user-smile-line text-lg text-orange-500"></i>
                    </div>
                    <span class="font-inter text-sm font-bold text-gray-800">
                        @auth
                            {{ auth()->user()->namalengkap }}
                        @endauth
                        @guest
                            Akun Tamu <a href="{{ route('login') }}">
                            @endguest
                    </span>
                </div>
                @auth
                    <i class="ri-arrow-down-s-line text-lg text-gray-400"></i>
                @endauth
                @guest
                    <span class="me-2 rounded bg-orange-50 px-1.5 py-1 text-xs font-medium text-orange-800">
                        Login
                    </span></a>
            </div> @endguest
            @auth </button>@endauth
            @auth
                <div id="dropdownInformation"
                    class="z-10 hidden w-[276px] divide-y divide-gray-100 rounded-lg bg-white shadow">
                    <div class="px-4 py-3 text-sm text-gray-900">
                        <div>{{ auth()->user()->namalengkap }}</div>
                        <div class="truncate font-medium">{{ auth()->user()->email }}</div>
                    </div>
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownInformationButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Edit Profil</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Update Password</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Contact Us</a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="block w-full px-4 py-2 text-start text-sm text-orange-700 hover:bg-gray-100">
                                Sign out
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
            <p class="font-inter mb-2 mt-5 text-sm font-bold text-gray-800">
                Menu
            </p>
            <div class="grid grid-cols-2 gap-3 md:grid-cols-3">
                <a href="{{ route('dashboard') }}"
                    class="{{ request()->routeIs('dashboard') ? 'bg-orange-500 text-white hover:bg-orange-600' : 'bg-white text-gray-800 hover:bg-orange-100' }} flex aspect-video w-full items-center justify-center rounded-xl p-2 transition duration-150 md:aspect-square md:p-0">
                    <div class="flex flex-col items-center">
                        <i
                            class="{{ request()->routeIs('dashboard') ? ' text-white' : ' text-orange-500' }} ri-apps-2-add-line text-xl md:text-2xl"></i>
                        <span class="text-[10px] font-bold">Dashboard</span>
                    </div>
                </a>
                <a href="{{ route('ebook') }}"
                    class="{{ request()->routeIs('ebook') ? 'bg-orange-500 text-white hover:bg-orange-600' : 'bg-white text-gray-800 hover:bg-orange-100' }} flex aspect-video w-full items-center justify-center rounded-xl p-2 transition duration-150 md:aspect-square md:p-0">
                    <div class="flex flex-col items-center">
                        <i
                            class="{{ request()->routeIs('ebook') ? ' text-white' : ' text-orange-500' }} ri-file-pdf-2-line text-xl md:text-2xl"></i>
                        <span class="text-[10px] font-bold">Ebook</span>
                    </div>
                </a>
                <a href="{{ route('worksheet') }}"
                    class="{{ request()->routeIs('worksheet') ? 'bg-orange-500 text-white hover:bg-orange-600' : 'bg-white text-gray-800 hover:bg-orange-100' }} flex aspect-video w-full items-center justify-center rounded-xl p-2 transition duration-150 md:aspect-square md:p-0">
                    <div class="flex flex-col items-center">
                        <i
                            class="{{ request()->routeIs('worksheet') ? ' text-white' : ' text-orange-500' }} ri-sticky-note-line text-xl md:text-2xl"></i>
                        <span class="text-[10px] font-bold">Worksheet</span>
                    </div>
                </a>
                <a href="{{ route('LKPD') }}"
                    class="{{ request()->routeIs('LKPD', 'LKPD.penjumlahan', 'LKPD.pengurangan', 'LKPD.perkalian', 'LKPD.pembagian', 'LKPD.acakkata', 'LKPD.cocokkata', 'LKPD.mencarikata', 'LKPD.tekateki') ? 'bg-orange-500 text-white hover:bg-orange-600' : 'bg-white text-gray-800 hover:bg-orange-100' }} flex aspect-video w-full items-center justify-center rounded-xl p-2 transition duration-150 md:aspect-square md:p-0">
                    <div class="flex flex-col items-center">
                        <i
                            class="{{ request()->routeIs('LKPD', 'LKPD.penjumlahan', 'LKPD.pengurangan', 'LKPD.perkalian', 'LKPD.pembagian', 'LKPD.acakkata', 'LKPD.cocokkata', 'LKPD.mencarikata', 'LKPD.tekateki') ? ' text-white' : ' text-orange-500' }} ri-file-line text-xl md:text-2xl"></i>
                        <span class="text-[10px] font-bold">LKPD</span>
                    </div>
                </a>
                <a href="#"
                    class="flex aspect-video w-full items-center justify-center rounded-xl bg-white p-2 transition duration-150 hover:bg-orange-100 md:aspect-square md:p-0">
                    <div class="flex flex-col items-center">
                        <i class="ri-book-open-line text-xl text-orange-500 md:text-2xl"></i>
                        <span class="text-[10px] font-bold text-gray-800">Modul Ajar</span>
                    </div>
                </a>
                <a href="#"
                    class="flex aspect-video w-full items-center justify-center rounded-xl bg-white p-2 transition duration-150 hover:bg-orange-100 md:aspect-square md:p-0">
                    <div class="flex flex-col items-center">
                        <i class="ri-article-line text-xl text-orange-500 md:text-2xl"></i>
                        <span class="text-[10px] font-bold text-gray-800">RPP</span>
                    </div>
                </a>
                <a href="{{ route('powerpoint') }}"
                    class="{{ request()->routeIs('powerpoint') ? 'bg-orange-500 text-white hover:bg-orange-600' : 'bg-white text-gray-800 hover:bg-orange-100' }} flex aspect-video w-full items-center justify-center rounded-xl bg-white p-2 transition duration-150 hover:bg-orange-100 md:aspect-square md:p-0">
                    <div class="flex flex-col items-center">
                        <i class="ri-slideshow-line text-xl text-orange-500 md:text-2xl"></i>
                        <span class="text-[10px] font-bold text-gray-800">Powerpoint</span>
                        
                    </div>
                </a>
                <div href="#"
                    class="flex aspect-video w-full items-center justify-center rounded-xl bg-white p-2 transition duration-150 hover:bg-orange-100 md:aspect-square md:p-0">
                    <div class="flex flex-col items-center">
                        <i class="ri-play-circle-line text-xl text-orange-500 md:text-2xl"></i>
                        <span class="text-[10px] font-bold text-gray-800">Media</span>
                        <span class="rounded-full bg-orange-50 p-0.5 px-1 text-[8px] text-gray-800">Coming Soon</span>
                    </div>
                </div>
                <div href="#"
                    class="flex aspect-video w-full items-center justify-center rounded-xl bg-white p-2 transition duration-150 hover:bg-orange-100 md:aspect-square md:p-0">
                    <div class="flex flex-col items-center">
                        <i class="ri-edit-line text-xl text-orange-500 md:text-2xl"></i>
                        <span class="text-[10px] font-bold text-gray-800">Soal</span>
                        <span class="rounded-full bg-orange-50 p-0.5 px-1 text-[8px] text-gray-800">Coming Soon</span>
                    </div>
                </div>
            </div>
        </div>
        <div id="dropdown-cta" class="mt-6 rounded-xl bg-white p-4 transition-all duration-300 ease-in-out"
            role="alert">
            <div class="mb-2 flex items-center">
                <span class="me-2 rounded bg-orange-100 px-2.5 py-0.5 text-sm font-semibold text-orange-800">Welcome!
                </span>
                <button type="button"
                    onclick="this.parentElement.parentElement.classList.add('opacity-0', 'scale-95'); setTimeout(() => this.parentElement.parentElement.remove(), 300)"
                    class="-mx-1.5 -my-1.5 ms-auto inline-flex h-6 w-6 items-center justify-center rounded-md bg-orange-50 p-1 text-blue-900 transition duration-150 hover:bg-orange-200 focus:ring-2 focus:ring-blue-400"
                    aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <h3 class="mb-1 text-sm text-gray-500">
                Selamat datang @auth {{ auth()->user()->namalengkap }}@endauth! Jelajahi dan unduh semua resource
                    pilihan kami 100% gratis!
                </h3>
            </div>
        </div>
    </aside>


<nav class="dark:border-gray-700 dark:bg-gray-900">
    <div class="mx-auto flex max-w-[90%] flex-wrap items-center justify-between pt-8 md:max-w-main md:pt-[45px]">
        <a href="/ticykit" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/img/ui/logonav-ticykit.png" />
        </a>
        <button data-collapse-toggle="navbar-dropdown" type="button"
            class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul
                class="mt-4 flex flex-col items-baseline rounded-lg border border-gray-100 bg-gray-50 p-4 font-medium dark:border-gray-700 dark:bg-gray-800 md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-transparent md:p-0 md:dark:bg-gray-900 rtl:space-x-reverse">
                <li>
                    <a href="/"
                        class="block rounded px-3 py-2 text-base text-black hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-orange-700 md:dark:hover:bg-transparent md:dark:hover:text-orange-500">Home</a>
                </li>
                <li>
                    <a href="/event"
                        class="block rounded px-3 py-2 text-base text-black hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-orange-700 md:dark:hover:bg-transparent md:dark:hover:text-orange-500">Event</a>
                </li>
                <li>
                    <a href="/ecourse"
                        class="block rounded px-3 py-2 text-base text-black hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-orange-700 md:dark:hover:bg-transparent md:dark:hover:text-orange-500">Ecourse</a>
                </li>
                <li>
                    <a href="/ticykit"
                        class="block rounded px-3 py-2 text-base text-black hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-orange-700 md:dark:hover:bg-transparent md:dark:hover:text-orange-500">Bahan
                        Ajar</a>
                </li>
                <li>
                    <a href="https://bacakembali.com"
                        class="block rounded px-3 py-2 text-base text-black hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-orange-700 md:dark:hover:bg-transparent md:dark:hover:text-orange-500">Artikel</a>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="flex w-full items-center justify-between rounded px-3 py-2 text-black hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:text-white md:w-auto md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-orange-700 md:dark:hover:bg-transparent md:dark:hover:text-orange-500">Kontak<svg
                            class="ms-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar"
                        class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white font-normal shadow dark:divide-gray-600 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-black dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Partnership</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Lamaran
                                    Instruktur</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Lamaran
                                    Konten Kreator</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-black hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Admin</a>
                        </div>
                    </div>
                </li>
                @auth
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar2"
                            class="flex w-full items-center justify-between rounded px-3 py-2 text-black hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:text-white md:w-auto md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-orange-700 md:dark:hover:bg-transparent md:dark:hover:text-orange-500"><i
                                class="ri-user-heart-fill mr-2"></i> {{ auth()->user()->namalengkap }}<svg
                                class="ms-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar2"
                            class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white font-normal shadow dark:divide-gray-600 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-black dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="/profil/edit"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit
                                        Profil</a>
                                </li>
                                <li>
                                    <a href="/password/edit"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ubah
                                        Password</a>
                                </li>
                            </ul>
                            <form action="/logout" method="POST">
                                @csrf
                                <div class="py-1">
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-left text-sm text-black hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Logout</button>
                                </div>
                            </form>
                        </div>
                    </li>
                @else
                    <a href="/login"
                        class="mb-2 me-2 rounded-lg bg-ticykit-primary px-4 py-2 text-base font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-4 focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Login</a>
                </ul>
            @endauth
        </div>
    </div>
</nav>

<div class="navbar fixed top-0 z-50 w-full -translate-y-full transform bg-ticykit-primary py-2.5 text-white shadow-sm transition-all duration-300"
    id="navbar">
    <div class="mx-auto flex max-w-[90%] flex-wrap items-center justify-between md:max-w-main">
        <a href="/ticykit" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img class="max-h-7" src="/img/ui/logonav-ticykit-white.png" />
        </a>
        <button data-collapse-toggle="navbar-dropdown1" type="button"
            class="text- inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
            aria-controls="navbar-dropdown1" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown1">
            <ul
                class="mt-4 flex flex-col items-baseline rounded-lg bg-ticykit-primary p-4 font-medium dark:border-gray-700 dark:bg-gray-800 md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-transparent md:p-0 md:dark:bg-gray-900 rtl:space-x-reverse">
                <li>
                    <a href="/"
                        class="block rounded px-3 py-2 text-base text-white hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-gray-200 md:dark:hover:bg-transparent md:dark:hover:text-orange-500">Home</a>
                </li>
                <li>
                    <a href="/event"
                        class="block rounded px-3 py-2 text-base text-white hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-gray-200 md:dark:hover:bg-transparent md:dark:hover:text-orange-500">Event</a>
                </li>
                <li>
                    <a href="/ecourse"
                        class="block rounded px-3 py-2 text-base text-white hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-gray-200 md:dark:hover:bg-transparent md:dark:hover:text-orange-500">Ecourse</a>
                </li>
                <li>
                    <a href="/ticykit"
                        class="block rounded px-3 py-2 text-base text-white hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-gray-200 md:dark:hover:bg-transparent md:dark:hover:text-orange-500">Bahan
                        Ajar</a>
                </li>
                <li>
                    <a href="https://bacakembali.com"
                        class="block rounded px-3 py-2 text-base text-white hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-gray-200 md:dark:hover:bg-transparent md:dark:hover:text-orange-500">Artikel</a>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar3"
                        class="flex w-full items-center justify-between rounded px-3 py-2 text-white hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:text-white md:w-auto md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-gray-200 md:dark:hover:bg-transparent md:dark:hover:text-orange-500">Kontak<svg
                            class="ms-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar3"
                        class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white font-normal shadow dark:divide-gray-600 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-black dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Partnership</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Lamaran
                                    Instruktur</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Lamaran
                                    Konten Kreator</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-black hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Admin</a>
                        </div>
                    </div>
                </li>
                @auth
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar4"
                            class="my-2 flex w-full items-center justify-between rounded px-3 py-2 text-white hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:text-white md:w-auto md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-orange-700 md:dark:hover:bg-transparent md:dark:hover:text-orange-500"><i
                                class="ri-user-heart-fill mr-2"></i> {{ auth()->user()->namalengkap }}<svg
                                class="ms-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar4"
                            class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white font-normal shadow dark:divide-gray-600 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-black dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="/profil/edit"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit
                                        Profil</a>
                                </li>
                                <li>
                                    <a href="/password/edit"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ubah
                                        Password</a>
                                </li>
                            </ul>
                            <form action="/logout" method="POST">
                                @csrf
                                <div class="py-1">
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-left text-sm text-black hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Logout</button>
                                </div>
                            </form>
                        </div>
                    </li>
                @else
                    <a href="/login"
                        class="me-2 rounded-lg bg-white px-4 py-2 text-base font-medium text-black hover:bg-orange-800 focus:outline-none focus:ring-4 focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Login</a>
                </ul>
            @endauth
        </div>
    </div>
</div>

<script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        var navbar = document.getElementById("navbar");
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            navbar.classList.add("translate-y-0");
            navbar.classList.remove("-translate-y-full");
        } else {
            navbar.classList.remove("translate-y-0");
            navbar.classList.add("-translate-y-full");
        }
    }
</script>

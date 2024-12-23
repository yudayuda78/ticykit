<x-auth.app>
    <div>
        <div class="text-center">
            <h1 class="block font-syne text-2xl font-bold text-gray-800">Login</h1>
            <p class="mb-5 mt-2 text-sm text-gray-500">
                Selamat datang, masukkan kredensial Anda di bawah ini untuk mulai menggunakan aplikasi
            </p>
        </div>
        @if (session()->has('success'))
            <div id="alert-3" class="mb-4 flex items-center rounded-lg bg-orange-50 p-4 text-orange-700" role="alert">
                <i class="ri-information-line text-2xl text-orange-500"></i>
                <div class="ms-2 text-sm font-medium">
                    Pendaftaran sukses! Silahkan login
                </div>
                <button type="button"
                    class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-orange-50 p-1.5 text-orange-500 hover:bg-orange-200 focus:ring-2 focus:ring-orange-400"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <i class="ri-close-line text-xl text-orange-700"></i>
                </button>
            </div>
        @endif
        @if (session()->has('loginError'))
            <div id="alert-2" class="mb-4 flex items-center rounded-lg bg-red-50 p-4 text-red-700" role="alert">
                <i class="ri-error-warning-line text-2xl text-red-500"></i>
                <div class="ms-2 text-sm font-medium">
                    Login gagal! Email atau password salah
                </div>
                <button type="button"
                    class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-red-50 p-1.5 text-red-500 hover:bg-red-200 focus:ring-2 focus:ring-red-400"
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <i class="ri-close-line text-xl text-red-700"></i>
                </button>
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="grid gap-y-4">
                <x-forms.input id="email" type="email" label="Email" name="email" placeholder="Email"
                    required />
                <x-forms.input id="password" type="password" label="Password" name="password" placeholder="Password"
                    required />
                <p class="text-sm text-gray-600">
                    Forgot your password?
                    <a class="font-medium text-orange-500 decoration-2 hover:underline focus:underline focus:outline-none"
                        href="#">
                        Reset Here
                    </a>
                </p>
                <button type="submit"
                    class="inline-flex w-full items-center justify-center gap-x-2 rounded-full border border-transparent bg-orange-500 px-4 py-3 text-sm font-medium text-white hover:bg-orange-600 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50">
                    Login
                </button>
            </div>
        </form>
    </div>
    <p class="mb-5 text-center text-sm text-slate-600 md:mb-0 md:text-start">
        Belum Punya Akun
        <a href="{{ route('register') }}" class="ms-0.5 rounded-full bg-orange-500 px-2.5 py-1 text-white">Daftar
        </a>
    </p>
</x-auth.app>


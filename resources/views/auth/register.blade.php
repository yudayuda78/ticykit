<x-auth.app>
    <div>
        <div class="text-center">
            <h1 class="block font-syne text-2xl font-bold text-gray-800">Daftar Akun</h1>
            <p class="mb-5 mt-2 text-sm text-gray-500">
                Selamat datang di TicyKit, silakan lengkapi data diri Anda di bawah ini untuk membuat akun baru
            </p>
        </div>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="grid gap-4">
                <x-forms.input id="email" type="email" label="Email" name="email" placeholder="your@email.com"
                    required />
                <x-forms.input id="password" type="password" label="Password" name="password" placeholder="Password" />
                <div class="grid grid-cols-1 gap-4 pb-1 md:grid-cols-2">
                    <x-forms.input id="username" type="text" label="Username" name="username"
                        placeholder="jailanihayyan" required />
                    <x-forms.input id="namalengkap" type="text" label="Nama Lengkap" name="namalengkap"
                        placeholder="Jailani Hayyan" required />
                    <x-forms.input id="nomortelepon" type="text" label="Nomor Telepon" name="nomortelepon"
                        placeholder="08767564865" required />
                    <x-forms.input id="pekerjaan" type="text" label="Pekerjaan" name="pekerjaan"
                        placeholder="Guru SD" required />
                </div>
                <button
                    class="inline-flex w-full items-center justify-center gap-x-2 rounded-full border border-transparent bg-orange-500 px-4 py-3 text-sm font-medium text-white hover:bg-orange-600 focus:bg-orange-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50">
                    Daftar
                </button>
            </div>
        </form>
    </div>
    <p class="mb-5 pb-5 text-center text-sm text-slate-600 md:mb-0 md:pb-0 md:text-start">
        Sudah Punya Akun?
        <a href="{{ route('login') }}" class="ms-0.5 rounded-full bg-orange-500 px-2.5 py-1 text-white">Login</a>
    </p>
</x-auth.app>


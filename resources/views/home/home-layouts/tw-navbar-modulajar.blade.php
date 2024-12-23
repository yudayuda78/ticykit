<nav class="flex justify-center">
    <div class="flex flex-wrap gap-x-5 gap-y-7 justify-center font-inter">
        <a href="{{ route('mymodulajar') }}" class="{{ request()->routeIs('mymodulajar') ? 'text-white bg-ticykit-primary pointer-events-none' : '' }} hover:bg-ticykit-primary hover:text-white p-2 text-sm font-medium bg-ticykit-bg rounded-full px-3.5 border-2 border-[#DCE0E4] hover:border-ticykit-primary nav-item"><i class="mr-2 ri-folder-5-line"></i>Modul Ajar Saya</a>
        <a href="{{ route('modulajar.index') }}" class="{{ request()->routeIs('modulajar.index') ? 'text-white bg-ticykit-primary pointer-events-none' : '' }} hover:bg-ticykit-primary hover:text-white p-2 text-sm font-medium bg-ticykit-bg rounded-full px-3.5 border-2 border-[#DCE0E4] hover:border-ticykit-primary nav-item"><i class="mr-2 ri-share-forward-box-fill"></i>Modul Ajar Berbagi</a>
        <a href="{{ route('formmodulajar') }}" class="{{ request()->routeIs('formmodulajar') ? 'text-white bg-ticykit-primary pointer-events-none' : '' }} hover:bg-ticykit-primary hover:text-white p-2 text-sm font-medium bg-ticykit-bg rounded-full px-3.5 border-2 border-[#DCE0E4] hover:border-ticykit-primary nav-item"><i class="mr-2 ri-add-circle-line"></i>Tambah Modul Ajar</a>
    </div>
</nav>

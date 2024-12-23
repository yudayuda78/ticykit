<form class="flex" action="{{ route('content.search') }}" method="GET">
    <input
        class="block w-full rounded-lg border border-[#DCE0E4] bg-[#F9FAFB] p-2.5 ps-4 text-gray-900 focus:border-orange-500 focus:ring-orange-500"
        type="search" name="search" placeholder="Cari media pembelajaran...">
    <button
        class="ms-3 hidden gap-1 rounded-lg border border-ticykit-primary bg-ticykit-primary p-2.5 px-4 font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-4 focus:ring-orange-300 md:flex">
        <i class="ri-search-2-line"></i> Search
    </button>
    <button
        class="ms-1.5 flex gap-1 rounded-lg border border-ticykit-primary bg-ticykit-primary p-2.5 px-4 font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-4 focus:ring-orange-300 md:hidden">
        <i class="ri-search-2-line"></i>
    </button>
</form>

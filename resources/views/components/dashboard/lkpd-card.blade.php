@props(['title', 'img', 'mapel', 'route'])
<div class="rounded-2xl border border-gray-200">
    <div class="m-3 rounded-lg border border-gray-200"
        style="mask-image: linear-gradient(to bottom, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%); -webkit-mask-image: linear-gradient(to bottom, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%)">
        <img src="/img/ui/{{ $img }}" class="rounded-2xl p-2">
    </div>
    <hr>
    <div class="p-4">
        <h3 class="text-center font-bold">{{ $title }}</h3>
        <p class="mx-auto mb-3 mt-1 w-fit rounded bg-orange-100 px-1.5 py-0.5 text-xs font-medium text-orange-800">
            {{ $mapel }}
        </p>
        <a href="{{ route($route) }}">
            <button type="button"
                class="w-full rounded-lg bg-orange-500 px-3 py-2 text-center text-sm font-medium text-white hover:bg-orange-600 focus:outline-none focus:ring-1 focus:ring-orange-700">
                <i class="ri-quill-pen-ai-line me-1.5"></i>Buat LKPD
            </button>
        </a>
    </div>
</div>

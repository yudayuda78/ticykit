@props(['title', 'img', 'type', 'route'])
<div class="flex flex-col justify-between rounded-2xl border border-gray-200">
    <div>
        <div class="m-3 rounded-lg border border-gray-200"
            style="mask-image: linear-gradient(to bottom, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%); -webkit-mask-image: linear-gradient(to bottom, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%)">
            <img src="{{ $img }}" class="aspect-square w-full rounded-2xl object-contain p-2">
        </div>
        <hr>
    </div>
    <div class="flex flex-col p-4">
        <div>
            <h3 class="text-center font-bold capitalize">{{ $title }}</h3>
            <p class="mx-auto mb-3 mt-1 w-fit rounded bg-orange-100 px-1.5 py-0.5 text-xs font-medium text-orange-800">
                {{ $type }}
            </p>
        </div>
        <a href="{{ $route }}">
            <button type="button"
                class="w-full rounded-lg bg-orange-500 px-3 py-2 text-center text-sm font-medium text-white hover:bg-orange-600 focus:outline-none focus:ring-1 focus:ring-orange-700">
                <i class="ri-download-line me-1.5"></i>Download
            </button>
        </a>
    </div>
</div>


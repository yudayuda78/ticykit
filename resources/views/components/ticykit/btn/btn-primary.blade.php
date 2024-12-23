@props(['link' => '#', 'text'=>null, 'icon' => null])
<a href="{{ $link }}"
    class="rounded-lg bg-ticykit-primary px-3 py-2 gap-1 flex text-center items-center font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-4 focus:ring-orange-300">
    @if($text)
        {{ $text }}
    @endif
    @if($icon)
        <i class="{{ $icon }}"></i>
    @endif
</a>

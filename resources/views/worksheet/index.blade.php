<x-dashboard.app>
    <div class="mx-auto max-w-screen-xl">
        <div class="pb-6">
            <h3 class="text-lg font-bold text-gray-800">Worksheet</h3>
            <p class="text-sm text-gray-500">Lembar kerja atau halaman yang digunakan untuk mencatat, mengorganisasi,
                atau menyelesaikan tugas tertentu</p>
        </div>
        <div class="grid grid-cols-1 justify-between gap-5 pb-10 md:grid-cols-3">
            @foreach ($worksheet as $sheet)
                <x-dashboard.items-card title="{{ $sheet->title }}"
                img="{{ asset('imgworksheet/' . $sheet->image) }}"
                type="Worksheet" route="{{ route('worksheet.download', ['id' => $sheet->id]) }}" />
            @endforeach
            
            {{ $worksheet->links() }}
          
         
        </div>
    </div>
</x-dashboard.app>


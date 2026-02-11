<!-- Article Card Component -->
@props(['image' => null, 'title', 'excerpt', 'date' => null, 'category' => null, 'link' => '#', 'author' => null])

<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
    @if($image)
        <div class="h-48 bg-gradient-to-br from-emerald-400 to-emerald-600 overflow-hidden">
            <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover hover:scale-105 transition duration-300">
        </div>
    @else
        <div class="h-48 bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center">
            <svg class="w-24 h-24 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
    @endif
    
    <div class="p-6">
        <!-- Meta -->
        <div class="flex items-center gap-3 mb-3 text-xs text-gray-500">
            @if($date)
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v2h16V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                    {{ \Carbon\Carbon::parse($date)->locale('id')->isoFormat('D MMMM YYYY') }}
                </span>
            @endif
            
            @if($category)
                <span class="bg-emerald-100 text-emerald-700 px-2 py-1 rounded text-xs font-medium">{{ $category }}</span>
            @endif
        </div>
        
        <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2 hover:text-emerald-600">
            <a href="{{ $link }}">{{ $title }}</a>
        </h3>
        
        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $excerpt }}</p>
        
        @if($author)
            <p class="text-xs text-gray-500 mb-3">Oleh <span class="font-medium">{{ $author }}</span></p>
        @endif
        
        <a href="{{ $link }}" class="inline-flex items-center gap-2 text-emerald-600 hover:text-emerald-700 font-medium text-sm">
            Baca Selengkapnya
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</div>

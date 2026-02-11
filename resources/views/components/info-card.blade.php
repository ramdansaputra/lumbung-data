<!-- Info Card Component -->
@props(['icon' => null, 'title', 'description', 'link' => null, 'linkText' => 'Lihat Selengkapnya'])

<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
    @if($icon)
        <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 h-12 flex items-center justify-center text-white text-2xl">
            {{ $icon }}
        </div>
    @endif
    
    <div class="p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $title }}</h3>
        <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $description }}</p>
        
        @if($link)
            <a href="{{ $link }}" class="inline-flex items-center gap-2 text-emerald-600 hover:text-emerald-700 font-medium text-sm">
                {{ $linkText }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        @endif
    </div>
</div>

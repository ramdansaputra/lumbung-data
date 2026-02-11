<!-- Hero Section Component -->
@props(['title', 'subtitle' => null, 'image' => null, 'breadcrumb' => null])

<div class="relative bg-emerald-700 text-white py-16 md:py-24 overflow-hidden">
    @if($image)
        <img src="{{ $image }}" alt="" class="absolute inset-0 w-full h-full object-cover opacity-30">
    @else
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-700 via-emerald-600 to-emerald-800"></div>
    @endif
    
    <div class="relative z-10 container mx-auto px-4">
        <!-- Breadcrumb -->
        @if($breadcrumb)
            <div class="flex items-center gap-2 text-sm text-emerald-100 mb-4">
                @foreach($breadcrumb as $item)
                    @if(!$loop->last)
                        <a href="{{ $item['url'] }}" class="hover:text-white transition">{{ $item['label'] }}</a>
                        <span>›</span>
                    @else
                        <span class="text-white">{{ $item['label'] }}</span>
                    @endif
                @endforeach
            </div>
        @endif

        <h1 class="text-4xl md:text-5xl font-bold mb-4 text-balance">{{ $title }}</h1>
        
        @if($subtitle)
            <p class="text-lg text-emerald-100 max-w-2xl text-balance">{{ $subtitle }}</p>
        @endif
    </div>
</div>

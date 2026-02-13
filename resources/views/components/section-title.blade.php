@props(['title', 'subtitle' => null, 'centered' => true, 'icon' => null, 'badge' => null])

<div class="{{ $centered ? 'text-center' : '' }} mb-10">
    @if($badge)
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-100 text-emerald-600 text-xs font-bold uppercase tracking-wider mb-4">
            {{ $badge }}
        </div>
    @endif

    @if($icon && !$badge)
        <div class="inline-flex items-center gap-2 bg-emerald-100 text-emerald-700 px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider mb-4">
            <span>{{ $icon }}</span>
            @if($title == 'Aparatur Desa') Pemerintahan @elseif($title == 'Kabar Desa Terkini') Berita @else Informasi @endif
        </div>
    @endif
    
    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 leading-tight">{{ $title }}</h2>
    
    @if($subtitle)
        <p class="text-gray-600 text-lg leading-relaxed max-w-2xl {{ $centered ? 'mx-auto' : '' }}">
            {{ $subtitle }}
        </p>
    @endif
</div>
@extends('layouts.public')

@section('title', 'The Team')
@section('meta_description', 'Meet the Flame Igniters FC squad — our goalkeepers, defenders, midfielders, and forwards.')

@section('content')

<div class="bg-gray-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="section-subtitle text-flame-400">The Squad</p>
        <h1 class="text-4xl md:text-5xl font-black">Meet the Team</h1>
    </div>
</div>

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        @forelse($players as $position => $group)
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-8">
                <h2 class="text-2xl font-black text-gray-900">{{ $position }}s</h2>
                <div class="flex-1 h-px bg-flame-200"></div>
                <span class="bg-flame-600 text-white text-sm font-bold px-3 py-1 rounded-full">{{ $group->count() }}</span>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @foreach($group as $player)
                <div class="card group text-center">
                    <div class="relative overflow-hidden">
                        <img src="{{ $player->photo_url }}" alt="{{ $player->name }}"
                             class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-3 left-3 bg-flame-600 text-white font-black w-8 h-8 rounded-full flex items-center justify-center text-sm shadow">
                            {{ $player->jersey_number ?? '?' }}
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900">{{ $player->name }}</h3>
                        <p class="text-flame-600 text-sm font-semibold">{{ $player->position }}</p>
                        @if($player->bio)
                            <p class="text-gray-500 text-xs mt-2 line-clamp-2">{{ $player->bio }}</p>
                        @endif
                        @if($player->appearances || $player->goals || $player->assists)
                        <div class="grid grid-cols-3 gap-1 mt-3 pt-3 border-t border-gray-100 text-center">
                            <div><p class="font-bold text-gray-900 text-sm">{{ $player->appearances }}</p><p class="text-xs text-gray-400">Apps</p></div>
                            <div><p class="font-bold text-gray-900 text-sm">{{ $player->goals }}</p><p class="text-xs text-gray-400">Goals</p></div>
                            <div><p class="font-bold text-gray-900 text-sm">{{ $player->assists }}</p><p class="text-xs text-gray-400">Assists</p></div>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @empty
        <div class="text-center py-20">
            <p class="text-5xl mb-4">⚽</p>
            <p class="text-gray-500 text-lg">Squad information coming soon.</p>
        </div>
        @endforelse
    </div>
</section>

@endsection

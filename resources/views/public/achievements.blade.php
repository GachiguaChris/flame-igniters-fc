@extends('layouts.public')

@section('title', 'Honours & Achievements')
@section('meta_description', 'Trophies, awards, and milestones of Flame Igniters FC.')

@section('content')

<div class="bg-gray-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="section-subtitle text-flame-400">Our Legacy</p>
        <h1 class="text-4xl md:text-5xl font-black">Honours & Achievements</h1>
    </div>
</div>

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        @forelse($achievements as $type => $group)
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-8">
                <span class="text-3xl">
                    @if($type === 'Trophy') 🏆
                    @elseif($type === 'Tournament') ⚽
                    @elseif($type === 'Award') 🥇
                    @else 🌟
                    @endif
                </span>
                <h2 class="text-2xl font-black text-gray-900">{{ $type }}{{ $group->count() > 1 ? 'ies' : 'y' }}</h2>
                <div class="flex-1 h-px bg-flame-200"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($group as $achievement)
                <div class="card p-6 flex gap-4">
                    @if($achievement->image)
                        <img src="{{ $achievement->image_url }}" alt="{{ $achievement->title }}"
                             class="w-16 h-16 object-contain flex-shrink-0">
                    @else
                        <div class="w-16 h-16 bg-flame-100 rounded-xl flex items-center justify-center flex-shrink-0 text-3xl">
                            @if($type === 'Trophy') 🏆 @elseif($type === 'Tournament') ⚽ @elseif($type === 'Award') 🥇 @else 🌟 @endif
                        </div>
                    @endif
                    <div>
                        <p class="font-bold text-gray-900">{{ $achievement->title }}</p>
                        <p class="text-flame-600 font-semibold text-sm">{{ $achievement->year }}</p>
                        @if($achievement->description)
                            <p class="text-gray-500 text-sm mt-1">{{ $achievement->description }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @empty
        <div class="text-center py-20">
            <p class="text-5xl mb-4">🏆</p>
            <p class="text-gray-500 text-lg">Achievements coming soon — the journey has just begun!</p>
        </div>
        @endforelse
    </div>
</section>

@endsection

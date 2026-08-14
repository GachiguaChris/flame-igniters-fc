@extends('layouts.public')

@section('title', 'Gallery')
@section('meta_description', 'Photo gallery from Flame Igniters FC — matches, training, team, and community events.')

@section('content')

<div class="bg-gray-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="section-subtitle text-flame-400">Moments</p>
        <h1 class="text-4xl md:text-5xl font-black">Photo Gallery</h1>
    </div>
</div>

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        @forelse($albums as $album)
        <a href="{{ route('gallery.show', $album->slug) }}" class="card group flex flex-col sm:flex-row mb-6">
            <div class="sm:w-64 flex-shrink-0 overflow-hidden">
                <img src="{{ $album->cover_image_url }}" alt="{{ $album->title }}"
                     class="w-full h-48 sm:h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            <div class="p-6 flex flex-col justify-between">
                <div>
                    <span class="text-xs font-bold text-flame-600 uppercase tracking-wider">{{ $album->category }}</span>
                    <h2 class="font-bold text-xl text-gray-900 mt-2 mb-2 group-hover:text-flame-600 transition-colors">{{ $album->title }}</h2>
                    @if($album->description)
                        <p class="text-gray-500 text-sm">{{ $album->description }}</p>
                    @endif
                </div>
                <p class="text-xs text-gray-400 mt-4">{{ $album->images_count }} photo{{ $album->images_count !== 1 ? 's' : '' }}</p>
            </div>
        </a>
        @empty
        <div class="text-center py-20">
            <p class="text-5xl mb-4">📷</p>
            <p class="text-gray-500">No albums published yet.</p>
        </div>
        @endforelse
        <div class="mt-6">{{ $albums->links() }}</div>
    </div>
</section>

@endsection
